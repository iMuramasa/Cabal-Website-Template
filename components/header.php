<?php
/**
 * Header Component - Navigation and user authentication
 */

global $router;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true;
$username = $isLoggedIn ? ($_SESSION['user_data']['username'] ?? 'Player') : null;
?>

<header class="header">
    <div class="header__content">
        <div class="header__brand">
            <div class="header__brand-info">
                <h1>CABAL</h1>
            </div>
        </div>

        <nav class="nav" id="nav">
            <?php foreach ($router->getRoutes() as $page => $route): ?>
                <?php if (empty($route['hide_from_nav'])): ?>
                <a href="<?= $router->url($page) ?>" class="nav__link <?= $router->isActivePage($page) ? 'nav__link--active' : '' ?>">
                    <?= htmlspecialchars($route['nav_name']) ?>
                </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>

        <div class="user-menu">
            <?php if ($isLoggedIn): ?>
                <a href="/?page=cabinet" class="user-profile" id="user-profile">
                    <div class="user-profile__avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <span class="user-profile__name"><?= htmlspecialchars($username) ?></span>
                </a>
            <?php else: ?>
                <button class="user-menu__btn" id="user-toggle">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </button>
                <div class="user-menu__dropdown" id="user-dropdown">
                    <a href="#" onclick="openModal('login');return false;">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                    <a href="#" onclick="openModal('register');return false;">
                        <i class="fas fa-user-plus"></i> Register
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
