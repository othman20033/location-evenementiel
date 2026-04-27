<?php
/** @var array<string, mixed> $site */
/** @var string $currentRoute */
$pageTitle       = $pageTitle       ?? 'Bienvenue';
$pageDescription = $pageDescription ?? ($site['tagline'] ?? '');
$current         = $currentRoute ?? '/';
$phoneClean      = $site['phone_clean'] ?? preg_replace('/\s+/', '', $site['phone']);
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="author" content="<?= e($site['name']) ?>">
    <meta name="theme-color" content="#0b0d12">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= e($pageTitle . ' — ' . $site['name']) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:type" content="website">

    <title><?= e($pageTitle . ' — ' . $site['name']) ?></title>

    <!-- Fonts: Bodoni Moda (Editorial Serif) & Plus Jakarta Sans (Modern Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lucide-static@latest/font/lucide.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
</head>
<body data-route="<?= e($current) ?>">

<a class="skip-link" href="#main">Aller au contenu</a>

<header class="site-header" id="siteHeader">
    <div class="container nav-container">
        <a href="<?= e(url('/')) ?>" class="brand" aria-label="Accueil <?= e($site['name']) ?>">
            <span class="brand-mark" aria-hidden="true">L</span>
            <span class="brand-text">
                <span class="brand-name"><?= e($site['name']) ?></span>
                <span class="brand-tag">Casablanca · depuis 2010</span>
            </span>
        </a>

        <nav class="primary-nav" id="primaryNav" aria-label="Navigation principale">
            <ul>
                <li><a href="<?= e(url('/')) ?>" class="<?= $current === '/' ? 'is-active' : '' ?>">Accueil</a></li>
                <li class="has-dropdown">
                    <a href="#" class="<?= in_array($current, ['/meuble-de-bureau', '/informatique', '/sonorisation']) ? 'is-active' : '' ?>" onclick="return false;">
                        Matériel
                        <i class="lucide lucide-chevron-down"></i>
                    </a>
                    <ul class="dropdown">
                        <li><a href="<?= e(url('/meuble-de-bureau')) ?>">Meuble de bureau</a></li>
                        <li><a href="<?= e(url('/informatique')) ?>">Informatique</a></li>
                        <li><a href="<?= e(url('/sonorisation')) ?>">Sonorisation</a></li>
                    </ul>
                </li>
                <li><a href="<?= e(url('/realisations')) ?>" class="<?= $current === '/realisations' ? 'is-active' : '' ?>">Réalisations</a></li>
                <li><a href="<?= e(url('/partenaires')) ?>" class="<?= $current === '/partenaires' ? 'is-active' : '' ?>">Partenaires</a></li>
                <li><a href="<?= e(url('/blog')) ?>" class="<?= $current === '/blog' ? 'is-active' : '' ?>">Blog</a></li>
                <li><a href="<?= e(url('/a-propos-de-nous')) ?>" class="<?= $current === '/a-propos-de-nous' ? 'is-active' : '' ?>">À propos</a></li>
                <li><a href="<?= e(url('/contact')) ?>" class="<?= $current === '/contact' ? 'is-active' : '' ?>">Contact</a></li>
            </ul>
        </nav>

        <div class="header-actions">
            <a href="tel:<?= e($phoneClean) ?>" class="btn btn-primary nav-cta" aria-label="Appeler maintenant">
                <i class="lucide lucide-phone"></i>
                <span><?= e($site['phone']) ?></span>
            </a>
            <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="primaryNav">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<main id="main">
