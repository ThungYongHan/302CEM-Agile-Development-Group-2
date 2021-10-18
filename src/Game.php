<?php

namespace App;

class Game{
    private array $games;
    public string $gamename;
    public GameRepository $gamesRepo;

    public function __construct(GameRepository $gamesRepo)
    {
        $this->gamesRepo = $gamesRepo;
    }

    public function setGames()
    {
        $this->games = $this->gamesRepo->fetchGames();
    }

    public function getGames():array
    {
        return $this->games;
    }

    public function addGameName(string $gamename)
    {
        return $this->$gamename = $gamename;
    }
}