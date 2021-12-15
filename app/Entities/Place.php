<?php

declare(strict_types=1);

namespace App\Entities;

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
}
