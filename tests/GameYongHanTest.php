<?php
use App\GameYongHan;
use App\GameRepositoryYongHan;
use PHPUnit\Framework\TestCase;

class GameYongHanTest extends TestCase
{
    protected $game;

    protected function setUp(): void
    {
        $this->game = new GameRepositoryYongHan;
    }

    protected function tearDown(): void
    {
        unset($this->game);
    }

    //test pass if game is an array
    public function test_Validate_Game_Is_Array()
    {
        $result = $this->game->validateGameIsArray();
        $this->assertTrue($result);
    }

    // test pass if game array has key of as listed
    public function test_Validate_Game_Has_All_Keys()
    {
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

    // deliberately fail test as game array is missing game_cover key
    public function testFail_Validate_Game_Missing_GameCover_Key()
    {
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
        } catch (\Exception $error) {
            $this->assertEquals('Failed asserting that an array has the key \'game_cover\'.', $error->getMessage());
        }
    }

    // deliberately fail test as there are missing parameters when calling addGame()
    public function testFail_addGame_When_Missing_Parameters()
    {
        try {
            $this->assertTrue($this->game->addGame(
                'mockUser',
                "",
                'Explore a vast new world and catch creatures!',
                'GameFreak',
                '2021-10-15 22:00:00',
                "",
                'pokemon_cover.jpg'
            ));
        } catch (\Exception $error) {
            $this->assertEquals('Failed asserting that false is true.', $error->getMessage());
        }
    }

    // test pass if addGame() functions as expected with correct game insertion
    public function test_addGame()
    {
        $mockGame = $this->createMock(GameRepositoryYongHan::class);
        $mockGameArray=[
                ['user_id' => 1, 'game_id' => 1, 'game_name' => 'Pokemon Sword',
                'game_description' => 'Explore a vast new world and catch creatures!',
                'game_publisher' => 'GameFreak', 'game_datetime' => '2021-10-15 22:00:00',
                'game_year' => '2020', 'game_cover' => 'pokemon_cover.jpg'],
        ];

        $mockGame ->expects($this->exactly(1)) ->method('addGame')->willReturn($mockGameArray);
        $Games = $mockGame->addGame(
            'user1',
            'Pokemon Sword',
            'Explore a vast new world and catch creatures!',
            'GameFreak',
            '2021-10-15 22:00:00',
            '2020',
            'pokemon_cover.jpg'
        );

        $this->assertEquals(1, $Games[0]['user_id']);
        $this->assertEquals('Pokemon Sword', $Games[0]['game_name']);
        $this->assertEquals('Explore a vast new world and catch creatures!', $Games[0]['game_description']);
        $this->assertEquals('GameFreak', $Games[0]['game_publisher']);
        $this->assertEquals('2021-10-15 22:00:00', $Games[0]['game_datetime']);
        $this->assertEquals('2020', $Games[0]['game_year']);
        $this->assertEquals('pokemon_cover.jpg', $Games[0]['game_cover']);
    }
}
