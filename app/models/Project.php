<?php
/**
 * Project Model (Réalisations)
 */

declare(strict_types=1);

final class Project
{
    public static function all(): array
    {
        return [
            [
                'title'       => 'Conférence Tech Casablanca',
                'category'    => 'Informatique',
                'description' => 'Installation complète de bornes tactiles et parcs informatiques pour 500 participants.',
                'image'       => 'https://images.unsplash.com/photo-1540575861501-7ad058bf3fd8?w=900&q=80',
                'date'        => 'Mars 2024'
            ],
            [
                'title'       => 'Salon de l\'Immobilier',
                'category'    => 'Meuble & Aménagement',
                'description' => 'Aménagement d\'espaces VIP avec chaises Napoléon et tables de réunion haut de gamme.',
                'image'       => 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=900&q=80',
                'date'        => 'Janvier 2024'
            ],
            [
                'title'       => 'Gala de Fin d\'Année',
                'category'    => 'Sonorisation',
                'description' => 'Système de sonorisation complet et micros sans fil pour une soirée de 300 personnes.',
                'image'       => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=900&q=80',
                'date'        => 'Décembre 2023'
            ],
            [
                'title'       => 'Exposition d\'Art Moderne',
                'category'    => 'Équipement',
                'description' => 'Installation de totems d\'affichage et écrans 4K pour une interaction immersive.',
                'image'       => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=900&q=80',
                'date'        => 'Octobre 2023'
            ],
        ];
    }
}
