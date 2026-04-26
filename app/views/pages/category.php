<?php
/**
 * @var array<string, string>              $category
 * @var array<int, array<string, string>>  $products
 * @var array<int, array<string, string>>  $otherCategories
 */
$phoneClean = $site['phone_clean'] ?? preg_replace('/\s+/', '', $site['phone']);
?>

<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal"><i class="lucide lucide-<?= e($category['icon']) ?>"></i> <?= e($category['title']) ?></span>
        <h1 class="reveal"><?= e($category['title']) ?></h1>
        <p class="reveal"><?= e($category['description']) ?></p>
        <nav class="page-breadcrumb reveal" aria-label="Fil d'ariane">
            <a href="<?= e(url('/')) ?>">Accueil</a>
            <span aria-hidden="true">/</span>
            <strong><?= e($category['title']) ?></strong>
        </nav>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <article class="product-card reveal">
                    <div class="product-image">
                        <img src="<?= e($product['image']) ?>" alt="<?= e($product['name']) ?>" loading="lazy">
                        <span class="product-tag"><?= e($category['title']) ?></span>
                    </div>
                    <div class="product-body">
                        <h3><?= e($product['name']) ?></h3>
                        <p><?= e($product['description']) ?></p>
                        <div class="product-actions">
                            <a href="<?= e(url('/contact')) ?>" class="btn btn-outline btn-sm">
                                Demander un devis
                                <i class="lucide lucide-arrow-right"></i>
                            </a>
                            <a href="tel:<?= e($phoneClean) ?>" class="btn-icon" aria-label="Appeler">
                                <i class="lucide lucide-phone"></i>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- AUTRES CATÉGORIES -->
<section class="section other-cats-section">
    <div class="container">
        <header class="section-head reveal">
            <span class="eyebrow">Découvrir aussi</span>
            <h2>Autres <em>catégories</em></h2>
        </header>

        <div class="categories-grid">
            <?php foreach ($otherCategories as $cat): ?>
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

<!-- CTA -->
<section class="section cta-section">
    <div class="container">
        <div class="cta-card reveal">
            <h2>Une question sur un produit ?</h2>
            <p>Notre équipe vous répond et établit votre devis sous 24h.</p>
            <div class="cta-actions">
                <a href="<?= e(url('/contact')) ?>" class="btn btn-primary btn-lg">
                    Demander un devis
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
