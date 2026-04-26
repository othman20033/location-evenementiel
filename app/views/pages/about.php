<?php $phoneClean = $site['phone_clean'] ?? preg_replace('/\s+/', '', $site['phone']); ?>
<section class="page-hero">
    <div class="container">
        <span class="eyebrow reveal">À propos de nous</span>
        <h1 class="reveal">Votre partenaire <em>matériel</em><br>pour des événements <em>réussis</em></h1>
        <p class="reveal">
            Depuis plus de 10 ans, <?= e($site['name']) ?> accompagne entreprises, agences événementielles
            et institutions au Maroc avec un parc de matériel professionnel : meubles, informatique et sonorisation.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-grid">
            <div class="about-text reveal">
                <span class="eyebrow">Notre approche</span>
                <h2>De la <em>logistique</em> au sur-mesure</h2>
                <p>
                    Implantés à Casablanca, nous opérons sur tout le territoire national.
                    Notre force : un stock conséquent, une équipe technique réactive et une
                    logistique maîtrisée, du retrait du matériel à la reprise post-événement.
                </p>
                <p>
                    Que ce soit pour une conférence de 50 personnes, un salon professionnel
                    ou une formation de plusieurs semaines, nous adaptons notre offre à
                    vos contraintes de délai, de volume et de budget.
                </p>
                <a href="<?= e(url('/contact')) ?>" class="btn btn-primary">
                    Nous contacter
                    <i class="lucide lucide-arrow-right"></i>
                </a>
            </div>
            <div class="about-image reveal" aria-hidden="true">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80" alt="Salle de réunion équipée">
            </div>
        </div>
    </div>
</section>

<section class="section values-section">
    <div class="container">
        <header class="section-head reveal">
            <span class="eyebrow">Nos engagements</span>
            <h2>Ce qui nous <em>distingue</em></h2>
        </header>

        <div class="values-grid">
            <article class="value-card reveal">
                <div class="why-icon"><i class="lucide lucide-truck"></i></div>
                <h3>Logistique intégrée</h3>
                <p>Livraison, installation et reprise gérées par nos équipes internes.</p>
            </article>
            <article class="value-card reveal">
                <div class="why-icon"><i class="lucide lucide-headset"></i></div>
                <h3>Support technique</h3>
                <p>Un technicien sur place le jour J pour vos événements stratégiques.</p>
            </article>
            <article class="value-card reveal">
                <div class="why-icon"><i class="lucide lucide-package-check"></i></div>
                <h3>Stock disponible</h3>
                <p>Un parc important pour répondre aux urgences et aux gros volumes.</p>
            </article>
            <article class="value-card reveal">
                <div class="why-icon"><i class="lucide lucide-handshake"></i></div>
                <h3>Tarifs transparents</h3>
                <p>Devis détaillé sous 24h, sans frais cachés ni mauvaises surprises.</p>
            </article>
        </div>
    </div>
</section>

<section class="section stats-section">
    <div class="container stats-grid">
        <div class="reveal"><strong>500+</strong><span>Événements livrés</span></div>
        <div class="reveal"><strong>10+</strong><span>Années d'activité</span></div>
        <div class="reveal"><strong>3</strong><span>Pôles d'expertise</span></div>
        <div class="reveal"><strong>24h</strong><span>Délai de devis</span></div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <div class="cta-card reveal">
            <h2>Travaillons <em>ensemble</em>.</h2>
            <p>Notre équipe se tient à votre disposition pour étudier votre projet.</p>
            <div class="cta-actions">
                <a href="<?= e(url('/contact')) ?>" class="btn btn-primary btn-lg">
                    Nous contacter
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
