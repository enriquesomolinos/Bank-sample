CREATE TABLE charge (
    id INTEGER PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    amount double NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
);