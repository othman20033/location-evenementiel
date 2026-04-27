<?php
/**
 * @var array<int, array<string, string>> $categories
 * @var array<int, array<string, string>> $featured
 * @var array<int, array<string, string>> $testimonials
 */
$phoneClean = $site['phone_clean'] ?? preg_replace('/\s+/', '', $site['phone']);

/** Map slug → titre lisible pour les badges produits */
$categoryLabel = [];
foreach ($categories as $c) { $categoryLabel[$c['slug']] = $c['title']; }
?>

<!-- HERO SLIDER -->
<section class="hero" id="heroSlider">
    <div class="slider-container">
        <!-- Slide 1: Meubles -->
        <div class="slide is-active">
            <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1505236858219-8359eb29e329?w=1900&q=85')"></div>
            <div class="hero-overlay"></div>
            <div class="container hero-inner">
                <span class="eyebrow">Location de matériel haut de gamme</span>
                <h1 class="hero-title">
                    Le bon matériel,<br>
                    au <em>bon moment</em>.
                </h1>
                <p class="hero-lead">
                    Meubles de bureau, équipement informatique et sonorisation professionnelle.
                    Livraison, installation et reprise sur tout le Maroc.
                </p>
                <div class="hero-cta">
                    <a href="<?= e(url('/contact')) ?>" class="btn btn-primary btn-lg">
                        Démarrer mon projet
                        <i class="lucide lucide-arrow-right"></i>
                    </a>
                    <a href="tel:<?= e($phoneClean) ?>" class="btn btn-ghost btn-lg">
                        <i class="lucide lucide-phone"></i>
                        <?= e($site['phone']) ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 2: Informatique -->
        <div class="slide">
            <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1491975474562-1f4e30bc9468?w=1900&q=85')"></div>
            <div class="hero-overlay"></div>
            <div class="container hero-inner">
                <span class="eyebrow">Expertise Technologique</span>
                <h2 class="hero-title">
                    Solutions <em>Informatiques</em><br>
                    Clé-en-main.
                </h2>
                <p class="hero-lead">
                    Écrans géants, PC haute performance et bornes interactives.
                    Un parc informatique moderne pour vos conférences et salons.
                </p>
                <div class="hero-cta">
                    <a href="<?= e(url('/informatique')) ?>" class="btn btn-primary btn-lg">
                        Voir le catalogue IT
                        <i class="lucide lucide-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Slide 3: Sonorisation -->
        <div class="slide">
            <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=1900&q=85')"></div>
            <div class="hero-overlay"></div>
            <div class="container hero-inner">
                <span class="eyebrow">Expérience Sonore</span>
                <h2 class="hero-title">
                    Une <em>Sonorisation</em><br>
                    Irréprochable.
                </h2>
                <p class="hero-lead">
                    Systèmes audio professionnels, micros sans fil et régie complète.
                    Donnez de la voix à vos événements les plus prestigieux.
                </p>
                <div class="hero-cta">
                    <a href="<?= e(url('/sonorisation')) ?>" class="btn btn-primary btn-lg">
                        Découvrir le matériel audio
                        <i class="lucide lucide-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider Controls -->
    <div class="slider-controls">
        <button class="slider-prev" aria-label="Slide Précédent"><i class="lucide lucide-chevron-left"></i></button>
        <div class="slider-dots"></div>
        <button class="slider-next" aria-label="Slide Suivant"><i class="lucide lucide-chevron-right"></i></button>
    </div>

    <!-- Progress bar -->
    <div class="slider-progress">
        <div class="progress-bar"></div>
    </div>

    <div class="hero-stats-wrapper">
        <div class="container">
            <div class="hero-stats">
                <div><strong>3</strong><span>Catégories</span></div>
                <div><strong>500+</strong><span>Événements livrés</span></div>
                <div><strong>24h</strong><span>Délai de réponse</span></div>
            </div>
        </div>
    </div>
</section>

<!-- CATÉGORIES -->
<section class="section categories-section" id="categories">
    <div class="container">
        <header class="section-head reveal">
            <span class="eyebrow">Notre catalogue</span>
            <h2>Trois <em>univers</em>, une seule équipe</h2>
            <p>Des produits sélectionnés, entretenus et livrés clé-en-main pour vos événements.</p>
        </header>

        <div class="categories-grid">
            <?php foreach ($categories as $cat): ?>
                <a href="<?= e(url($cat['url'])) ?>" class="category-card reveal">
                    <div class="category-image" style="background-image:url('<?= e($cat['image']) ?>')" aria-hidden="true"></div>
                    <div class="category-body">
                        <span class="category-icon"><i class="lucide lucide-<?= e($cat['icon']) ?>"></i></span>
                        <h3><?= e($cat['title']) ?></h3>
                        <p><?= e($cat['description']) ?></p>
                        <span class="link-arrow">
                            Voir les produits
                            <i class="lucide lucide-arrow-right"></i>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PRODUITS PHARES -->
<section class="section featured-section">
    <div class="container">
        <header class="section-head reveal">
            <span class="eyebrow">Produits phares</span>
            <h2>Le matériel le plus <em>demandé</em></h2>
        </header>

        <div class="products-grid">
            <?php foreach ($featured as $product): ?>
                <article class="product-card reveal">
                    <div class="product-image">
                        <img src="<?= e($product['image']) ?>" alt="<?= e($product['name']) ?>" loading="lazy">
                        <span class="product-tag"><?= e($categoryLabel[$product['category']] ?? $product['category']) ?></span>
                    </div>
                    <div class="product-body">
                        <h3><?= e($product['name']) ?></h3>
                        <p><?= e($product['description']) ?></p>
                        <a href="<?= e(url('/' . $product['category'])) ?>" class="link-arrow">
                            En savoir plus
                            <i class="lucide lucide-arrow-right"></i>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- POURQUOI NOUS -->
<section class="section why-section">
    <div class="container">
        <header class="section-head reveal">
            <span class="eyebrow">Pourquoi nous choisir</span>
            <h2>Le souci du <em>détail</em>, l'exigence du <em>résultat</em></h2>
        </header>

        <div class="why-grid">
            <article class="why-card reveal">
                <div class="why-icon"><i class="lucide lucide-truck"></i></div>
                <h3>Livraison & installation</h3>
                <p>Logistique entièrement gérée par nos équipes : livraison, installation, reprise.</p>
            </article>
            <article class="why-card reveal">
                <div class="why-icon"><i class="lucide lucide-clock"></i></div>
                <h3>Réponse en 24h</h3>
                <p>Devis personnalisé sous 24h, même en haute saison événementielle.</p>
            </article>
            <article class="why-card reveal">
                <div class="why-icon"><i class="lucide lucide-shield-check"></i></div>
                <h3>Matériel garanti</h3>
                <p>Tout notre parc est testé, entretenu et renouvelé régulièrement.</p>
            </article>
            <article class="why-card reveal">
                <div class="why-icon"><i class="lucide lucide-headset"></i></div>
                <h3>Support sur place</h3>
                <p>Un technicien présent le jour J pour parer à toute imprévu.</p>
            </article>
        </div>
    </div>
</section>

<!-- TÉMOIGNAGES -->
<section class="section testimonials-section">
    <div class="container">
        <header class="section-head reveal">
            <span class="eyebrow">Ils nous font confiance</span>
            <h2>Ce que disent nos <em>clients</em></h2>
        </header>

        <div class="testimonials-grid">
            <?php foreach ($testimonials as $t): ?>
                <article class="testimonial-card reveal">
                    <div class="stars" aria-label="<?= e($t['rating']) ?> étoiles sur 5">
                        <?php for ($i = 0; $i < (int)$t['rating']; $i++): ?>
                            <i class="lucide lucide-star"></i>
                        <?php endfor; ?>
                    </div>
                    <blockquote>« <?= e($t['message']) ?> »</blockquote>
                    <footer>
                        <strong><?= e($t['name']) ?></strong>
                        <span><?= e($t['role']) ?></span>
                    </footer>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PARTENAIRES -->
<section class="section partners-section" style="background: var(--c-bg); border-top: 1px solid var(--c-line);">
    <div class="container">
        <div class="partners-grid" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center; gap: 4rem; opacity: 0.6;">
            <img src="https://upload.wikimedia.org/wikipedia/fr/0/07/Logo_OCP.svg" alt="OCP" style="height: 40px; filter: grayscale(1);">
            <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Technopark_Casablanca_Logo.png" alt="Technopark" style="height: 35px; filter: grayscale(1);">
            <img src="https://upload.wikimedia.org/wikipedia/fr/4/4b/Logo_Attijariwafa_bank.svg" alt="Attijariwafa" style="height: 35px; filter: grayscale(1);">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Logo_BMCE_Bank.svg/2560px-Logo_BMCE_Bank.svg.png" alt="BMCE" style="height: 30px; filter: grayscale(1);">
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section cta-section">
    <div class="container">
        <div class="cta-card reveal">
            <h2>Un projet en tête ? <em>Parlons-en.</em></h2>
            <p>Décrivez votre événement, recevez une proposition personnalisée sous 24h.</p>
            <div class="cta-actions">
                <a href="<?= e(url('/contact')) ?>" class="btn btn-primary btn-lg">
                    Démarrer mon projet
                    <i class="lucide lucide-arrow-right"></i>
                </a>
                <a href="tel:<?= e($phoneClean) ?>" class="btn btn-ghost btn-lg">
                    <i class="lucide lucide-phone"></i>
                    <?= e($site['phone']) ?>
                </a>
            </div>
        </div>
    </div>
</section>
