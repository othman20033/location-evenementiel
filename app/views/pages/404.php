<?php $title = $title ?? 'Page introuvable'; $message = $message ?? "Cette page n'existe pas."; ?>
<section class="section error-section">
    <div class="container error-wrap">
        <span class="eyebrow">Erreur 404</span>
        <h1><?= e($title) ?></h1>
        <p><?= e($message) ?></p>
        <a href="<?= e(url('/')) ?>" class="btn btn-primary btn-lg">
            <i class="lucide lucide-arrow-left"></i> Retour à l'accueil
        </a>
    </div>
</section>
