<?php
/**
 * HomeController
 *
 * Page d'accueil : hero, 3 catégories, produits phares, pourquoi nous, témoignages, CTA.
 */

declare(strict_types=1);

final class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('home', [
            'pageTitle'       => 'Accueil',
            'pageDescription' => 'Location de meubles de bureau, matériel informatique et sonorisation pour vos événements professionnels à Casablanca.',
            'categories'      => Category::all(),
            'featured'        => Product::all(),
            'testimonials'    => Testimonial::all(),
        ]);
    }
}
