<?php

namespace App;

class UserRepoAnnie
{
    protected $pdo;

    protected function getPdo(): \PDO
    {
        if ($this->pdo === null)
        {
            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];

            try{
                $this -> pdo = new  \PDO("mysql:host=localhost; dbname=gamereviewwebsite;charset=utf8mb4", 'root', '', $options);
            }catch(\PDOException $PDOException){

                throw new \PDOException($PDOException->getMessage(), (int) $PDOException->getCode());
            }
        }
        return $this ->pdo;
    }

    /**
     *Fetch an array of users from the database
     *
     * @return array
     */
    public function fetchUsers(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM users')->fetchAll(\PDO::FETCH_ASSOC);
    }
}