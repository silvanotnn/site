const express = require('express');
const router = express.Router();

module.exports = function(db) {
    // GET /requests - Show form to request materials
    router.get('/', (req, res) => {
        const sql = "SELECT * FROM materials WHERE quantity > 0 ORDER BY name";
        db.all(sql, [], (err, rows) => {
            if (err) {
                console.error(err.message);
                return res.status(500).send("Error querying database for materials.");
            }
            // Pass the query params to the view to show success/error messages
            res.render('requests/index', { materials: rows, title: 'Fazer Pedido de Material', query: req.query });
        });
    });

    // POST /requests - Submit a new material request
    router.post('/', (req, res) => {
        const { teacher_name } = req.body;

        if (!teacher_name || teacher_name.trim() === '') {
            return res.redirect('/requests?error=O nome do professor é obrigatório');
        }

        const requestedItems = Object.keys(req.body)
            .filter(key => key.startsWith('quantity_'))
            .map(key => ({
                id: key.replace('quantity_', ''),
                quantity: parseInt(req.body[key], 10)
            }))
            .filter(item => item.quantity > 0);

        if (requestedItems.length === 0) {
            return res.redirect('/requests?error=Nenhum item foi solicitado');
        }

        const sql = `INSERT INTO material_requests (material_id, teacher_name, quantity) VALUES (?, ?, ?)`;
        let completed = 0;
        let errorOccurred = false;

        db.serialize(() => {
            db.run("BEGIN TRANSACTION");

            requestedItems.forEach(item => {
                db.run(sql, [item.id, teacher_name, item.quantity], function(err) {
                    if (err) {
                        console.error("Error inserting request", err.message);
                        errorOccurred = true;
                    }
                });
            });

            db.run("COMMIT", (err) => {
                if(err || errorOccurred) {
                    db.run("ROLLBACK");
                    res.redirect('/requests?error=Ocorreu um erro ao processar seu pedido');
                } else {
                    res.redirect('/requests?success=Pedido enviado com sucesso!');
                }
            });
        });
    });

    return router;
};
