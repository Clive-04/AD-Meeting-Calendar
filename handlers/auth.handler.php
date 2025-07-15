<?php
require_once UTILS_PATH . '/envSetter.util.php';
require_once UTILS_PATH . '/auth.util.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

try {
    $dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
    $pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}

$result = Auth::login($pdo, $username, $password);

if ($result === true) {
    header("Location: /pages/dashboard/index.php");
    exit;
}

if ($result === 'username') {
    header("Location: /errors/login.error.php?error=Username not found");
    exit;
}

if ($result === 'password') {
    header("Location: /errors/login.error.php?error=Incorrect password");
    exit;
}
