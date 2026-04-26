<?php
/**
 * Router pour le serveur PHP intégré (php -S localhost:8000 router.php)
 *
 * - Sert les fichiers statiques existants tels quels
 * - Route tout le reste vers index.php
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $path;

if ($path !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

require __DIR__ . '/index.php';
