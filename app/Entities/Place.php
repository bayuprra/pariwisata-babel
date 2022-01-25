<?php

declare(strict_types=1);

namespace App\Entities;

use App\Models\PlaceReviewModel;
use CodeIgniter\Entity\Entity;

class Place extends Entity
{
    protected $attributes = [
        'name' => null,
        'district' => null,
        'sub_district' => null,
        'village' => null,
        'fee' => null,
        'street' => null,
        'maps' => null,
        'picture' => null,
        'user_id' => null,
        'is_approve' => null,
    ];

    public function getPicture()
    {
        return base_url() . '/image/' . $this->attributes['picture'];
    }

    public function placeReviews()
    {
        $reviews = new PlaceReviewModel();

        return $reviews->where(['place_id' => $this->attributes['id']])->findAll();
    }

    public function score()
    {
        $reviews = new PlaceReviewModel();
        $reviews = $reviews->where(['place_id' => $this->attributes['id']])->findAll();
        $response = count($reviews);
        $temp = [
            5 => 0,
            4 => 0,
            3 => 0,
            2 => 0,
            1 => 0
        ];


        foreach ($reviews as $review) {
            foreach ($temp as $key => $value) {
                if ($review->rating == $key) $temp[$key] += 1;
            }
        }

        $score = 0;

        foreach ($temp as $key => $value) {
            $score += $key*$value;
        }

        $result = $response !== 0 ? $score / $response : $response;

        return $result;
    }
}
