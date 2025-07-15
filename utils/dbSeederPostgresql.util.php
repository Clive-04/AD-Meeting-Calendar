<?php
declare(strict_types=1);

// 1) Composer bootstrap
require 'bootstrap.php';

// 2) Composer autoload
require 'vendor/autoload.php';

// 3) envSetter
require_once UTILS_PATH . '/envSetter.util.php';

// 4) PostgreSQL Connection
if (!in_array(PHP_SAPI, ['cli-server']) && PHP_OS_FAMILY === 'Windows' && $pgConfig['host'] === 'host.docker.internal') {
    $pgConfig['host'] = 'localhost';
}
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "✅ Connected to PostgreSQL\n";

// 5) Read and apply schema
$sqlPath = __DIR__ . '/../database/users.model.sql';
$sql = file_get_contents($sqlPath);
if ($sql === false) {
  throw new RuntimeException("❌ Could not read $sqlPath");
}
$pdo->exec($sql);
echo "✔️  Table created from users.model.sql\n";

// 6) Load Dummy Data
$users = require_once DUMMIES_PATH . 'users.staticData.php';

// 7) Seeding Logic
echo "🌱 Seeding users...\n";

$stmt = $pdo->prepare("
  INSERT INTO users (username, role, first_name, last_name, password)
  VALUES (:username, :role, :fn, :ln, :pw)
");

foreach ($users as $u) {
    try {
        $stmt->execute([
            ':username' => $u['username'],
            ':role'     => $u['role'],
            ':fn'       => $u['first_name'],
            ':ln'       => $u['last_name'],
            ':pw'       => password_hash($u['password'], PASSWORD_DEFAULT),
        ]);
        echo "✅ Inserted: {$u['username']}\n";
    } catch (PDOException $e) {
        echo "❌ Failed to insert {$u['username']}: " . $e->getMessage() . "\n";
    }
}

$count = $pdo->query("SELECT COUNT(*) FROM users;")->fetchColumn();
echo "📊 Users in table AFTER insert: $count\n";

echo "✅ Seeding complete.\n";
