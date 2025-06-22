<?php
include_once(__DIR__ . '/../utils/envSetter.util.php');
loadEnv();

$host = getenv('POSTGRES_HOST');
$port = getenv('POSTGRES_PORT');
$username = getenv('POSTGRES_USER');
$password = getenv('POSTGRES_PASSWORD');
$dbname = getenv('POSTGRES_DB');

$conn_string = "host=$host port=$port dbname=$dbname user=$username password=$password";

$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    echo "❌ Connection Failed: " . (pg_last_error() ?: "Unknown error") . "<br>";
    exit();
} else {
    echo "✔️ PostgreSQL Connection<br>";
    pg_close($dbconn);
}