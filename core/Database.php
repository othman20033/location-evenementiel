<?php
/**
 * Database
 *
 * Implémentation du design pattern Singleton pour la connexion PDO.
 * Garantit une seule instance de connexion à la base de données
 * pendant tout le cycle de vie de la requête HTTP.
 */

declare(strict_types=1);

final class Database
{
    /** @var Database|null Instance unique du Singleton */
    private static ?Database $instance = null;

    /** @var PDO Connexion PDO sous-jacente */
    private PDO $pdo;

    /**
     * Constructeur privé : empêche l'instanciation depuis l'extérieur.
     */
    private function __construct()
    {
        $cfg = config('database');

        $dsn = sprintf(
            'mysql:host=%s;port=%d;dbname=%s;charset=%s',
            $cfg['host'],
            $cfg['port'],
            $cfg['name'],
            $cfg['charset']
        );

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $cfg['user'], $cfg['password'], $options);
        } catch (PDOException $e) {
            // En production, logger plutôt qu'afficher
            throw new RuntimeException('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    /** Empêche le clonage de l'instance */
    private function __clone() {}

    /** Empêche la désérialisation */
    public function __wakeup()
    {
        throw new RuntimeException('Singleton non sérialisable.');
    }

    /**
     * Point d'accès unique au Singleton.
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Retourne l'objet PDO sous-jacent.
     */
    public function pdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * Exécute une requête préparée et retourne le PDOStatement.
     *
     * @param array<string, mixed> $params
     */
    public function query(string $sql, array $params = []): PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Récupère toutes les lignes pour une requête.
     *
     * @param array<string, mixed> $params
     * @return array<int, array<string, mixed>>
     */
    public function all(string $sql, array $params = []): array
    {
        return $this->query($sql, $params)->fetchAll();
    }

    /**
     * Récupère une seule ligne.
     *
     * @param array<string, mixed> $params
     * @return array<string, mixed>|null
     */
    public function one(string $sql, array $params = []): ?array
    {
        $row = $this->query($sql, $params)->fetch();
        return $row === false ? null : $row;
    }

    /**
     * Insère une ligne et retourne l'ID inséré.
     *
     * @param array<string, mixed> $data
     */
    public function insert(string $table, array $data): int
    {
        $columns      = array_keys($data);
        $placeholders = array_map(fn($c) => ':' . $c, $columns);

        $sql = sprintf(
            'INSERT INTO `%s` (`%s`) VALUES (%s)',
            $table,
            implode('`,`', $columns),
            implode(',', $placeholders)
        );

        $this->query($sql, $data);
        return (int) $this->pdo->lastInsertId();
    }
}
