<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class News extends Entity
{
    protected $attributes = [
        'title' => 'null',
        'category' => 'null',
        'picture' => 'null',
        'content' => 'null',
        'preview' => 'null',
    ];
}
