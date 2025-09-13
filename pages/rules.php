<?php
/**
 * Rules Page - Server rules and regulations display
 */
?>

<div class="section-header">
    <h2>Game Rules</h2>
    <p>Familiarize yourself with the rules of behavior in the game</p>
</div>

<div class="rules-container">
    <div class="rules-nav card">
        <h3>Contents</h3>
        <ul class="rules-nav-list">
            <?php $isFirst = true; foreach ($rules as $ruleKey => $ruleSection): ?>
            <li><a href="#<?= $ruleKey ?>" class="rules-nav-link <?= $isFirst ? 'rules-nav-link--active' : '' ?>"><?= htmlspecialchars($ruleSection['title']) ?></a></li>
            <?php $isFirst = false; endforeach; ?>
        </ul>
    </div>
    
    <div class="rules-content">
        <?php $isFirst = true; foreach ($rules as $ruleKey => $ruleSection): ?>
        <div class="rule-section card <?= $isFirst ? 'rule-section--active' : '' ?>" id="<?= $ruleKey ?>">
            <h3><?= htmlspecialchars($ruleSection['title']) ?></h3>
            <div class="rule-text">
                <?php foreach ($ruleSection['items'] as $index => $ruleItem): ?>
                <p><strong><?= ($index + 1) ?>.</strong> <?= htmlspecialchars($ruleItem) ?></p>
                <?php endforeach; ?>
            </div>
        </div>
        <?php $isFirst = false; endforeach; ?>
    </div>
</div>
