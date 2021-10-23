<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Role extends Entity
{
    protected $attributes = [
        'user_id' => 'null',
        'place_id' => 'null',
    ];
}
