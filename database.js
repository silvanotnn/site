const sqlite3 = require('sqlite3').verbose();
const path = require('path');
const os = require('os');

const dbPath = path.join(os.tmpdir(), 'school_supplies.sqlite');

// Connect to the database
const db = new sqlite3.Database(dbPath, (err) => {
    if (err) {
        return console.error('Error opening database', err.message);
    }
    console.log(`Database created/opened at ${dbPath}`);
    createTables();
});

// Function to create tables
function createTables() {
    const createMaterialsTable = `
        CREATE TABLE IF NOT EXISTS materials (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL UNIQUE,
            description TEXT,
            quantity INTEGER NOT NULL DEFAULT 0
        );
    `;

    const createMaterialRequestsTable = `
        CREATE TABLE IF NOT EXISTS material_requests (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            material_id INTEGER,
            teacher_name TEXT NOT NULL,
            quantity INTEGER NOT NULL,
            status TEXT NOT NULL DEFAULT 'pending',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (material_id) REFERENCES materials(id) ON DELETE CASCADE
        );
    `;

    db.serialize(() => {
        db.run(createMaterialsTable, (err) => {
            if (err) {
                console.error("Error creating 'materials' table", err.message);
            } else {
                console.log("'materials' table created or already exists.");
            }
        });

        db.run(createMaterialRequestsTable, (err) => {
            if (err) {
                console.error("Error creating 'material_requests' table", err.message);
            } else {
                console.log("'material_requests' table created or already exists.");
            }
        });
    });

    // Close the database connection
    db.close((err) => {
        if (err) {
            return console.error('Error closing database', err.message);
        }
        console.log('Database connection closed.');
    });
}
