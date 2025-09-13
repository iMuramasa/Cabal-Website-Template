<?php
/**
 * Rating Page - Player and guild rankings display
 */
?>

<div class="section-header">
    <h2>Rankings</h2>
    <p>Top players, guilds and nations</p>
</div>

<div class="rating-tabs">
    <a href="/?page=rating&type=players" class="rating-tab <?= $currentType === 'players' ? 'rating-tab--active' : '' ?>">
        <i class="fas fa-user"></i> Players
    </a>
    <a href="/?page=rating&type=guilds" class="rating-tab <?= $currentType === 'guilds' ? 'rating-tab--active' : '' ?>">
        <i class="fas fa-users"></i> Guilds
    </a>
</div>

<div class="card">
    <div style="display:flex;justify-content:flex-start;align-items:center;margin-bottom:20px;">
        <span class="pill">Updated every 10 minutes</span>
    </div>
    
    <div class="rating-content">
        <table class="table rating-table">
            <thead>
                <tr>
                    <th class="rank-column">#</th>
                    <?php if ($currentType === 'players'): ?>
                        <th>Player</th>
                        <th>Class</th>
                        <th>Level</th>
                        <th>Experience</th>
                        <th>Nation</th>
                    <?php else: ?>
                        <th>Guild</th>
                        <th>Leader</th>
                        <th>Members</th>
                        <th>Points</th>
                        <th>Nation</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rating[$currentType] as $item): ?>
                <tr>
                    <td class="rank-column"><?= $item['rank'] ?></td>
                    <?php if ($currentType === 'players'): ?>
                        <td class="player-name"><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['class']) ?></td>
                        <td><strong><?= $item['level'] ?></strong></td>
                        <td><?= htmlspecialchars($item['exp']) ?></td>
                        <td>
                            <span class="nation nation--<?= strtolower($item['nation']) ?>">
                                <?= htmlspecialchars($item['nation']) ?>
                            </span>
                        </td>
                    <?php else: ?>
                        <td class="guild-name"><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= htmlspecialchars($item['master']) ?></td>
                        <td><?= $item['members'] ?></td>
                        <td><strong><?= number_format($item['points']) ?></strong></td>
                        <td>
                            <span class="nation nation--<?= strtolower($item['nation']) ?>">
                                <?= htmlspecialchars($item['nation']) ?>
                            </span>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
