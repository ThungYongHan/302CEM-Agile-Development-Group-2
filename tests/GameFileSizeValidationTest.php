<?php

//namespace TDD\AddGameReview\Testing;

//use mysql_xdevapi\Exception;
use PHPUnit\Framework\TestCase;
//use TDD\AddGameReview\GameRepository;

class GameFileSizeValidationTest extends TestCase
{
    public function testGameNameValidation()
    {
        $filename = 'h.jpg';
        echo $filename . ': ' . filesize($filename) . ' bytes';


        try{
            $this->assertLessThanOrEqual(filesize($filename), 64512);
            $this->fail('An Error should have been thrown');

        }catch (\Exception $error){

            echo 'The game file is OK.';
        }
    }
}