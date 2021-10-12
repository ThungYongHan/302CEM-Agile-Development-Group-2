<?php

use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /** @group db */
    public function testGamesCanBeSet()
    {
        // Setup
        $mockRepo = $this->createMock(\App\GameRepository::class);

        $game = new \App\Inventory($mockRepo);


        $mockGamesArray = [
            ['' => 1, '' => ''],
            ['' => 2, '' => ''],
        ];

        $mockRepo->expects($this->exactly(1))->method('fetchGames')->willReturn($mockGamesArray);

        // Do something

        $game->setProducts();

        // Make assertions
        $this->assertEquals('', $game->getProducts()[0]['']);
        $this->assertEquals('', $game->getProducts()[1]['']);
    }

}