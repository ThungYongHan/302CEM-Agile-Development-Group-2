<?php

use App\GameRepository;
use PHPUnit\Framework\TestCase;

class MockGamesTest extends TestCase
{
    public function testMockGameIsInserted(){
        $mockGame = $this->createMock(GameRepository::class);
        $mockGameArray=[
            ['game_id' => 1, 'user_id' => '1', 'game_name' => 'Pokemon', 'game_description' => 'Catch creatures!', 'game_publisher' => 'GameFreak', 'game_datetime' => '2021-10-12 22:00:00', 'game_year' => '2020', 'game_cover' => 'BLOB'],
        ];
        $mockGame ->method('insertGames')->willReturn($mockGameArray);
        $Games = $mockGame->insertGames();
        $this->assertEquals('Pokemon', $Games[0]['game_name']);
        $this->assertEquals('2021-10-12 22:00:00', $Games[0]['game_datetime']);
    }
}
