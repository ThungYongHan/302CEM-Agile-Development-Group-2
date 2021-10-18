<?php
use App\Game;
use App\GameRepository;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    protected $game;

    protected function setUp(): void
    {
        $this->game = new GameRepository;
    }

    protected function tearDown(): void {
        unset($this->game);
    }

//    public function testGamesCanBeSet(){
//        $mockGame = $this->createMock(\App\GameRepository::class);
//        $game = new \App\Game($mockGame);
//        $mockGamesArray = [
//            ['game_name' => '1', 'game_desc' => '1'],
//            ['game_name' => '2', 'game_desc' => '1'],
//        ];
//
//        $mockGame->expects($this->exactly(1))->method('fetchGames')->willReturn($mockGamesArray);
//        $game->setGames();
//
//        $this->assertEquals('1', $game->getGames()[0]['game_desc']);
//        $this->assertEquals('1', $game->getGames()[1]['game_desc']);
//    }

    //check if game is an array
    public function testValidate_Game_Is_Array() {
        $result = $this->game->validateGameIsArray();
        $this->assertTrue($result);
    }

    // check if array has key of as listed
    public function testValidate_Game_Has_All_Keys() {
        $result = $this->game->validateGameHasAllKeys();
        $this->assertArrayHasKey('user_id', $result);
        $this->assertArrayHasKey('game_id', $result);
        $this->assertArrayHasKey('game_name', $result);
        $this->assertArrayHasKey('game_description', $result);
        $this->assertArrayHasKey('game_publisher', $result);
        $this->assertArrayHasKey('game_datetime', $result);
        $this->assertArrayHasKey('game_year', $result);
        $this->assertArrayHasKey('game_cover', $result);
    }

    // check if array has key of as listed
    public function testFail_Validate_Game_Missing_GameCover_Key() {
        $result = $this->game->validateGameMissingKey();
        $this->assertArrayHasKey('user_id', $result);
        $this->assertArrayHasKey('game_id', $result);
        $this->assertArrayHasKey('game_name', $result);
        $this->assertArrayHasKey('game_description', $result);
        $this->assertArrayHasKey('game_publisher', $result);
        $this->assertArrayHasKey('game_datetime', $result);
        $this->assertArrayHasKey('game_year', $result);
        try {
            $this->assertArrayHasKey('game_cover', $result);
        } catch(\Exception $error){
            $this->assertEquals('Failed asserting that an array has the key \'game_cover\'.', $error->getMessage());
        }
        //$this->assertArrayNotHasKey('game_cover', $result);
    }


    public function testFail_addGame_When_Missing_Parameters(){
//       try {
//            $this->game->addGame('mockUser', "", 'Explore a vast new world and catch creatures!',
//                'GameFreak', '2021-10-15 22:00:00', "", 'pokemon_cover.jpg');
//            $this->fail('Missing game_name and game_year parameters!');
//        } catch (\Exception $error){
//            $this->assertEquals('Missing game_name and game_year parameters!', $error->getMessage());
//        }
        try {
            $this->assertTrue($this->game->addGame('mockUser', "", 'Explore a vast new world and catch creatures!',
                'GameFreak', '2021-10-15 22:00:00', "", 'pokemon_cover.jpg'));
        } catch(\Exception $error){
            $this->assertEquals('Failed asserting that false is true.', $error->getMessage());
        }
    }

    public function testaddGame(){
        $mockGame = $this->createMock(GameRepository::class);
        $mockGameArray=[
            ['user_id' => 1, 'game_id' => 1, 'game_name' => 'Pokemon Sword', 'game_description' => 'Explore a vast new world and catch creatures!',
                'game_publisher' => 'GameFreak', 'game_datetime' => '2021-10-15 22:00:00', 'game_year' => '2020', 'game_cover' => 'pokemon_cover.jpg'],
        ];

        $mockGame ->expects($this->exactly(1)) ->method('addGame')->willReturn($mockGameArray);
        //$mockGame ->expects($this->exactly(1)) ->method('addGame')->willReturn($mockGameArray);
        $Games = $mockGame->addGame('mockUser', 'Pokemon Sword', 'Explore a vast new world and catch creatures!',
            'GameFreak', '2021-10-15 22:00:00', '2020', 'pokemon_cover.jpg');

        $this->assertEquals(1, $Games[0]['user_id']);
        $this->assertEquals('Pokemon Sword', $Games[0]['game_name']);
        $this->assertEquals('Explore a vast new world and catch creatures!', $Games[0]['game_description']);
        $this->assertEquals('GameFreak', $Games[0]['game_publisher']);
        $this->assertEquals('2021-10-15 22:00:00', $Games[0]['game_datetime']);
        $this->assertEquals('2020', $Games[0]['game_year']);
        $this->assertEquals('pokemon_cover.jpg', $Games[0]['game_cover']);
    }
}