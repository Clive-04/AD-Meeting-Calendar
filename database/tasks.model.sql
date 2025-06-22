CREATE TABLE IF NOT EXISTS tasks (
    id SERIAL PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    status VARCHAR(50) DEFAULT 'pending',
    due_date DATE,
    user_id INT,        -- The assignee
    project_id INT,     -- The project this task belongs to
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);