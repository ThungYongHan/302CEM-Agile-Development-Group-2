<?php
namespace App;

class ReviewRepository{
    protected $pdo;

    protected function getPdo(): \PDO{
        if ($this->pdo === null) {

            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ];

            try {
                $this->pdo = new \PDO("mysql:host=localhost;dbname=GameReviewWebsite;charset=utf8mb4", 'root', '', $options);

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
    public function fetchReviews(): array
    {
        return $this->getPdo()->prepare('SELECT * FROM reviews')->fetchAll(\PDO::FETCH_ASSOC);
    }
}
