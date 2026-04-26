-- =========================================================
-- Location Événementiel — Schéma de base de données
-- À importer dans MySQL / MariaDB
-- =========================================================

CREATE DATABASE IF NOT EXISTS `elegance_events`
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_unicode_ci;

USE `elegance_events`;

-- Produits (rattachés à une catégorie via le slug)
CREATE TABLE IF NOT EXISTS `products` (
    `id`          INT AUTO_INCREMENT PRIMARY KEY,
    `name`        VARCHAR(150) NOT NULL,
    `category`    VARCHAR(60)  NOT NULL,
    `description` TEXT NOT NULL,
    `image`       VARCHAR(255) DEFAULT NULL,
    `position`    INT DEFAULT 0,
    `created_at`  DATETIME DEFAULT CURRENT_TIMESTAMP,
    KEY `idx_category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Témoignages clients
CREATE TABLE IF NOT EXISTS `testimonials` (
    `id`         INT AUTO_INCREMENT PRIMARY KEY,
    `name`       VARCHAR(100) NOT NULL,
    `role`       VARCHAR(150) DEFAULT NULL,
    `message`    TEXT NOT NULL,
    `rating`     TINYINT DEFAULT 5,
    `position`   INT DEFAULT 0,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Messages de contact
CREATE TABLE IF NOT EXISTS `contact_messages` (
    `id`         INT AUTO_INCREMENT PRIMARY KEY,
    `name`       VARCHAR(120) NOT NULL,
    `email`      VARCHAR(180) NOT NULL,
    `phone`      VARCHAR(40) DEFAULT NULL,
    `event_type` VARCHAR(60) DEFAULT NULL,
    `message`    TEXT NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ========== Données : produits identiques au site source ==========

INSERT INTO `products` (`name`, `category`, `description`, `image`, `position`) VALUES
-- Meuble de bureau
('Chaises',           'meuble-de-bureau', 'Chaises de conférence, chaises Napoléon, Tiffany, banquettes — toutes finitions et coloris disponibles.', 'https://images.unsplash.com/photo-1503602642458-232111445657?w=900&q=80', 1),
('Tables',            'meuble-de-bureau', 'Tables rondes, rectangulaires, mange-debout et tables basses pour tous types d''événements.',           'https://images.unsplash.com/photo-1505409859467-3a796fd5798e?w=900&q=80', 2),
('Bureaux',           'meuble-de-bureau', 'Bureaux opérationnels, bureaux d''accueil et postes de travail pour vos espaces temporaires.',         'https://images.unsplash.com/photo-1497366754035-f200968a6e72?w=900&q=80', 3),

-- Informatique
('TV',                'informatique', 'Écrans TV grand format (Full HD / 4K) sur pied ou mural pour vos stands et conférences.',                  'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=900&q=80', 10),
('Imprimante',        'informatique', 'Imprimantes laser et jet d''encre, multifonctions, livraison et installation incluses.',                    'https://images.unsplash.com/photo-1612815154858-86c34618d3c8?w=900&q=80', 11),
('PC Portables',      'informatique', 'PC portables i3, i5, i7 et MacBook, parfaits pour formations, salons et événements pro.',                  'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=900&q=80', 12),
('Unités centrales',  'informatique', 'Tours PC fixes configurables, idéales pour les postes de travail temporaires.',                            'https://images.unsplash.com/photo-1587202372775-e229f172b9d7?w=900&q=80', 13),
('Écran Bureau',      'informatique', 'Moniteurs Full HD 22" à 32" pour vos postes de travail, salles de formation et stands.',                   'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=900&q=80', 14),
('Borne tactile',     'informatique', 'Bornes tactiles interactives pour accueil visiteurs, signalétique et expériences client.',                  'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=900&q=80', 15),
('Photocopieuse',     'informatique', 'Photocopieuses multifonctions noir/blanc et couleur pour gros volumes événementiels.',                     'https://images.unsplash.com/photo-1586281380349-632531db7ed4?w=900&q=80', 16),
('Totem',             'informatique', 'Totems d''affichage dynamique pour vos campagnes de communication on-site.',                               'https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=900&q=80', 17),

-- Sonorisation
('Micros Sans Fil',   'sonorisation', 'Micros sans fil professionnels (main, cravate, serre-tête) avec récepteur multi-canaux.',                  'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?w=900&q=80', 20),
('Haut Parleurs',     'sonorisation', 'Enceintes amplifiées professionnelles, sub-woofers, table de mixage et câblage complet.',                  'https://images.unsplash.com/photo-1545454675-3531b543be5d?w=900&q=80', 21);

INSERT INTO `testimonials` (`name`, `role`, `message`, `rating`, `position`) VALUES
('Sophia & Karim',     'Mariage à Marrakech',          'Une équipe à l''écoute, professionnelle et attentive aux moindres détails. Notre mariage a été magique grâce à eux.', 5, 1),
('Yasmine El Idrissi', 'Directrice Communication',     'Nous faisons appel à eux pour nos séminaires depuis 3 ans. Qualité, ponctualité et raffinement à chaque fois.', 5, 2),
('Mehdi Benali',       'Soirée privée à Casablanca',   'Du choix du mobilier à la sonorisation, tout était parfait. Mes invités m''ont demandé leurs coordonnées toute la soirée.', 5, 3);
