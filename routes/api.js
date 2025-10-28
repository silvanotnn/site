const express = require('express');
const router = express.Router();

module.exports = function(db) {
    // GET /api/requests/pending-count
    // Returns the current number of requests with 'pending' status.
    router.get('/requests/pending-count', (req, res) => {
        const sql = "SELECT COUNT(*) AS count FROM material_requests WHERE status = 'pending'";
        db.get(sql, [], (err, row) => {
            if (err) {
                console.error("API Error:", err.message);
                return res.status(500).json({ error: "Error querying database." });
            }
            res.json({ count: row ? row.count : 0 });
        });
    });

    return router;
};
