<?php
/**
 * ContactController
 *
 * Affiche le formulaire de contact et traite la soumission.
 */

declare(strict_types=1);

final class ContactController extends Controller
{
    public function index(): void
    {
        // Récupération des messages flash
        $flash = $_SESSION['flash'] ?? null;
        unset($_SESSION['flash']);

        $this->view('contact', [
            'pageTitle'       => 'Contact',
            'pageDescription' => 'Contactez-nous pour un devis personnalisé. Notre équipe vous répond sous 24h.',
            'flash'           => $flash,
            'old'             => $_SESSION['old'] ?? [],
            'errors'          => $_SESSION['errors'] ?? [],
            'csrf'            => $this->csrfToken(),
        ]);

        unset($_SESSION['old'], $_SESSION['errors']);
    }

    public function store(): void
    {
        // Vérification CSRF
        if (!$this->verifyCsrf()) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Jeton de sécurité invalide. Veuillez réessayer.'];
            $this->redirect('/contact');
            return;
        }

        $data = [
            'name'       => $this->input('name', '') ?? '',
            'email'      => $this->input('email', '') ?? '',
            'phone'      => $this->input('phone', '') ?? '',
            'event_type' => $this->input('event_type', '') ?? '',
            'message'    => $this->input('message', '') ?? '',
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old']    = $data;
            $_SESSION['flash']  = ['type' => 'error', 'message' => 'Veuillez corriger les erreurs ci-dessous.'];
            $this->redirect('/contact');
            return;
        }

        // Tentative d'enregistrement en base. Le formulaire reste fonctionnel sans BDD.
        try {
            ContactMessage::create($data);
        } catch (Throwable) {
            // Si la BDD n'est pas dispo, on n'échoue pas le formulaire.
        }

        $_SESSION['flash'] = [
            'type'    => 'success',
            'message' => 'Merci ' . $data['name'] . ' ! Votre demande a bien été reçue. Nous vous recontactons sous 24h.',
        ];
        $this->redirect('/contact');
    }

    /**
     * @param array<string, string> $data
     * @return array<string, string>
     */
    private function validate(array $data): array
    {
        $errors = [];

        if ($data['name'] === '' || mb_strlen($data['name']) < 2) {
            $errors['name'] = 'Veuillez saisir votre nom (2 caractères minimum).';
        }

        if ($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Veuillez saisir une adresse email valide.';
        }

        if ($data['phone'] !== '' && !preg_match('/^[\d\s+\-().]{6,20}$/', $data['phone'])) {
            $errors['phone'] = 'Numéro de téléphone invalide.';
        }

        if ($data['message'] === '' || mb_strlen($data['message']) < 10) {
            $errors['message'] = 'Votre message doit contenir au moins 10 caractères.';
        }

        return $errors;
    }
}
