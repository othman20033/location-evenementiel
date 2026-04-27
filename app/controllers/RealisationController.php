<?php
/**
 * RealisationController
 */

declare(strict_types=1);

final class RealisationController extends Controller
{
    public function index(): void
    {
        $this->view('realisations', [
            'pageTitle'       => 'Nos Réalisations',
            'pageDescription' => 'Découvrez les événements prestigieux accompagnés par nos solutions de location de matériel à Casablanca.',
            'items' => [
                [
                    'title' => 'Conférence Tech 2024',
                    'location' => 'Technopark Casablanca',
                    'image' => 'https://images.unsplash.com/photo-1540575861501-7ad0582373f1?w=800',
                    'tags' => ['Informatique', 'Sonorisation']
                ],
                [
                    'title' => 'Salon de l\'Immobilier',
                    'location' => 'Palais des Congrès',
                    'image' => 'https://images.unsplash.com/photo-1491975474562-1f4e30bc9468?w=800',
                    'tags' => ['Meuble', 'Bureaux']
                ],
                [
                    'title' => 'Gala Prestige',
                    'location' => 'Hôtel Mazagan',
                    'image' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=800',
                    'tags' => ['Sonorisation', 'Éclairage']
                ],
            ]
        ]);
    }
}
