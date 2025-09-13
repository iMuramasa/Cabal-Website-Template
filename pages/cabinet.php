<?php
/**
 * Cabinet Page - User account management and character information
 */
?>

<div class="section-header">
    <h2>User Cabinet</h2>
    <p>Account management and character information</p>
</div>

<?php if (!$isLoggedIn): ?>
<!-- Login form for unauthorized users -->
<div class="auth-required card">
    <div class="auth-message">
        <i class="fas fa-lock" style="font-size: 48px; color: var(--accent-2); margin-bottom: 16px;"></i>
        <h3>Authorization Required</h3>
        <p>You must login to access your cabinet</p>
        <div class="auth-buttons">
            <button onclick="openModal('login')" class="btn btn--primary">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
            <button onclick="openModal('register')" class="btn btn--ghost">
                <i class="fas fa-user-plus"></i> Register
            </button>
        </div>
    </div>
</div>
<?php else: ?>
<!-- Cabinet for authorized users -->
<div class="cabinet-container">
        <div class="cabinet-sidebar">
            <div class="cabinet-nav card">
                <div class="cabinet__user-profile">
                    <div class="cabinet__user-avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="cabinet__user-info">
                        <h3><?= htmlspecialchars($userData['username']) ?></h3>
                        <p class="cabinet__user-status">Active player</p>
                    </div>
                </div>
                
                <div class="cabinet-nav__list">
                    <a href="#profile" class="cabinet-nav__item cabinet-nav__item--active">
                        <i class="fas fa-user"></i> Profile
                    </a>
                    <a href="#characters" class="cabinet-nav__item">
                        <i class="fas fa-users"></i> Characters
                    </a>
                </div>
            </div>
        </div>
        
        <div class="cabinet__content">
            <div class="cabinet__section cabinet__section--active" id="profile">
                <div class="card">
                    <h3><i class="fas fa-user"></i> Account Information</h3>
                    <div class="profile-info">
                        <div class="info-row">
                            <span class="info-label">Login:</span>
                            <span class="info-value"><?= htmlspecialchars($userData['username']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email:</span>
                            <span class="info-value"><?= htmlspecialchars($userData['email']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Registration:</span>
                            <span class="info-value"><?= date('d.m.Y', strtotime($userData['registration_date'])) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Last login:</span>
                            <span class="info-value">Today, 14:23</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Account status:</span>
                            <span class="info-value status-active">Active</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Balance:</span>
                            <div class="info-balance">
                                <span class="info-value">1,250 <i class="fas fa-coins" style="color:#ffc107;"></i></span>
                                <button class="btn-balance-add" onclick="alert('Add balance')"><i class="fas fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="profile-actions">
                        <button class="btn btn--primary">Change password</button>
                        <button class="btn btn--ghost">Change email</button>
                        <button class="btn btn--danger" onclick="logout()" style="margin-left:auto;">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="cabinet__section" id="characters">
                <div class="card">
                    <h3><i class="fas fa-users"></i> My Characters</h3>
                    <div class="characters-grid">
                        <?php foreach ($userData['characters'] as $character): ?>
                        <div class="character-card">
                            <div class="character-avatar">
                                <img src="https://picsum.photos/80/80?random=<?= $character['level'] ?>" alt="<?= htmlspecialchars($character['class']) ?>" style="width:80px;height:80px;border-radius:12px;object-fit:cover;">
                            </div>
                            <div class="character-info">
                                <h4><?= htmlspecialchars($character['name']) ?></h4>
                                <p class="character-class"><?= htmlspecialchars($character['class']) ?></p>
                                <div class="character-level">Level <?= $character['level'] ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
