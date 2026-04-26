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

<!-- HERO -->
<section class="hero">
    <div class="hero-bg" aria-hidden="true">
        <div class="hero-overlay"></div>
    </div>

    <div class="container hero-inner">
        <span class="eyebrow reveal">Location de matériel événementiel</span>
        <h1 class="hero-title reveal">
            Le bon matériel,<br>
            au <em>bon moment</em>.
        </h1>
        <p class="hero-lead reveal">
            Meubles de bureau, équipement informatique et sonorisation professionnelle.
            Livraison, installation et reprise sur tout le Maroc.
        </p>
        <div class="hero-cta reveal">
            <a href="<?= e(url('/contact')) ?>" class="btn btn-primary btn-lg">
                Demander un devis
                <i class="lucide lucide-arrow-right"></i>
            </a>
            <a href="tel:<?= e($phoneClean) ?>" class="btn btn-ghost btn-lg">
                <i class="lucide lucide-phone"></i>
                <?= e($site['phone']) ?>
            </a>
        </div>

        <div class="hero-stats reveal">
            <div><strong>3</strong><span>Catégories</span></div>
            <div><strong>500+</strong><span>Événements livrés</span></div>
            <div><strong>24h</strong><span>Délai de réponse</span></div>
        </div>
    </div>

    <a href="#categories" class="hero-scroll" aria-label="Faire défiler"><span></span></a>
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
