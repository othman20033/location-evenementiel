<?php
/**
 * Controller
 *
 * Contrôleur de base : fournit le rendu de vues avec layout
 * et un helper de redirection.
 */

declare(strict_types=1);

abstract class Controller
{
    /**
     * Rend une vue avec le layout principal (header + footer).
     *
     * @param array<string, mixed> $data
     */
    protected function view(string $view, array $data = []): void
    {
        // Données partagées par toutes les vues
        $data['site']         = config('app');
        $data['currentRoute'] = $this->currentRoute();

        // Variables exposées dans la vue
        extract($data, EXTR_SKIP);

        $viewFile = APP_PATH . '/views/pages/' . $view . '.php';
        if (!is_file($viewFile)) {
            throw new RuntimeException("Vue introuvable : $view");
        }

        require APP_PATH . '/views/layouts/header.php';
        require $viewFile;
        require APP_PATH . '/views/layouts/footer.php';
    }

    /**
     * Renvoie l'URL courante, débarrassée du sous-dossier d'installation.
     */
    private function currentRoute(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
        $scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        if ($scriptDir !== '' && str_starts_with($uri, $scriptDir)) {
            $uri = substr($uri, strlen($scriptDir));
        }
        $uri = '/' . trim($uri, '/');
        return $uri === '' ? '/' : $uri;
    }

    /**
     * Redirection HTTP.
     */
    protected function redirect(string $path): void
    {
        $base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
        header('Location: ' . $base . '/' . ltrim($path, '/'));
        exit;
    }

    /**
     * Récupère un champ POST nettoyé.
     */
    protected function input(string $key, ?string $default = null): ?string
    {
        $value = $_POST[$key] ?? $default;
        return is_string($value) ? trim($value) : $default;
    }

    /**
     * Génère et stocke un jeton CSRF en session.
     */
    protected function csrfToken(): string
    {
        if (empty($_SESSION['_csrf'])) {
            $_SESSION['_csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf'];
    }

    /**
     * Vérifie le jeton CSRF posté.
     */
    protected function verifyCsrf(): bool
    {
        $token = $_POST['_csrf'] ?? '';
        return is_string($token)
            && !empty($_SESSION['_csrf'])
            && hash_equals($_SESSION['_csrf'], $token);
    }
}
