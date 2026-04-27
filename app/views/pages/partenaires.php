<?php
/** @var array<int, array{name:string,logo:string}> $partners */
?>

<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal">Confiance & Expertise</span>
        <h1 class="reveal">Nos <em>Partenaires</em></h1>
        <p class="reveal">Ils nous font confiance pour la réussite de leurs événements les plus prestigieux.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="partners-grid">
            <?php foreach ($partners as $partner): ?>
                <div class="partner-card reveal">
                    <img src="<?= e($partner['logo']) ?>" alt="<?= e($partner['name']) ?>" loading="lazy">
                    <span><?= e($partner['name']) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section featured-section">
    <div class="container">
        <div class="cta-card reveal">
            <h2>Devenir partenaire ?</h2>
            <p>Vous souhaitez collaborer avec nous pour vos futurs événements ?</p>
            <a href="<?= e(url('/contact')) ?>" class="btn btn-primary">Nous contacter</a>
        </div>
    </div>
</section>
