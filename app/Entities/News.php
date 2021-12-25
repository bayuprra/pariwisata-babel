<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use Carbon\Carbon;

class News extends Entity
{
    protected $dates = ['created_at', 'updated_at'];
    protected $attributes = [
        'title' => 'null',
        'category' => 'null',
        'content' => 'null',
    ];

    public function getTime()
    {
        $dt = Carbon::parse($this->attributes['created_at']);
        return $dt->diffForHumans();
    }
}
