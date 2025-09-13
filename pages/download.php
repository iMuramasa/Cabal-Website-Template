<?php
/**
 * Download Page - Game client download and system requirements
 */
?>

<div class="section-header">
    <h2>Download Cabal Online</h2>
    <p>Join thousands of players right now!</p>
</div>

<div class="download-hero card" style="margin-bottom:40px;">
    <div class="download-info">
        <div class="download-stats">
            <div class="download-stat">
                <i class="fas fa-users" style="color:var(--accent-2);"></i>
                <span>8888 players online</span>
            </div>
            <div class="download-stat">
                <i class="fas fa-user-plus" style="color:var(--success);"></i>
                <span>45,231 accounts created</span>
            </div>
            <div class="download-stat">
                <i class="fas fa-star" style="color:var(--accent-2);"></i>
                <span>High rates</span>
            </div>
        </div>
    </div>
</div>

<div class="download-options">
    <div class="download-card card">
        <div class="download-icon">
            <i class="fas fa-rocket"></i>
        </div>
        <div class="download-content">
            <h3>Launcher (Recommended)</h3>
            <p>Fast installation with automatic updates</p>
            <div class="download-features">
                <span class="feature"><i class="fas fa-check"></i> Auto-updates</span>
                <span class="feature"><i class="fas fa-check"></i> Easy installation</span>
                <span class="feature"><i class="fas fa-check"></i> File verification</span>
            </div>
            <div class="download-size">Size: <?= htmlspecialchars($downloadInfo['size']) ?></div>
            <a href="/download/launcher.exe" class="btn btn--primary download-btn">
                <i class="fas fa-download"></i>
                <div>
                    <span>Download launcher</span>
                    <small>For <?= htmlspecialchars($downloadInfo['requirements']['minimum']['OS']) ?></small>
                </div>
            </a>
        </div>
    </div>
    
    <div class="download-card card">
        <div class="download-icon">
            <i class="fas fa-file-archive"></i>
        </div>
        <div class="download-content">
            <h3>Full version</h3>
            <p>Game archive for advanced users</p>
            <div class="download-features">
                <span class="feature"><i class="fas fa-check"></i> Full archive</span>
                <span class="feature"><i class="fas fa-check"></i> No launcher</span>
                <span class="feature"><i class="fas fa-check"></i> Backup copy</span>
            </div>
            <div class="download-size">Size: ~15.8 GB</div>
            <a href="/download/cabal-full.zip" class="btn btn--ghost download-btn">
                <i class="fas fa-file-archive"></i>
                <div>
                    <span>Download archive</span>
                    <small>ZIP archive</small>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="system-requirements card" style="margin-top:40px;">
    <h3 style="margin-bottom:24px;color:var(--accent-2);text-align:center;">System Requirements</h3>
    <div class="requirements-grid">
        <div class="req-column card">
            <div class="req-header">
                <i class="fas fa-laptop" style="color:var(--accent);"></i>
                <h4>Minimum</h4>
            </div>
            <div class="req-list">
                <?php foreach ($downloadInfo['requirements']['minimum'] as $label => $value): ?>
                <div class="req-item">
                    <span class="req-label"><?= htmlspecialchars($label) ?>:</span>
                    <span class="req-value"><?= htmlspecialchars($value) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="req-column card">
            <div class="req-header">
                <i class="fas fa-desktop" style="color:var(--accent-2);"></i>
                <h4>Recommended</h4>
            </div>
            <div class="req-list">
                <?php foreach ($downloadInfo['requirements']['recommended'] as $label => $value): ?>
                <div class="req-item">
                    <span class="req-label"><?= htmlspecialchars($label) ?>:</span>
                    <span class="req-value"><?= htmlspecialchars($value) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
