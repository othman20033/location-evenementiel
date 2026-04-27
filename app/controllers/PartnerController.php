<?php
/**
 * PartnerController
 */

declare(strict_types=1);

final class PartnerController extends Controller
{
    public function index(): void
    {
        $this->view('partenaires', [
            'pageTitle'       => 'Nos Partenaires',
            'pageDescription' => 'Ils nous font confiance pour la réussite de leurs événements.',
            'partners' => [
                ['name' => 'OCP Group', 'logo' => 'https://upload.wikimedia.org/wikipedia/fr/0/07/Logo_OCP.svg'],
                ['name' => 'Technopark', 'logo' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Technopark_Casablanca_Logo.png'],
                ['name' => 'Attijariwafa Bank', 'logo' => 'https://upload.wikimedia.org/wikipedia/fr/4/4b/Logo_Attijariwafa_bank.svg'],
            ]
        ]);
    }
}
