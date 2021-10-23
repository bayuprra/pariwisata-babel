<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Place_Review extends Entity
{
    protected $attributes = [
        'rating' => 'null',
        'comment' => 'null',
        'place_id' => 'null',
        'user_id' => 'null',
    ];
}
