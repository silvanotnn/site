const express = require('express');
const router = express.Router();

module.exports = function(db) {
    // GET /admin/requests - List all material requests
    router.get('/', (req, res) => {
        const sql = `
            SELECT
                material_requests.id,
                material_requests.teacher_name,
                material_requests.quantity,
                material_requests.status,
                material_requests.created_at,
                materials.name AS material_name
            FROM material_requests
            JOIN materials ON material_requests.material_id = materials.id
            ORDER BY material_requests.created_at DESC
        `;
        db.all(sql, [], (err, rows) => {
            if (err) {
                console.error(err.message);
                return res.status(500).send("Error querying database for requests.");
            }
            res.render('admin/requests/index', { requests: rows, title: 'Gerenciar Pedidos', query: req.query });
        });
    });

    // POST /admin/requests/:id/update-status - Update the status of a request
    router.post('/:id/update-status', (req, res) => {
        const requestId = req.params.id;
        const { new_status } = req.body;

        const getRequestSql = "SELECT * FROM material_requests WHERE id = ?";
        db.get(getRequestSql, [requestId], (err, request) => {
            if (err || !request) {
                return res.redirect('/admin/requests?error=Pedido não encontrado.');
            }

            // If approving a pending request, check stock and update it
            if (new_status === 'approved' && request.status === 'pending') {
                const getMaterialSql = "SELECT quantity FROM materials WHERE id = ?";
                db.get(getMaterialSql, [request.material_id], (err, material) => {
                    if (err || !material) {
                        return res.redirect('/admin/requests?error=Material não encontrado.');
                    }
                    if (material.quantity < request.quantity) {
                        return res.redirect(`/admin/requests?error=Estoque insuficiente para aprovar o pedido de ${request.quantity} unidade(s).`);
                    }

                    const newQuantity = material.quantity - request.quantity;
                    const updateStockSql = "UPDATE materials SET quantity = ? WHERE id = ?";
                    const updateStatusSql = "UPDATE material_requests SET status = ? WHERE id = ?";

                    db.serialize(() => {
                        db.run("BEGIN TRANSACTION");
                        db.run(updateStockSql, [newQuantity, request.material_id]);
                        db.run(updateStatusSql, [new_status, requestId]);
                        db.run("COMMIT", (commitErr) => {
                            if (commitErr) {
                                db.run("ROLLBACK");
                                return res.redirect('/admin/requests?error=Erro ao aprovar o pedido.');
                            }
                            res.redirect('/admin/requests?success=Pedido aprovado e estoque atualizado.');
                        });
                    });
                });
            } else { // For any other status change (e.g., rejected, fulfilled)
                const updateStatusSql = "UPDATE material_requests SET status = ? WHERE id = ?";
                db.run(updateStatusSql, [new_status, requestId], function(err) {
                    if (err) {
                        return res.redirect('/admin/requests?error=Erro ao atualizar o status.');
                    }
                    res.redirect('/admin/requests?success=Status do pedido atualizado com sucesso.');
                });
            }
        });
    });

    return router;
};
