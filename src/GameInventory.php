<?php

namespace App;

class GameInventory
{
    private array $games;


    public function __construct(private GameRepo $gamesRepo)
    {
    }

    public function setGames()
    {
        $this->games = $this->gamesRepo->fetchGames();
    }

    public function getGames():array
    {
        return $this->games;
    }
}