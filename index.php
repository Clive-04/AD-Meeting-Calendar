<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

ob_start(); // Start output buffering
?>

<div class="container">
  <h2>✅ System Status Check</h2>
  <p>Below are the results of your database connection checks:</p>

  <div class="status-row">
    <div class="status-card">
      <?php include_once "handlers/mongodbChecker.handler.php"; ?>
    </div>
    <div class="status-card">
      <?php include_once "handlers/postgreChecker.handler.php"; ?>
    </div>
  </div>

  <div style="text-align: center;">
    <a href="/pages/login/index.php" class="btn">Go to Login Page</a>
  </div>
</div>

<?php
$content = ob_get_clean();
$pageTitle = "System Status | AD-Meeting-Calendar";
$extraCss = '<link rel="stylesheet" href="/assets/css/status.css">';

// Use the layout
include LAYOUTS_PATH . '/main.layout.php';
