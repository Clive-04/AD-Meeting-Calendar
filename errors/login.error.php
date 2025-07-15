<?php
$error = $_GET['error'] ?? 'Unknown error occurred during login.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Error | Meeting Calendar</title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/login.error.css">
</head>
<body>

  <div class="error-container">
    <h1>⚠️ Login Failed</h1>
    <p><?= htmlspecialchars($error) ?></p>
    <a href="/pages/login/index.php">← Try Logging In Again</a>
  </div>

</body>
</html>