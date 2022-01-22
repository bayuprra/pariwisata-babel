<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Place;
use App\Entities\PlaceReview;
use CodeIgniter\Model;

class PlaceReviewModel extends Model
{
    protected $table = 'place_reviews';
    protected $returnType = PlaceReview::class;
    protected $allowedFields = [
        'rating',
        'comment',
        'place_id',
        'user_id',
    ];

    protected $validationRules = [
        'rating' => 'required',
        'comment' => 'required',
        'user_id' => 'required|is_unique[place_reviews.user_id,id,{id}]',
        'place_id' => 'required|is_unique[place_reviews.place_id,id,{id}]',
    ];
}
