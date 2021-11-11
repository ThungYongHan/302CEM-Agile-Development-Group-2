<?php

use PHPUnit\Framework\TestCase;


class MockGamesTest extends TestCase{
    public function test_mock_games_image_file_size(){
        $mockRepo = $this->createMock(\App\GameRepository::class);

        $mockGamesArray = [
            ['user_id'=>1,'game_name'=>'The Witcher 3','game_desc'=>'hyjthtgjhygfghfgdg','game_publisher'=>'CD Projekt Red','game_datetime'=>'2021-09-01 00:00:00','game_year'=>'2015','game_cover'=>'C:/xampp1/htdocs/302CEM-Agile-Development-Group-2-master/images/Witcher_cover.jpg'],
            ['user_id'=>1,'game_name'=>'God of War','game_desc'=>'asddffggrftgfhy','game_publisher'=>'Santa Monica','game_datetime'=>'2021-09-01 00:00:00','game_year'=>'2018','game_cover'=>'C:/xampp1/htdocs/302CEM-Agile-Development-Group-2-master/images/Genshin_cover.jpg']
        ];

        $mockRepo->method('fetchGames')->willReturn($mockGamesArray);

        $games = $mockRepo->fetchGames();

    $filename = $games[0]['game_cover'];
    echo $filename . ': ' . filesize($filename) . ' bytes';

    $maxSize = 65536;
	$actual = filesize($filename);

    try{
        $this->assertLessThanOrEqual($maxSize, $actual);
        echo'Image file is OK.';

    }catch (Exception $error){
        echo $error->getMessage();
        $this->fail("Image file is too large");
    }

    }

}