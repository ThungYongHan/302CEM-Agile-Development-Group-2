<?php

namespace App;

class UserRepositoryYongHan
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
                $this->pdo = new \PDO(
                    "mysql:host=127.0.0.1;dbname=gamereviewwebsite;charset=utf8mb4",
                    'root',
                    '',
                    $options
                );
            } catch (\PDOException $PDOException) {
                throw new \PDOException($PDOException->getMessage(), (int) $PDOException->getCode());
            }
        }
        return $this->pdo;
    }

    public function loginUser($username, $password)
    {
        if (empty($username) || empty($password)) {
            return false;
        } else {
            return $this->getPdo()->prepare('SELECT * FROM Users WHERE username= \'$username\' 
                                              AND user_pass=\'$password\' AND status=\'Verified\'')
                                  ->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    public function userRegistration($user_name, $user_email, $user_pass, $user_confirm_pass)
    {
        if (empty($user_name) || empty($user_email) || empty($user_pass) || empty($user_confirm_pass)) {
            return false;
        }
        if (($user_name) == 'admin') {
            return false;
        } else {
            return $this->getPdo()->prepare('INSERT INTO Users (username, user_email, user_pass, vkey, user_role)
                                            VALUES (\'$username\', \'$email\', \'$password\', \'$token\', \'user\')')
                                  ->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


    /**

         * Fetch an array of users from the database

     *
     * @return array
     */
    public function fetchUsers(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM users')
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Fetch an array of user1 from the database
     *
     * @return array
     */
    public function fetchUser1(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM users WHERE username = "user1" AND user_pass = "p455w0rd" 
                      AND status=\'Verified\' AND user_role=\'user\'')
                    ->fetchAll(\PDO::FETCH_ASSOC);
    }


    /**
     * Fetch an array of admin from the database
     *
     * @return array
     */
    public function fetchAdmin(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM users WHERE username = "admin" AND user_pass = "p455w0rd" 
                      AND status=\'Verified\' AND user_role=\'admin\'')
            ->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function validateUserIsArray()
    {
        $addUser = array("user_id" => 1, "username" => "user1", "user_email" => "user1@example.com",
            "user_pass" => "p455w0rd", "vkey" => "", "user_role" => "user", "status" => "Verified");
        if (is_array($addUser)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateUserKey()
    {
        return array("user_id" => 1, "username" => "user1", "user_email" => "user1@example.com",
            "user_pass" => "p455w0rd", "vkey" => "", "user_role" => "user", "status" => "Verified");
    }

    public function validateUserMissingKey()
    {
        return array("user_id" => 1, "username" => "user1", "user_email" => "user1@example.com",
            "user_pass" => "p455w0rd", "vkey" => "", "status" => "Verified");
    }
}
