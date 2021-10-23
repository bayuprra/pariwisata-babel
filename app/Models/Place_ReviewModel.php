<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Place;
use CodeIgniter\Model;

class Place_ReviewModel extends Model
{
    protected $table = 'place_reviews';
    protected $returnType = Place_Review::class;
    protected $allowedFields = [
        'rating',
        'comment',
        'place_id',
        'user_id',
    ];

    protected $validationRules = [
        'rating' => 'required',
        'comment' => 'required',
        'user_id' => 'required|is_unique[users.id]',
        'place_id' => 'required|is_unique[places.id]',
    ];
}
