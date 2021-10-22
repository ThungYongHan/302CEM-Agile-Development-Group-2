<?php

use PHPUnit\Framework\TestCase;

class MockReviewsTest extends TestCase{
    public function test_mock_reviews_are_returned(){
        $mockRepo = $this->createMock(\App\ReviewRepository::class);

        $mockReviewsArray = [
            ['review_id'=>1,'user_id'=>1,'game_id'=>1,
                'user_review'=>'If you are looking for a fun game that you can just sit back and relax with, then Genshin Impact is excellent for that. The game’s world is pleasant to drink in and the combat is a nice balance of being involved, while not becoming overly complicated.',
                'review_num'=>5,'review_datetime'=>'2021-09-01 00:00:00'],
            ['review_id'=>1,'user_id'=>2,'game_id'=>1,
                'user_review'=>'Genshin Impact is a video-game that has come to stay. Its free-to-play ARPG proposal is the answer to the wishes of thousands of users who dreamed of an Anime experience this ambitious. ',
                'review_num'=>5,'review_datetime'=>'2021-09-01 00:00:00'],
        ];

        $mockRepo->method('fetchReviews')->willReturn($mockReviewsArray);


        $reviews = $mockRepo->fetchReviews();

        $this->assertEquals('Genshin Impact is a video-game that has come to stay. Its free-to-play ARPG proposal is the answer to the wishes of thousands of users who dreamed of an Anime experience this ambitious. ',
        $reviews[1]['user_review']);


    }
}