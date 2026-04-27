<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal">Actualités</span>
        <h1 class="reveal">Notre <em>Blog</em></h1>
        <p class="reveal"><?= e($pageDescription) ?></p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="products-grid">
            <?php foreach ($posts as $post): ?>
                <article class="product-card reveal">
                    <div class="product-image">
                        <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy">
                    </div>
                    <div class="product-body">
                        <span class="eyebrow" style="font-size: 0.7rem; padding: 0; margin: 0;"><?= e($post['date']) ?></span>
                        <h3 style="margin-top: 0.5rem;"><?= e($post['title']) ?></h3>
                        <p><?= e($post['excerpt']) ?></p>
                        <span class="link-arrow">Lire la suite <i class="lucide lucide-arrow-right"></i></span>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
