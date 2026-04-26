<?php
/**
 * Testimonial Model
 *
 * Témoignages clients affichés sur la page d'accueil.
 */

declare(strict_types=1);

final class Testimonial
{
    /**
     * @return array<int, array<string, string>>
     */
    public static function all(): array
    {
        try {
            $rows = Database::getInstance()->all(
                'SELECT id, name, role, message, rating FROM testimonials ORDER BY position ASC, id ASC'
            );
            if (!empty($rows)) {
                return $rows;
            }
        } catch (Throwable) {
            // Fallback statique
        }

        return [
            [
                'name'    => 'Sophia & Karim',
                'role'    => 'Mariage à Marrakech',
                'message' => 'Une équipe à l\'écoute, professionnelle et attentive aux moindres détails. Notre mariage a été magique grâce à eux.',
                'rating'  => '5',
            ],
            [
                'name'    => 'Yasmine El Idrissi',
                'role'    => 'Directrice Communication',
                'message' => 'Nous faisons appel à Élégance Événements pour nos séminaires depuis 3 ans. Qualité, ponctualité et raffinement à chaque fois.',
                'rating'  => '5',
            ],
            [
                'name'    => 'Mehdi Benali',
                'role'    => 'Soirée privée à Casablanca',
                'message' => 'Du choix du mobilier à la sonorisation, tout était parfait. Mes invités m\'ont demandé leurs coordonnées toute la soirée.',
                'rating'  => '5',
            ],
        ];
    }
}
