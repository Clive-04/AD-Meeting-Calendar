<?php
include_once(__DIR__ . '/../utils/envSetter.util.php');
loadEnv();

$mongoUri = getenv('MONGO_URI');

if (!$mongoUri) {
    echo "❌ MongoDB URI not found in .env<br>";
    exit;
}

try {
    $mongo = new MongoDB\Driver\Manager($mongoUri);

    $command = new MongoDB\Driver\Command(["ping" => 1]);
    $mongo->executeCommand("admin", $command);

    echo "✅ Connected to MongoDB successfully.<br>";
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "❌ MongoDB connection failed: " . $e->getMessage() . "<br>";
}
