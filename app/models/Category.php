<?php
/**
 * Category Model
 *
 * Les 3 grandes catégories du catalogue, identiques au site source :
 * - Meuble de bureau
 * - Informatique
 * - Sonorisation
 */

declare(strict_types=1);

final class Category
{
    /**
     * @return array<int, array{slug:string,title:string,description:string,icon:string,image:string,url:string}>
     */
    public static function all(): array
    {
        return [
            [
                'slug'        => 'meuble-de-bureau',
                'title'       => 'Meuble de bureau',
                'description' => 'Chaises, tables et bureaux pour aménager vos espaces événementiels et professionnels.',
                'icon'        => 'armchair',
                'image'       => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200&q=80',
                'url'         => '/meuble-de-bureau',
            ],
            [
                'slug'        => 'informatique',
                'title'       => 'Informatique',
                'description' => 'TV, imprimantes, PC portables, écrans, bornes tactiles, photocopieuses, totems.',
                'icon'        => 'monitor',
                'image'       => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=1200&q=80',
                'url'         => '/informatique',
            ],
            [
                'slug'        => 'sonorisation',
                'title'       => 'Sonorisation',
                'description' => 'Micros sans fil et haut-parleurs professionnels pour conférences et événements.',
                'icon'        => 'mic',
                'image'       => 'https://images.unsplash.com/photo-1520523839897-bd0b52f945a0?w=1200&q=80',
                'url'         => '/sonorisation',
            ],
        ];
    }

    public static function find(string $slug): ?array
    {
        foreach (self::all() as $cat) {
            if ($cat['slug'] === $slug) {
                return $cat;
            }
        }
        return null;
    }
}
