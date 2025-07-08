<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html>
<head>
  <title>System Status</title>
</head>
<body>
  <h1>Welcome to AD-Meeting-Calendar</h1>
  <p>Below are the database connection checks:</p>

  <div>
    <?php include_once "handlers/mongodbChecker.handler.php"; ?>
    <?php include_once "handlers/postgreChecker.handler.php"; ?>

    <a href="/pages/login/">Go to Login Page</a>
  </div>
</body>
</html>
