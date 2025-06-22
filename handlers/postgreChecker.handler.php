<?php
include_once(__DIR__ . '/../utils/envSetter.util.php');
loadEnv();

$host = getenv('PG_HOST');
$port = getenv('PG_PORT');
$dbname = getenv('PG_DB');
$user = getenv('PG_USER');
$password = getenv('PG_PASS');

if (!$host || !$port || !$dbname || !$user || !$password) {
    echo "❌ PostgreSQL ENV values are missing or invalid.<br>";
    exit;
}

$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    echo "❌ Connection Failed: " . (pg_last_error() ?: "Unknown error") . "<br>";
    exit();
}

echo "✔️ PostgreSQL Connection<br>";
pg_close($dbconn);
