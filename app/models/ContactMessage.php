<?php
/**
 * ContactMessage Model
 *
 * Persistance des messages reçus depuis le formulaire de contact.
 */

declare(strict_types=1);

final class ContactMessage
{
    /**
     * Enregistre un nouveau message.
     *
     * @param array<string, string> $data
     */
    public static function create(array $data): int
    {
        return Database::getInstance()->insert('contact_messages', [
            'name'       => $data['name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'] ?? null,
            'event_type' => $data['event_type'] ?? null,
            'message'    => $data['message'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
