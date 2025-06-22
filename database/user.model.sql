CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password_hash TEXT NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    role_id INT REFERENCES roles(id),
    group_id INT REFERENCES groups(id),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);