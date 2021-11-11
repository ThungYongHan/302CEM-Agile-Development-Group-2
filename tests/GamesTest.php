<?php
use PHPUnit\Framework\TestCase;

class GamesTest extends TestCase
{
    /** @group db */

    public function test_delete_game(){
        $mockRepo = $this->createMock(\App\GameRepository::class);

        $mockGamesArray = [
            ['user_id'=>1,'game_name'=>'The Witcher 3','game_desc'=>'hyjthtgjhygfghfgdg','game_publisher'=>'CD Projekt Red','game_datetime'=>'2021-09-01 00:00:00','game_year'=>'2015','game_cover'=>'C:/xampp1/htdocs/302CEM-Agile-Development-Group-2-master/images/Witcher_cover.jpg'],
            ['user_id'=>1,'game_name'=>'God of War','game_desc'=>'asddffggrftgfhy','game_publisher'=>'Santa Monica','game_datetime'=>'2021-09-01 00:00:00','game_year'=>'2018','game_cover'=>'C:/xampp1/htdocs/302CEM-Agile-Development-Group-2-master/images/Genshin_cover.jpg']
        ];

        $mockRepo->expects($this->once())->method('fetchGames')->willReturn($mockGamesArray);

        $games = $mockRepo->fetchGames();

        print_r ($games);

        try{
            unset($games[1]);
            echo 'Game deleted successfully';
            print_r ($games);
        }catch (Exception $error){
            echo $error->getMessage();
            $this->fail("Game cannot be deleted");
        }
    }
    

}