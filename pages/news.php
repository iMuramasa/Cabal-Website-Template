<?php
/**
 * News Page - Game news and updates display
 */
?>

<?php if ($selectedNews): ?>
<!-- Detailed news view -->
<div class="news-detail">
    <div class="news-detail__header">
        <a href="/?page=news" class="btn btn--ghost">
            <i class="fas fa-arrow-left"></i> Back to news
        </a>
    </div>
    
    <article class="news-detail__article">
        <div class="news-detail__image" style="background-image: url('<?= htmlspecialchars($selectedNews['image']) ?>')"></div>
        <div class="news-detail__content">
            <div class="news-detail__meta">
                <span class="news-card__category"><?= htmlspecialchars($selectedNews['category']) ?></span>
                <time class="news-card__date"><?= date('d.m.Y', strtotime($selectedNews['date'])) ?></time>
            </div>
            <h1 class="news-detail__title"><?= htmlspecialchars($selectedNews['title']) ?></h1>
            <div class="news-detail__text">
                <p><?= htmlspecialchars($selectedNews['excerpt']) ?></p>
                <p><?= htmlspecialchars($selectedNews['content']) ?></p>
            </div>
        </div>
    </article>
</div>

<?php else: ?>
<!-- All news list -->
<div class="section-header">
    <h2>News and Updates</h2>
    <p>All important news, patches and game events</p>
</div>

<div class="news-grid">
    <?php foreach ($news as $article): ?>
    <article class="news-card <?= $article['featured'] ? 'news-card--featured' : '' ?>">
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
<?php endif; ?>
