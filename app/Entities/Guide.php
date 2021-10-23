<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Guide extends Entity
{
    protected $attributes = [
        'name' => 'null',
        'phone' => 'null',
        'identity_picture' => 'null',
        'bio' => 'null',
        'experience' => 'null',
        'study' => 'null',
        'video' => 'null',
        'user_id' => 'null',
        'is_approve' => 'null',
    ];
}
