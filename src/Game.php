<?php

namespace App;

class Game
{
    private array $games;

    public function __construct (private GameRepository $gameRepository)
    {

    }


    public function setGames(){


        $this->games = $this->gameRepository->fetchGames();

    }

    /**
     * @param array $games
     */
    public function getGames():array{
        return $this->games;
    }
}