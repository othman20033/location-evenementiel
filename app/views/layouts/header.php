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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lucide-static@latest/font/lucide.css">

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

        <button class="nav-toggle" id="navToggle" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="primaryNav">
            <span></span><span></span><span></span>
        </button>

        <nav class="primary-nav" id="primaryNav" aria-label="Navigation principale">
            <ul>
                <li><a href="<?= e(url('/')) ?>"                  class="<?= $current === '/' ? 'is-active' : '' ?>">Accueil</a></li>
                <li><a href="<?= e(url('/a-propos-de-nous')) ?>"  class="<?= $current === '/a-propos-de-nous' ? 'is-active' : '' ?>">À propos de nous</a></li>
                <li><a href="<?= e(url('/meuble-de-bureau')) ?>"  class="<?= $current === '/meuble-de-bureau' ? 'is-active' : '' ?>">Meuble de bureau</a></li>
                <li><a href="<?= e(url('/informatique')) ?>"      class="<?= $current === '/informatique' ? 'is-active' : '' ?>">Informatique</a></li>
                <li><a href="<?= e(url('/sonorisation')) ?>"      class="<?= $current === '/sonorisation' ? 'is-active' : '' ?>">Sonorisation</a></li>
                <li><a href="<?= e(url('/contact')) ?>"           class="<?= $current === '/contact' ? 'is-active' : '' ?>">Contact</a></li>
            </ul>
            <a href="tel:<?= e($phoneClean) ?>" class="btn btn-primary nav-cta" aria-label="Appeler maintenant">
                <i class="lucide lucide-phone"></i>
                <span><?= e($site['phone']) ?></span>
            </a>
        </nav>
    </div>
</header>

<main id="main">
