<?php
/** @var array<int, array{title:string,excerpt:string,image:string,date:string,slug:string}> $posts */
?>

<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal">Actualités</span>
        <h1 class="reveal">Notre <em>Blog</em></h1>
        <p class="reveal">Conseils, tendances et coulisses du monde de l'événementiel.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="blog-grid">
            <?php foreach ($posts as $post): ?>
                <article class="blog-card reveal">
                    <div class="blog-image">
                        <img src="<?= e($post['image']) ?>" alt="<?= e($post['title']) ?>" loading="lazy">
                    </div>
                    <div class="blog-body">
                        <span class="blog-date"><?= e($post['date']) ?></span>
                        <h3><?= e($post['title']) ?></h3>
                        <p><?= e($post['excerpt']) ?></p>
                        <a href="#" class="link-arrow">Lire l'article <i class="lucide lucide-arrow-right"></i></a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
