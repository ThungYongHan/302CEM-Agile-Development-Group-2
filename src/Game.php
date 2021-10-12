<?php

namespace App;

class Game{
    private array $games;

    public function setGames()
    {
        $gamesRepo = new GameRepository();

        $this->games = $gamesRepo->fetchGames();
    }

    public function getGames():array
    {
        return $this->products;
    }
}