<?php
/**
 * ProjectController
 */

declare(strict_types=1);

final class ProjectController extends Controller
{
    public function index(): void
    {
        $this->view('realisations', [
            'pageTitle'       => 'Nos Réalisations',
            'pageDescription' => 'Découvrez les événements prestigieux accompagnés par Location Événementiel partout au Maroc.',
            'projects'        => Project::all()
        ]);
    }
}
