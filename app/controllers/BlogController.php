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
            'pageDescription' => 'Actualités, conseils et tendances du monde de l\'événementiel au Maroc.',
            'posts'           => Post::all()
        ]);
    }
}
