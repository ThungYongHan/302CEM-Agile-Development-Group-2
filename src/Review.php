<?php

namespace App;

class Review
{
    private array $reviews;

    public function __construct (private ReviewRepository $reviewRepository)
    {

    }


    public function setReviews(){


        $this->reviews = $this->reviewRepository->fetchReviews();

    }

    /**
     * @param array $reviews
     */
    public function getReviews():array{
        return $this->reviews;
    }
}