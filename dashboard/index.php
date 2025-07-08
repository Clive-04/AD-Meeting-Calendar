<?php
require_once '../utils/auth.util.php';

// ✅ Protect the page: only accessible if logged in
if (!Auth::check()) {
    header("Location: /pages/login/index.php");
    exit;
}

$user = Auth::user(); // get logged-in user info
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h1>Welcome, <?= htmlspecialchars($user['full_name']) ?>!</h1>

  <p>This is your dashboard.</p>

  <!-- ✅ LOGOUT LINK -->
  <a href="/authLogout/index.php">Logout</a>
</body>
</html>
