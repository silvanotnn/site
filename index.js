const express = require('express');
const path = require('path');
const sqlite3 = require('sqlite3').verbose();
const engine = require('ejs-mate');

const app = express();
const port = process.env.PORT || 3000;

// Database connection
const dbPath = path.resolve('/tmp', 'school_supplies.sqlite');
const db = new sqlite3.Database(dbPath, sqlite3.OPEN_READWRITE | sqlite3.OPEN_CREATE, (err) => {
    if (err) {
        console.error("Fatal error: Could not connect to the database.", err.message);
        process.exit(1); // Exit if we can't connect
    }

    console.log('Successfully connected to the SQLite database.');

    // --- All application logic now goes inside this callback ---

    // Use ejs-mate as the view engine
    app.engine('ejs', engine);
    app.set('view engine', 'ejs');
    app.set('views', path.join(__dirname, 'views'));

    // Middleware
    app.use(express.urlencoded({ extended: true }));
    app.use(express.static(path.join(__dirname, 'public')));

    // Routes
    const materialsRouter = require('./routes/materials')(db);
    app.use('/admin/materials', materialsRouter);

    const requestsRouter = require('./routes/requests')(db);
    app.use('/requests', requestsRouter);

    const adminRequestsRouter = require('./routes/admin_requests')(db);
    app.use('/admin/requests', adminRequestsRouter);

    const apiRouter = require('./routes/api')(db);
    app.use('/api', apiRouter);

    // Homepage route
    app.get('/', (req, res) => {
        res.render('index', { title: 'Página Inicial' });
    });

    // Start server ONLY AFTER DB IS CONNECTED
    app.listen(port, () => {
        console.log(`Server is running on http://localhost:${port}`);
    });
});

// Close the database connection when the app is closing
process.on('SIGINT', () => {
    console.log('Closing database connection...');
    db.close((err) => {
        if (err) {
            return console.error(err.message);
        }
        console.log('Database connection closed.');
        process.exit(0);
    });
});
