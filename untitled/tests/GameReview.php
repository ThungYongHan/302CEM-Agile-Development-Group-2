<?php

class GameReview extends \PHPUnit\Framework\TestCase
{
   public function testMockUserReviewsAreSuccessfullyAddedOrNot() {
       $mockRepo = $this -> createMock(\App\ReviewRepository::class);

       $mockReviewsArray =[
           ['review_id' =>1, 'user_id'=>1, 'game_id'=> 1,
               'user_review'=>'If you are looking for a fun game that you can just sit back and relax with, then Genshin Impact is excellent for that. The game’s world is pleasant to drink in and the combat is a nice balance of being involved, while not becoming overly complicated.',
                'review_num'=>5, 'review_datetime'=> '2021-09-01 00:00:00']
       ];

       $newReview =[
           ['review_id' =>1, 'user_id'=>1, 'game_id'=> 1,
               'user_review'=>'If you are looking for a fun game that you can just sit back and relax with, then Genshin Impact is excellent for that. The game’s world is pleasant to drink in and the combat is a nice balance of being involved, while not becoming overly complicated.',
               'review_num'=>5, 'review_datetime'=> '2021-09-01 00:00:00']
       ];
        $mockRepo -> expects ($this ->once ()) -> method ('fetchReviews')-> willReturn($mockReviewsArray);

        $reviews = $mockRepo -> fetchReviews();

        try {
            $this->assertSame(1 + 4, $reviews[0]['review_num']);
            $this->fail('This review is not added successfully');

        }catch (Exception $error) {
            echo $error ->getMessage();
        }



   }


}