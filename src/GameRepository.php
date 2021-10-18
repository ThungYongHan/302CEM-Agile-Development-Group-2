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

     * Fetch an array of games from the database

     *
     * @return array
     */
    public function fetchGames(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM games')->fetchAll(\PDO::FETCH_ASSOC);
    }


    /**
     * Insert an array of games into the database
     *
     * @return array
     */
    public function insertGames(): array
    {
//        return $this->getPdo()->prepare('INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover) VALUES (\'$game_name\', \'$game_desc\', \'$game_publisher\', \'$game_datetime\', \'$game_year\', \'$game_cover\')');
//        return $this->getPdo()->prepare('INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover)
//                        VALUES ((SELECT user_id FROM users WHERE username= \'$user\'), \'$game_name\', \'$game_desc\',
//                        \'$game_publisher\', \'$game_datetime\' , \'$game_year\', \'$game_img\')')->fetchAll(\PDO::FETCH_ASSOC);
        $this->getPdo()->prepare('INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover)
                        VALUES ((SELECT user_id FROM users WHERE username= \'$user\'), \'$game_name\', \'$game_desc\',
                        \'$game_publisher\', \'$game_datetime\' , \'$game_year\', \'$game_cover\')');
        return $this->getPdo()->prepare('SELECT * FROM games')->fetchAll(\PDO::FETCH_ASSOC);
        //return $this->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Insert an array of games into the database
     *
     * @param $user
     * @param $game_name
     * @param $game_desc
     * @param $game_publisher
     * @param $game_datetime
     * @param $game_year
     * @param $game_cover
     * @return array|false
     */
//    public function addGame($user, $game_name, $game_desc, $game_publisher, $game_datetime, $game_year, $game_cover): array  (under param @return array)
    public function addGame($user, $game_name, $game_desc, $game_publisher, $game_datetime, $game_year, $game_cover)
    {
        if(empty($user) || empty($game_name) || empty($game_desc) || empty($game_publisher)|| empty($game_datetime) || empty($game_year) || empty($game_cover))
            return false;
        else {
            $this->getPdo()->prepare('INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover)
                        VALUES ((SELECT user_id FROM users WHERE username= \'$user\'), \'$game_name\', \'$game_desc\',
                        \'$game_publisher\', \'$game_datetime\' , \'$game_year\', \'$game_cover\')');
            return $this->getPdo()->prepare('SELECT * FROM games')->fetchAll(\PDO::FETCH_ASSOC);
        }

        //return $this->fetchAll(\PDO::FETCH_ASSOC);
        //        return $this->getPdo()->prepare('INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover) VALUES (\'$game_name\', \'$game_desc\', \'$game_publisher\', \'$game_datetime\', \'$game_year\', \'$game_cover\')');
//        return $this->getPdo()->prepare('INSERT INTO games (user_id, game_name, game_desc, game_publisher, game_datetime, game_year, game_cover)
//                        VALUES ((SELECT user_id FROM users WHERE username= \'$user\'), \'$game_name\', \'$game_desc\',
//                        \'$game_publisher\', \'$game_datetime\' , \'$game_year\', \'$game_img\')')->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function validateGameIsArray()
    {
        $addGame = array('user_id' => 1, 'game_id' => 1, 'game_name' => 'Pokemon Sword',
            'game_description' => 'Explore a vast world and catch creatures!', 'game_publisher' => 'GameFreak',
            'game_datetime' => '2021-10-15 22:00:00', 'game_year' => '2020', 'game_cover' => 'pokemon_cover.jpg');
        if (is_array($addGame)) {
            return true;
        } else
            return false;
    }

    public function validateGameHasAllKeys()
    {
        $addGame = array('user_id' => 1, 'game_id' => 1, 'game_name' => 'Pokemon Sword',
            'game_description' => 'Explore a vast world and catch creatures!', 'game_publisher' => 'GameFreak',
            'game_datetime' => '2021-10-15 22:00:00', 'game_year' => '2020', 'game_cover' => 'pokemon_cover.jpg');
        return $addGame;
    }

    public function validateGameMissingKey()
    {
        $addGame = array('user_id' => 1, 'game_id' => 1, 'game_name' => 'Pokemon Sword',
            'game_description' => 'Explore a vast world and catch creatures!', 'game_publisher' => 'GameFreak',
            'game_datetime' => '2021-10-15 22:00:00', 'game_year' => '2020');
        return $addGame;
    }
}