<?php
/**
 * Configuration globale de l'application
 * Exposée via la classe Config (accès statique)
 */

$GLOBALS['app_config'] = [
    'app' => [
        'name'        => 'Location Événementiel',
        'tagline'     => 'Location de matériel pour événements professionnels',
        'url'         => '',
        'email'       => 'contact@location-evenementiel.ma',
        'phone'       => '+212 661 619 231',
        'phone_clean' => '+212661619231',
        'address'     => '10 Rue Liberté, Casablanca, Maroc',
        'social'      => [
            'facebook'  => '#',
            'instagram' => '#',
            'whatsapp'  => 'https://wa.me/212661619231',
        ],
    ],

    'database' => [
        'host'     => '127.0.0.1',
        'port'     => 3306,
        'name'     => 'elegance_events',
        'user'     => 'root',
        'password' => '',
        'charset'  => 'utf8mb4',
    ],

    'mail' => [
        'to'   => 'contact@elegance-evenements.ma',
        'from' => 'no-reply@elegance-evenements.ma',
    ],
];

/**
 * Helper global d'accès à la configuration
 * Usage : config('app.name'), config('database.host')
 */
function config(string $key, $default = null)
{
    $segments = explode('.', $key);
    $value = $GLOBALS['app_config'] ?? [];
    foreach ($segments as $segment) {
        if (!is_array($value) || !array_key_exists($segment, $value)) {
            return $default;
        }
        $value = $value[$segment];
    }
    return $value;
}

/**
 * Helper d'échappement HTML pour la prévention XSS dans les vues
 */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

/**
 * Helper de génération d'URL relative
 */
function url(string $path = ''): string
{
    $base = rtrim(config('app.url', ''), '/');
    return $base . '/' . ltrim($path, '/');
}

/**
 * Helper d'URL d'asset
 */
function asset(string $path): string
{
    return url('public/assets/' . ltrim($path, '/'));
}
