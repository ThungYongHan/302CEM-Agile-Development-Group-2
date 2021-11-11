<?php

use PHPUnit\Framework\TestCase;
use App\GameRepo;

class InventoryTest extends TestCase
{
    public function testGameNameValid()
    {
        $mockRepo = $this->createMock(GameRepo::class);
        $inventory = new \App\GameInventory($mockRepo);



        $mockGamesArray = [
            ['game_id' => 1, 'user_id' => '1', 'game_name' => 'Candy Crush', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB']
        ];

        $newGameDetails = [
            ['game_id' => 1, 'user_id' => '1', 'game_name' => 'Candy Crush', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB'],
            ['game_id' => 2, 'user_id' => '2', 'game_name' => 'Candy Crush Saga', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB']

        ];

        $mockRepo->method('fetchGames')->willReturn($mockGamesArray);

        $inventory->setGames();

        $this->assertNotEquals($newGameDetails[1]['game_name'], $inventory->getGames()[0]['game_name']);
    }

    public function testThrowingErrorWhenGameNameNotValid()
    {
        $mockRepo = $this->createMock(GameRepo::class);
        $inventory = new \App\GameInventory($mockRepo);

        $mockGamesArray = [
            ['game_id' => 1, 'user_id' => '1', 'game_name' => 'Candy Crush', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB']
        ];

        $newGameDetails = [
            ['game_id' => 1, 'user_id' => '1', 'game_name' => 'Candy Crush', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB'],
            ['game_id' => 2, 'user_id' => '2', 'game_name' => 'Candy Crush Saga', 'game_description' => 'Sweet game!', 'game_publisher' => 'King', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB']

        ];

        $mockRepo->method('fetchGames')->willReturn($mockGamesArray);

        $inventory->setGames();

        try{
            $this->assertNotEquals($newGameDetails[0]['game_name'], $inventory->getGames()[0]['game_name']);
            $this->fail('An Error should have been thrown');

        }catch (\Exception $error){

            echo 'The game is already inserted.';
        }
    }
}