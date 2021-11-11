<?php

namespace App;

class GameYongHan
{
    private array $games;
    public GameRepositoryYongHan $gamesRepo;

    public function __construct(GameRepositoryYongHan $gamesRepo)
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
