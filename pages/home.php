<?php
/**
 * Home Page - Main landing page with server info and latest news
 */
?>

<div class="hero">
    <div class="card hero-left">
        <div class="hero__content">
            <div class="hero__intro">
                <h2>Cabal Online</h2>
                <p>Join thousands of players in an epic MMORPG with unique combat system, exciting dungeons and PvP battles.</p>
            </div>
            
            <div class="hero__media">
                <div class="video-section">
                    <div class="video-container">
                        <iframe width="100%" height="280" src="https://www.youtube.com/" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius:8px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <aside class="card hero__stats">
        <div class="stats-section">
            <div class="stats-grid--compact">
                <div class="stat-item--compact">
                    <div class="number"><?= number_format($stats['accounts']) ?></div>
                    <div class="label">accounts created</div>
                </div>
                <div class="stat-item--compact">
                    <div class="number"><?= number_format($stats['characters']) ?></div>
                    <div class="label">characters created</div>
                </div>
                <div class="stat-item--compact">
                    <div class="number"><?= number_format($stats['online']) ?></div>
                    <div class="label">players online</div>
                </div>
            </div>
        </div>
        
        <div class="rates-section">
            <h4 style="margin:0 0 16px 0;font-size:16px;font-weight:600;color:var(--accent-2);">Rates</h4>
            <div class="rates-list">
                <?php foreach ($stats['rates'] as $rateName => $rateValue): ?>
                <div class="rate-item">
                    <span class="rate-item__name"><?= htmlspecialchars($rateName) ?></span>
                    <span class="rate-item__value"><?= htmlspecialchars($rateValue) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </aside>
</div>

<div class="section-header" style="margin-top:60px;">
    <h2>Latest News</h2>
    <p>Stay updated with all game updates and events</p>
</div>

<div class="news-grid">
    <?php foreach ($latestNews as $article): ?>
    <article class="news-card">
        <div class="news-card__image" style="background-image: url('<?= htmlspecialchars($article['image']) ?>')"></div>
        <div class="news-card__content">
            <div class="news-card__meta">
                <span class="news-card__category"><?= htmlspecialchars($article['category']) ?></span>
                <time class="news-card__date"><?= date('d.m.Y', strtotime($article['date'])) ?></time>
            </div>
            <h3 class="news-card__title">
                <a href="/?page=news&id=<?= $article['id'] ?>"><?= htmlspecialchars($article['title']) ?></a>
            </h3>
            <p class="news-card__excerpt"><?= htmlspecialchars($article['excerpt']) ?></p>
            <a href="/?page=news&id=<?= $article['id'] ?>" class="news-card__link">Read more</a>
        </div>
    </article>
    <?php endforeach; ?>
</div>

<div class="text-center" style="margin-top:40px;">
    <a href="/?page=news" class="btn btn--ghost" style="font-size:16px;padding:12px 24px;">
        <i class="fas fa-arrow-right"></i> All news
    </a>
</div>
