<?php
include_once(__DIR__ . '/../utils/envSetter.util.php');
loadEnv();

$mongoUri = getenv('MONGO_URI');

try {
    $client = new MongoDB\Driver\Manager($mongoUri);
    $client->executeCommand("admin", new MongoDB\Driver\Command(["ping" => 1]));
    echo "✅ Connected to MongoDB successfully.";
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "❌ MongoDB connection failed: " . $e->getMessage();
}
