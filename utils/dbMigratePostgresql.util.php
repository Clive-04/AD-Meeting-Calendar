<?php
declare(strict_types=1);

// 1) Composer bootstrap
require 'bootstrap.php';

// 2) Composer autoload
require 'vendor/autoload.php';

// 3) envSetter
require_once UTILS_PATH . '/envSetter.util.php';

// ——— Connect to PostgreSQL ———
$dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
$pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);

echo "Dropping old tables…\n";
foreach ([
  'projects',
  'users',
] as $table) {
  // Use IF EXISTS to avoid errors if table already dropped
  $pdo->exec("DROP TABLE IF EXISTS {$table} CASCADE;");
}

echo "Applying schema from database/users.model.sql…\n";

$sql = file_get_contents('database/users.model.sql');

if ($sql === false) {
    throw new RuntimeException("❌ Could not read database/users.model.sql");
} else {
    echo "✔️  Creation Success from the database/users.model.sql\n";
}

$pdo->exec($sql);