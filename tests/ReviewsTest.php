<?php
use PHPUnit\Framework\TestCase;

class ReviewsTest extends TestCase
{
    /** @group db */

    public function test_user_rating_number_are_different(){
        $mockRepo = $this->createMock(\App\ReviewRepository::class);

        $mockReviewsArray=[
            ['review_id'=>198,'user_id'=>6,'game_id'=>1,
                'user_review'=>'dread',
                'review_num'=>4,'review_datetime'=>'2021-10-18 22:45:28']
        ];

        $newReview=[
            ['review_id'=>199,'user_id'=>6,'game_id'=>2,
                'user_review'=>'dread',
                'review_num'=>2,'review_datetime'=>'2021-10-18 22:45:55']
        ];

        $mockRepo->expects($this->once())->method('fetchReviews')->willReturn($mockReviewsArray);

        $reviews = $mockRepo->fetchReviews();

        try{
            $this->assertNotEquals($newReview[0]['review_num'],$reviews[0]['review_num']);
            echo'Review number is not the same.';
//
        }catch (Exception $error){
            echo $error->getMessage();
            $this->fail("Review number is the same");


        }
    }
    public function test_user_reviews_are_different(){
        $mockRepo = $this->createMock(\App\ReviewRepository::class);

        $mockReviewsArray=[
            ['review_id'=>198,'user_id'=>6,'game_id'=>1,
                'user_review'=>'dread',
                'review_num'=>4,'review_datetime'=>'2021-10-18 22:45:28']
        ];

        $newReview=[
            ['review_id'=>199,'user_id'=>6,'game_id'=>4,
                'user_review'=>'creep bro',
                'review_num'=>2,'review_datetime'=>'2021-10-17 22:07:4']
        ];

        $mockRepo->expects($this->once())->method('fetchReviews')->willReturn($mockReviewsArray);

        $reviews = $mockRepo->fetchReviews();

        try{
//            $assertValue = $mockReviewsArray[0]['user_review'] && $reviews[0]['user_review'];
            $this->assertNotEquals($newReview[0]['user_review'],$reviews[0]['user_review']);
            echo "User reviews are different";



//
        }catch (Exception $error){
            echo $error->getMessage();
            $this->fail('User reviews are identical.');
        }

    }

}