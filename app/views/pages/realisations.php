<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal">Portfolio</span>
        <h1 class="reveal">Nos <em>Réalisations</em></h1>
        <p class="reveal"><?= e($pageDescription) ?></p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="products-grid">
            <?php foreach ($items as $item): ?>
                <article class="product-card reveal">
                    <div class="product-image">
                        <img src="<?= e($item['image']) ?>" alt="<?= e($item['title']) ?>" loading="lazy">
                        <div class="product-tag"><?= e($item['location']) ?></div>
                    </div>
                    <div class="product-body">
                        <div class="stars">
                            <?php foreach ($item['tags'] as $tag): ?>
                                <span style="font-size: 0.7rem; background: var(--c-bg-alt); padding: 2px 8px; border-radius: 4px;"><?= e($tag) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <h3><?= e($item['title']) ?></h3>
                        <p>Événement réussi avec déploiement complet de notre matériel matériel.</p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
