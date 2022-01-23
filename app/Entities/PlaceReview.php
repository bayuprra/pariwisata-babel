<?php

declare(strict_types=1);

namespace App\Entities;

use App\Models\UserModel;
use CodeIgniter\Entity\Entity;

class PlaceReview extends Entity
{
    protected $attributes = [
        'rating' => 'null',
        'comment' => 'null',
        'place_id' => 'null',
        'user_id' => 'null',
    ];

    public function user()
    {
        $user = new UserModel();

        return $user->where(['id' => $this->attributes['user_id']])->first();
    }
}
