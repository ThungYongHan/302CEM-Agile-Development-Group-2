<?php
use App\Game;
use App\GameRepository;
use PHPUnit\Framework\TestCase;

class MockGamesTest extends TestCase
{
    protected $game;

    protected function setUp(): void
    {
        $this->game = new GameRepository;
    }

    public function testCheckMockGameIsInsertedAndHasCorrectDetails(){
        $mockGame = $this->createMock(GameRepository::class);
        $mockGameArray=[
            ['user_id' => 1, 'game_id' => 1, 'game_name' => 'Pokemon Sword', 'game_description' => 'Explore a vast world and catch creatures!',
                'game_publisher' => 'GameFreak', 'game_datetime' => '2021-10-15 22:00:00', 'game_year' => '2020', 'game_cover' => 'pokemon_cover.jpg'],
        ];
        $mockGame ->method('insertGames')->willReturn($mockGameArray);
        $Games = $mockGame->insertGames();
        $this->assertEquals('Pokemon Sword', $Games[0]['game_name']);
        $this->assertEquals('Explore a vast world and catch creatures!', $Games[0]['game_description']);
        $this->assertEquals('GameFreak', $Games[0]['game_publisher']);
        $this->assertEquals('2021-10-15 22:00:00', $Games[0]['game_datetime']);
        $this->assertEquals('2020', $Games[0]['game_year']);
        $this->assertEquals('pokemon_cover.jpg', $Games[0]['game_cover']);
    }

    public function testValidateGameIsArray() {
        $result = $this->game->validateGameIsArray();
        $this->assertTrue($result);
    }

    public function testerror_message_shown_when_trying_to_add_blank_game_name(){
        try {
            $this->game->addGameName(1);

        } catch (TypeError $error) {
//            $this->assertStringStartsWith('App\Game::addGameName():', $error->getMessage());
            dd($error);
        }
    }
}
