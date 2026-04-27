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
            'partners'        => Partner::all()
        ]);
    }
}
