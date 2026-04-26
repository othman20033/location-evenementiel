<?php
/**
 * AboutController
 */

declare(strict_types=1);

final class AboutController extends Controller
{
    public function index(): void
    {
        $this->view('about', [
            'pageTitle'       => 'À propos',
            'pageDescription' => 'Découvrez l\'histoire, les valeurs et l\'équipe d\'Élégance Événements, leader de la location événementielle au Maroc.',
        ]);
    }
}
