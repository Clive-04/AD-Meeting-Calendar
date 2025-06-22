CREATE TABLE IF NOT EXISTS users (
    id int NOT NULL PRIMARY KEY,
    username varchar(50) NOT NULL,
    email varchar(100) NOT NULL,
    password_hash text NOT NULL,
    first_name varchar(50),
    last_name varchar(50),
    role_id int,
    group_id int,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL
);