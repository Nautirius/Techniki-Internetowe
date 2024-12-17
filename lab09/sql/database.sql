CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL
);
INSERT INTO users (username, password) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3'); -- Password: admin
