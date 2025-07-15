<?php
require_once UTILS_PATH . 'auth.util.php';

Auth::init();
if (!Auth::check()) {
    header("Location: /pages/login/index.php");
    exit;
}

$user = Auth::user();
$pageTitle = "Dashboard";

// Capture content using output buffering
ob_start();
?>

<div class="container">
  <h1>Welcome, <?= htmlspecialchars($user['full_name']) ?>!</h1>
  <p>This is your dashboard. You can manage meetings and view tasks here.</p>

  <a href="/pages/authLogout/index.php" class="btn">Logout</a>
</div>

<?php
$content = ob_get_clean();
include LAYOUTS_PATH . '/dashboard.layout.php'; // Adjust path if needed
