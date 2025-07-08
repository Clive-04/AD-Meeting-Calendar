<?php
require_once '../utils/auth.util.php'; // go back 2 levels if you're inside pages/dashboard

Auth::init(); // Make sure session is started
if (!Auth::check()) {
    header("Location: /pages/login/index.php");
    exit;
}

$user = Auth::user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body>

  <div class="header">
    Dashboard
  </div>

  <div class="container">
    <h1>Welcome, <?= htmlspecialchars($user['full_name']) ?>!</h1>
    <p>This is your dashboard. You can manage meetings and view tasks here.</p>

    <a href="/authLogout/index.php" class="btn">Logout</a>
  </div>

</body>
</html>
