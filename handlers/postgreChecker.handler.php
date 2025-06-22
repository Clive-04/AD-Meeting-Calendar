<?php
include_once(__DIR__ . '/../utils/envSetter.util.php');
loadEnv();

$host = getenv('POSTGRES_HOST');
$port = getenv('POSTGRES_PORT');
$dbname = getenv('POSTGRES_DB');
$user = getenv('POSTGRES_USER');
$password = getenv('POSTGRES_PASSWORD');

$connStr = "host=$host port=$port dbname=$dbname user=$user password=$password";
$conn = pg_connect($connStr);

if (!$conn) {
    echo "❌ Connection Failed: " . pg_last_error($conn);
    exit;
}
echo "✅ PostgreSQL Connection";