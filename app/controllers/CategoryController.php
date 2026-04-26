<?php
/**
 * CategoryController
 *
 * Une action par catégorie (les URLs reproduisent celles du site source).
 */

declare(strict_types=1);

final class CategoryController extends Controller
{
    public function meuble(): void
    {
        $this->renderCategory('meuble-de-bureau');
    }

    public function informatique(): void
    {
        $this->renderCategory('informatique');
    }

    public function sonorisation(): void
    {
        $this->renderCategory('sonorisation');
    }

    private function renderCategory(string $slug): void
    {
        $category = Category::find($slug);
        if ($category === null) {
            http_response_code(404);
            return;
        }

        $this->view('category', [
            'pageTitle'       => $category['title'],
            'pageDescription' => $category['description'],
            'category'        => $category,
            'products'        => Product::byCategory($slug),
            'otherCategories' => array_values(array_filter(
                Category::all(),
                fn($c) => $c['slug'] !== $slug
            )),
        ]);
    }
}
