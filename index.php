<?php
/**
 * Main application entry point
 */

require_once __DIR__ . '/includes/router.php';
$router = new Router();
$GLOBALS['router'] = $router;

ob_start();
$pageContent = $router->dispatch();
$pageContent = ob_get_clean();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= htmlspecialchars($router->getPageTitle()) ?> - Cabal Online</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'components/header.php'; ?>

  <div class="site">
        <main class="main">
            <?= $pageContent ?>
    </main>
  </div>

    <?php include 'components/modals.php'; ?>
    <?php include 'components/footer.php'; ?>

    <script src="js/main.js"></script>
</body>
</html>
