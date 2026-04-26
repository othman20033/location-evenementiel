<?php
/**
 * Router
 *
 * Routeur minimaliste : associe une méthode HTTP + un chemin
 * à un couple Controller@action, puis dispatch la requête courante.
 */

declare(strict_types=1);

final class Router
{
    /** @var array<string, array<string, string>> */
    private array $routes = [
        'GET'  => [],
        'POST' => [],
    ];

    public function get(string $path, string $action): void
    {
        $this->routes['GET'][$this->normalize($path)] = $action;
    }

    public function post(string $path, string $action): void
    {
        $this->routes['POST'][$this->normalize($path)] = $action;
    }

    /**
     * Détermine la route correspondante et appelle le contrôleur.
     */
    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri    = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';

        // Retire le sous-dossier d'installation si présent
        $scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        if ($scriptDir !== '' && str_starts_with($uri, $scriptDir)) {
            $uri = substr($uri, strlen($scriptDir));
        }

        $path = $this->normalize($uri);

        $action = $this->routes[$method][$path] ?? null;

        if ($action === null) {
            $this->notFound();
            return;
        }

        [$controllerName, $methodName] = explode('@', $action);

        if (!class_exists($controllerName)) {
            $this->notFound();
            return;
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $methodName)) {
            $this->notFound();
            return;
        }

        $controller->$methodName();
    }

    private function normalize(string $path): string
    {
        $path = '/' . trim($path, '/');
        return $path === '' ? '/' : $path;
    }

    private function notFound(): void
    {
        http_response_code(404);
        $site         = config('app');
        $uri          = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
        $scriptDir    = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        if ($scriptDir !== '' && str_starts_with($uri, $scriptDir)) {
            $uri = substr($uri, strlen($scriptDir));
        }
        $currentRoute = '/' . trim($uri, '/');
        $currentRoute = $currentRoute === '' ? '/' : $currentRoute;
        $pageTitle       = 'Page introuvable';
        $pageDescription = "La page demandée n'existe pas ou a été déplacée.";
        $title   = $pageTitle;
        $message = $pageDescription;
        require APP_PATH . '/views/layouts/header.php';
        require APP_PATH . '/views/pages/404.php';
        require APP_PATH . '/views/layouts/footer.php';
    }
}
