<?php
// dashboard.layout.php

// Usage: Set $pageTitle and $content before including this file
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $pageTitle ?? 'Dashboard' ?> | AD-Meeting-Calendar</title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body>

  <?php include COMPONENTS_PATH . '/templates/header.component.php'; ?>

  <div class="dashboard-container">
    <main class="dashboard-main">
      <?= $content ?>
    </main>
  </div>

</body>
</html>
