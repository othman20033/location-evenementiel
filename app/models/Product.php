<?php
/**
 * Product Model
 *
 * Liste EXACTE des produits proposés sur location-evenementiel.ma
 * (aucune suppression, aucun ajout) — chaque entrée est rattachée
 * à l'une des 3 catégories.
 */

declare(strict_types=1);

final class Product
{
    /**
     * @return array<int, array{name:string,category:string,description:string,image:string}>
     */
    public static function all(): array
    {
        try {
            $rows = Database::getInstance()->all(
                'SELECT name, category, description, image FROM products ORDER BY position ASC, id ASC'
            );
            if (!empty($rows)) {
                return $rows;
            }
        } catch (Throwable) {
            // Fallback statique
        }

        return self::fallback();
    }

    /**
     * @return array<int, array{name:string,category:string,description:string,image:string}>
     */
    public static function byCategory(string $slug): array
    {
        return array_values(array_filter(
            self::all(),
            fn(array $p): bool => $p['category'] === $slug
        ));
    }

    /**
     * @return array<int, array{name:string,category:string,description:string,image:string}>
     */
    private static function fallback(): array
    {
        return [
            // === Meuble de bureau ===
            [
                'name'        => 'Chaises',
                'category'    => 'meuble-de-bureau',
                'description' => 'Chaises de conférence, chaises Napoléon, Tiffany, banquettes — toutes finitions et coloris disponibles.',
                'image'       => 'https://images.unsplash.com/photo-1503602642458-232111445657?w=900&q=80',
            ],
            [
                'name'        => 'Tables',
                'category'    => 'meuble-de-bureau',
                'description' => 'Tables rondes, rectangulaires, mange-debout et tables basses pour tous types d\'événements.',
                'image'       => 'https://images.unsplash.com/photo-1505409859467-3a796fd5798e?w=900&q=80',
            ],
            [
                'name'        => 'Bureaux',
                'category'    => 'meuble-de-bureau',
                'description' => 'Bureaux opérationnels, bureaux d\'accueil et postes de travail pour vos espaces temporaires.',
                'image'       => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&q=80',
            ],

            // === Informatique ===
            [
                'name'        => 'TV',
                'category'    => 'informatique',
                'description' => 'Écrans TV grand format (Full HD / 4K) sur pied ou mural pour vos stands et conférences.',
                'image'       => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=900&q=80',
            ],
            [
                'name'        => 'Imprimante',
                'category'    => 'informatique',
                'description' => 'Imprimantes laser et jet d\'encre, multifonctions, livraison et installation incluses.',
                'image'       => 'https://images.unsplash.com/photo-1612815154858-86c34618d3c8?w=900&q=80',
            ],
            [
                'name'        => 'PC Portables',
                'category'    => 'informatique',
                'description' => 'PC portables i3, i5, i7 et MacBook, parfaits pour formations, salons et événements pro.',
                'image'       => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=900&q=80',
            ],
            [
                'name'        => 'Unités centrales',
                'category'    => 'informatique',
                'description' => 'Tours PC fixes configurables, idéales pour les postes de travail temporaires.',
                'image'       => 'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=900&q=80',
            ],
            [
                'name'        => 'Écran Bureau',
                'category'    => 'informatique',
                'description' => 'Moniteurs Full HD 22" à 32" pour vos postes de travail, salles de formation et stands.',
                'image'       => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=900&q=80',
            ],
            [
                'name'        => 'Borne tactile',
                'category'    => 'informatique',
                'description' => 'Bornes tactiles interactives pour accueil visiteurs, signalétique et expériences client.',
                'image'       => 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=900&q=80',
            ],
            [
                'name'        => 'Photocopieuse',
                'category'    => 'informatique',
                'description' => 'Photocopieuses multifonctions noir/blanc et couleur pour gros volumes événementiels.',
                'image'       => 'https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=900&q=80',
            ],
            [
                'name'        => 'Totem',
                'category'    => 'informatique',
                'description' => 'Totems d\'affichage dynamique pour vos campagnes de communication on-site.',
                'image'       => 'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=900&q=80',
            ],

            // === Sonorisation ===
            [
                'name'        => 'Micros Sans Fil',
                'category'    => 'sonorisation',
                'description' => 'Micros sans fil professionnels (main, cravate, serre-tête) avec récepteur multi-canaux.',
                'image'       => 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?w=900&q=80',
            ],
            [
                'name'        => 'Haut Parleurs',
                'category'    => 'sonorisation',
                'description' => 'Enceintes amplifiées professionnelles, sub-woofers, table de mixage et câblage complet.',
                'image'       => 'https://images.unsplash.com/photo-1545454675-3531b543be5d?w=900&q=80',
            ],
        ];
    }
}
