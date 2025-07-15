<!-- /layouts/main.layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $pageTitle ?? 'AD Meeting Calendar' ?></title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <?php if (!empty($extraCss)) echo $extraCss; ?>
</head>
<body>
  <?php include COMPONENTS_PATH . '/templates/header.component.php'; ?>

  <main>
    <?= $content ?>
  </main>
</body>
</html>
