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
        'rt/rw' => null,
        'emergency_number' => null,
        'fee' => null,
        'operational_hour' => null,
        'maps' => null,
        'picture' => null,
        'user_id' => null,
        'is_approve' => null,
    ];
}