<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class News extends Entity
{
    protected $dates = ['created_at', 'updated_at'];
    protected $attributes = [
        'title' => 'null',
        'category' => 'null',
        'content' => 'null',
    ];
}
