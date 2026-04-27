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
<section class="hero-slider swiper">
    <div class="noise-overlay"></div>
    <div class="swiper-wrapper">
        <!-- Slide 1: Meuble -->
        <div class="swiper-slide">
            <div class="slide-bg" style="background-image: url('<?= e(asset('img/slider/furniture.png')) ?>')"></div>
            <div class="hero-overlay"></div>
            <div class="ghost-number">01</div>
            <div class="container slide-inner" data-swiper-parallax="-300">
                <div class="eyebrow-wrap"><span class="eyebrow">L'Art de Recevoir</span></div>
                <div class="title-wrap"><h1 class="hero-title">Mobilier d'<em>Exception</em></h1></div>
                <div class="lead-wrap"><p class="hero-lead">Sublimez vos espaces avec une collection de mobilier pensée pour les événements les plus prestigieux du Royaume.</p></div>
                <div class="hero-cta">
                    <a href="<?= e(url('/meuble-de-bureau')) ?>" class="btn btn-primary">Voir la collection</a>
                    <a href="<?= e(url('/contact')) ?>" class="btn btn-ghost">Nous contacter</a>
                </div>
            </div>
        </div>

        <!-- Slide 2: Tech -->
        <div class="swiper-slide">
            <div class="slide-bg" style="background-image: url('<?= e(asset('img/slider/tech.png')) ?>')"></div>
            <div class="hero-overlay"></div>
            <div class="ghost-number">02</div>
            <div class="container slide-inner" data-swiper-parallax="-300">
                <div class="eyebrow-wrap"><span class="eyebrow">Avant-Garde</span></div>
                <div class="title-wrap"><h1 class="hero-title"><em>Technologies</em> Invisibles</h1></div>
                <div class="lead-wrap"><p class="hero-lead">Parcs informatiques et solutions tactiles de pointe, intégrés avec une discrétion absolue dans votre décor.</p></div>
                <div class="hero-cta">
                    <a href="<?= e(url('/informatique')) ?>" class="btn btn-primary">Solutions Mobiles</a>
                    <a href="<?= e(url('/realisations')) ?>" class="btn btn-ghost">Portfolio</a>
                </div>
            </div>
        </div>

        <!-- Slide 3: Audio -->
        <div class="swiper-slide">
            <div class="slide-bg" style="background-image: url('<?= e(asset('img/slider/audio.png')) ?>')"></div>
            <div class="hero-overlay"></div>
            <div class="ghost-number">03</div>
            <div class="container slide-inner" data-swiper-parallax="-300">
                <div class="eyebrow-wrap"><span class="eyebrow">Pureté Acoustique</span></div>
                <div class="title-wrap"><h1 class="hero-title">Sonorisation <em>Haute-Couture</em></h1></div>
                <div class="lead-wrap"><p class="hero-lead">Une ingénierie sonore précise pour une immersion totale. La clarté parfaite au service de vos discours.</p></div>
                <div class="hero-cta">
                    <a href="<?= e(url('/sonorisation')) ?>" class="btn btn-primary">Explorer l'audio</a>
                    <a href="tel:<?= e($phoneClean) ?>" class="btn btn-ghost">Appeler un expert</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Layout Aids -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
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
