<?php
/**
 * Front Controller - Point d'entrée unique de l'application
 * Toutes les requêtes HTTP passent par ce fichier (via .htaccess)
 */

declare(strict_types=1);

// Affichage des erreurs en développement (à désactiver en production)
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Démarrage de la session
session_start();

// Définition des constantes globales
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');
define('CORE_PATH', BASE_PATH . '/core');
define('PUBLIC_PATH', BASE_PATH . '/public');

// Autoloader simple PSR-4 friendly
spl_autoload_register(function (string $class): void {
    $paths = [
        CORE_PATH . '/' . $class . '.php',
        APP_PATH . '/controllers/' . $class . '.php',
        APP_PATH . '/models/' . $class . '.php',
    ];
    foreach ($paths as $path) {
        if (is_file($path)) {
            require_once $path;
            return;
        }
    }
});

// Chargement de la configuration
require_once BASE_PATH . '/config/config.php';

// Initialisation du routeur et dispatch de la requête
$router = new Router();

// Définition des routes (URLs identiques à location-evenementiel.ma)
$router->get('/',                  'HomeController@index');
$router->get('/a-propos-de-nous',  'AboutController@index');
$router->get('/meuble-de-bureau',  'CategoryController@meuble');
$router->get('/informatique',      'CategoryController@informatique');
$router->get('/sonorisation',      'CategoryController@sonorisation');
$router->get('/realisations',     'RealisationController@index');
$router->get('/blog',             'BlogController@index');
$router->get('/partenaires',      'PartnerController@index');
$router->get('/contact',          'ContactController@index');
$router->post('/contact',         'ContactController@store');

// Lancement du dispatch
$router->dispatch();
