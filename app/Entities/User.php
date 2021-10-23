<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    protected $attributes = [
        'name' => null,
        'password' => null,
        'email_address' => null,
        'picture' => null
    ];
}
