<?php

namespace TDD\AddGameReview\Testing;

use mysql_xdevapi\Exception;
use PHPUnit\Framework\TestCase;
use TDD\AddGameReview\GameRepository;

class GameNameValidationTest extends TestCase
{
    public function testGameNameValidation()
    {
        $mockRepo = $this->createMock(GameRepository::class);

        $mockGamesArray = [
            ['game_id' => 1, 'user_id' => '1', 'game_name' => 'Candy Crush', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB']
        ];

        $newGameDetails = [
            ['game_id' => 1, 'user_id' => '1', 'game_name' => 'Candy Crush', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB'],
            ['game_id' => 2, 'user_id' => '2', 'game_name' => 'Candy Crush Saga', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB']

        ];

        $mockRepo->method('fetchGames')->willReturn($mockGamesArray);

        $games = $mockRepo->fetchGames();

        $this->assertNotEquals($newGameDetails[1]['game_name'], $games[0]['game_name']);

        try{
            $this->assertNotEquals($newGameDetails[0]['game_name'], $games[0]['game_name']);
            $this->fail('An Error should have been thrown');

        }catch (\Exception $error){

            echo 'The game is already inserted.';
        }
    }
}