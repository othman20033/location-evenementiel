<?php
/**
 * Post Model (Blog)
 */

declare(strict_types=1);

final class Post
{
    public static function all(): array
    {
        return [
            [
                'title'   => 'Comment choisir son matériel informatique pour un salon ?',
                'excerpt' => 'Découvrez nos conseils pour optimiser votre stand avec le bon équipement informatique...',
                'image'   => 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=900&q=80',
                'date'    => '12 Mars 2024',
                'slug'    => 'choisir-materiel-informatique-salon'
            ],
            [
                'title'   => 'Les tendances 2024 de l\'aménagement événementiel',
                'excerpt' => 'Du minimalisme au grand luxe, zoom sur les styles qui feront vibrer vos événements cette année...',
                'image'   => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80',
                'date'    => '05 Février 2024',
                'slug'    => 'tendances-amenagement-2024'
            ],
            [
                'title'   => 'Réussir la sonorisation de votre conférence',
                'excerpt' => 'Évitez les larsens et garantissez une clarté sonore parfaite avec ces quelques astuces techniques...',
                'image'   => 'https://images.unsplash.com/photo-1520523839897-bd0b52f945a0?w=900&q=80',
                'date'    => '20 Janvier 2024',
                'slug'    => 'reussir-sonorisation-conference'
            ],
        ];
    }
}
