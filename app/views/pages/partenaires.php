<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal">Confiance</span>
        <h1 class="reveal">Nos <em>Partenaires</em></h1>
        <p class="reveal"><?= e($pageDescription) ?></p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="why-grid">
            <?php foreach ($partners as $partner): ?>
                <div class="why-card reveal" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 200px;">
                    <img src="<?= e($partner['logo']) ?>" alt="<?= e($partner['name']) ?>" style="max-width: 150px; filter: grayscale(1); opacity: 0.7; transition: all 0.3s ease;" onmouseover="this.style.filter='grayscale(0)';this.style.opacity='1'" onmouseout="this.style.filter='grayscale(1)';this.style.opacity='0.7'">
                    <h3 style="margin-top: 1.5rem; font-size: 1rem;"><?= e($partner['name']) ?></h3>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section featured-section">
    <div class="container text-center" style="text-align: center;">
        <h2>Vous souhaitez devenir partenaire ?</h2>
        <p style="max-width: 600px; margin: 1rem auto 2rem;">Nous sommes toujours à la recherche de collaborations fructueuses pour offrir le meilleur service à nos clients.</p>
        <a href="<?= e(url('/contact')) ?>" class="btn btn-primary">Contactez-nous</a>
    </div>
</section>
