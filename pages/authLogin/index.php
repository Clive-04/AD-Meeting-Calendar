<?php
require_once UTILS_PATH . 'auth.util.php';
require_once HANDLERS_PATH . 'login.handler.php';

try {
    $dsn = "pgsql:host={$pgConfig['host']};port={$pgConfig['port']};dbname={$pgConfig['db']}";
    $pdo = new PDO($dsn, $pgConfig['user'], $pgConfig['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (Auth::login($pdo, $username, $password)) {
    header('Location: /pages/dashboard/index.php');
    exit;
} else {
    header('Location: /pages/login/index.php?error=invalid');
    exit;
}