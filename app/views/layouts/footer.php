<?php
/** @var array<string, mixed> $site */
$phoneClean = $site['phone_clean'] ?? preg_replace('/\s+/', '', $site['phone']);
?>
</main>

<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-brand">
            <div class="brand">
                <span class="brand-mark" aria-hidden="true">L</span>
                <span class="brand-text">
                    <span class="brand-name"><?= e($site['name']) ?></span>
                    <span class="brand-tag">Location de matériel événementiel</span>
                </span>
            </div>
            <p class="footer-about">
                Spécialiste de la location de meubles de bureau, matériel informatique
                et sonorisation pour vos événements professionnels au Maroc.
            </p>
            <div class="socials">
                <a href="<?= e($site['social']['facebook']) ?>"  aria-label="Facebook"  rel="noopener"><i class="lucide lucide-facebook"></i></a>
                <a href="<?= e($site['social']['instagram']) ?>" aria-label="Instagram" rel="noopener"><i class="lucide lucide-instagram"></i></a>
                <a href="<?= e($site['social']['whatsapp']) ?>"  aria-label="WhatsApp"  rel="noopener"><i class="lucide lucide-message-circle"></i></a>
            </div>
        </div>

        <div class="footer-col">
            <h4>Navigation</h4>
            <ul>
                <li><a href="<?= e(url('/')) ?>">Accueil</a></li>
                <li><a href="<?= e(url('/a-propos-de-nous')) ?>">À propos de nous</a></li>
                <li><a href="<?= e(url('/contact')) ?>">Contact</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Catalogue</h4>
            <ul>
                <li><a href="<?= e(url('/meuble-de-bureau')) ?>">Meuble de bureau</a></li>
                <li><a href="<?= e(url('/informatique')) ?>">Informatique</a></li>
                <li><a href="<?= e(url('/sonorisation')) ?>">Sonorisation</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Contact</h4>
            <ul class="contact-list">
                <li><i class="lucide lucide-map-pin"></i> <?= e($site['address']) ?></li>
                <li><i class="lucide lucide-phone"></i>   <a href="tel:<?= e($phoneClean) ?>"><?= e($site['phone']) ?></a></li>
                <li><i class="lucide lucide-mail"></i>    <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>© <?= date('Y') ?> <?= e($site['name']) ?>. Tous droits réservés.</p>
            <p class="footer-credits">Architecture MVC · PHP natif · Singleton DB</p>
        </div>
    </div>
</footer>

<a href="tel:<?= e($phoneClean) ?>" class="floating-call" aria-label="Appeler maintenant">
    <i class="lucide lucide-phone"></i>
</a>

<a href="#" class="back-to-top" id="backToTop" aria-label="Retour en haut">
    <i class="lucide lucide-arrow-up"></i>
</a>

<script src="<?= e(asset('js/main.js')) ?>" defer></script>
</body>
</html>
