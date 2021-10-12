<?php

namespace App;

class GameRepository
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
                $this->pdo = new \PDO("mysql:host=127.0.0.1;dbname=gamereviewwebsite;charset=utf8mb4", 'root', '', $options);

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
    public function fetchGames(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM games')->fetchAll(\PDO::FETCH_ASSOC);
    }



    /**
     * Fetch an array of products from the database
     *
     * @return array
     */
    public function insertGames(): array
    {
        /*return $this->getPdo()->prepare('SELECT * FROM users WHERE username = "user1" AND user_pass = "p455w0rd"')->fetchAll(\PDO::FETCH_ASSOC);*/
        return $this->getPdo()->prepare('INSERT INTO games (game_name, game_desc, game_publisher, game_datetime, game_year, game_cover) VALUES (\'$game_name\', \'$game_desc\', \'$game_publisher\', \'$game_datetime\', \'$game_year\', \'$game_cover\')');

    }
}