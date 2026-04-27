<?php
/**
 * Partner Model (Partenaires)
 */

declare(strict_types=1);

final class Partner
{
    public static function all(): array
    {
        return [
            ['name' => 'OCP Group', 'logo' => 'https://via.placeholder.com/200x100?text=OCP'],
            ['name' => 'Royal Air Maroc', 'logo' => 'https://via.placeholder.com/200x100?text=RAM'],
            ['name' => 'Maroc Telecom', 'logo' => 'https://via.placeholder.com/200x100?text=IAM'],
            ['name' => 'CIH Bank', 'logo' => 'https://via.placeholder.com/200x100?text=CIH'],
            ['name' => 'Attijariwafa Bank', 'logo' => 'https://via.placeholder.com/200x100?text=AWB'],
            ['name' => 'Inwi', 'logo' => 'https://via.placeholder.com/200x100?text=INWI'],
        ];
    }
}
