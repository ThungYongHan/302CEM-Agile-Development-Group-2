<?php

namespace App;

class UserRepository
{
    protected $pdo;

    protected function getPdo(): \PDO
    {
        if ($this->pdo === null) {

            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];

            try {
                $this->pdo = new \PDO("mysql:host=127.0.0.1;dbname=302CEM-Agile-Development-Group-2;charset=utf8mb4", 'root', '', $options);

            } catch (\PDOException $PDOException) {

                throw new \PDOException($PDOException->getMessage(), (int) $PDOException->getCode());
            }
        }
        return $this->pdo;
    }

    /**

         * Fetch an array of products from the database

     *
     * @return array
     */
    public function fetchUsers(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM users')->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Fetch an array of products from the database
     *
     * @return array
     */
    public function fetchUsers1(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM users WHERE username = "user1" AND user_pass = "p455w0rd"')->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Fetch an array of products from the database
     *
     * @return array
     */
    public function fetchUsers2(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM users WHERE username = "user2" AND user_pass = "p455w0rd"')->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Fetch an array of products from the database
     *
     * @return array
     */
    public function fetchUsers3(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM users WHERE username = "user3" AND user_pass = "p455w0rd"')->fetchAll(\PDO::FETCH_ASSOC);
    }
}