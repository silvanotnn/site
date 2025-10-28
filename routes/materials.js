const express = require('express');
const router = express.Router();

module.exports = function(db) {
    // GET /admin/materials - List all materials
    router.get('/', (req, res) => {
        const sql = "SELECT * FROM materials ORDER BY name";
        db.all(sql, [], (err, rows) => {
            if (err) {
                console.error(err.message);
                return res.status(500).send("Error querying database");
            }
            res.render('admin/materials/index', { materials: rows, title: 'Gerenciar Materiais' });
        });
    });

    // GET /admin/materials/new - Show form to add new material
    router.get('/new', (req, res) => {
        res.render('admin/materials/new', { title: 'Adicionar Material' });
    });

    // POST /admin/materials/new - Add a new material
    router.post('/new', (req, res) => {
        const { name, description, quantity } = req.body;
        const sql = `INSERT INTO materials (name, description, quantity) VALUES (?, ?, ?)`;
        db.run(sql, [name, description, quantity], function(err) {
            if (err) {
                console.error(err.message);
                return res.status(500).send("Error adding material to database");
            }
            res.redirect('/admin/materials');
        });
    });

    // GET /admin/materials/:id/edit - Show form to edit material
    router.get('/:id/edit', (req, res) => {
        const id = req.params.id;
        const sql = "SELECT * FROM materials WHERE id = ?";
        db.get(sql, [id], (err, row) => {
            if (err) {
                console.error(err.message);
                return res.status(500).send("Error querying database");
            }
            res.render('admin/materials/edit', { material: row, title: 'Editar Material' });
        });
    });

    // POST /admin/materials/:id/edit - Update a material
    router.post('/:id/edit', (req, res) => {
        const id = req.params.id;
        const { name, description, quantity } = req.body;
        const sql = `UPDATE materials SET name = ?, description = ?, quantity = ? WHERE id = ?`;
        db.run(sql, [name, description, quantity, id], function(err) {
            if (err) {
                console.error(err.message);
                return res.status(500).send("Error updating material in database");
            }
            res.redirect('/admin/materials');
        });
    });

    // POST /admin/materials/:id/delete - Delete a material
    router.post('/:id/delete', (req, res) => {
        const id = req.params.id;
        const sql = 'DELETE FROM materials WHERE id = ?';
        db.run(sql, id, function(err) {
            if (err) {
                console.error(err.message);
                return res.status(500).send("Error deleting material from database");
            }
            res.redirect('/admin/materials');
        });
    });

    return router;
};
