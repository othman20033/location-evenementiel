<?php
/**
 * BlogController
 */

declare(strict_types=1);

final class BlogController extends Controller
{
    public function index(): void
    {
        $this->view('blog', [
            'pageTitle'       => 'Notre Blog',
            'pageDescription' => 'Conseils, tendances et actualités sur la location de matériel événementiel au Maroc.',
            'posts' => [
                [
                    'title' => 'Comment choisir sa sonorisation ?',
                    'excerpt' => 'Les points clés pour une acoustique parfaite lors de votre prochain événement.',
                    'date' => '12 Avril 2024',
                    'image' => 'https://images.unsplash.com/photo-1520529960391-91c2068936a7?w=800'
                ],
                [
                    'title' => 'Les tendances mobilier 2024',
                    'excerpt' => 'Découvrez les styles de bureaux et chaises les plus demandés cette année.',
                    'date' => '05 Avril 2024',
                    'image' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=800'
                ],
            ]
        ]);
    }
}
