<?php

declare(strict_types=1);

namespace App\Entities;

use App\Models\NewsImageModel;
use CodeIgniter\Entity\Entity;

class News extends Entity
{
    protected $dates = ['created_at', 'updated_at'];
    protected $attributes = [
        'title' => 'null',
        'category' => 'null',
        'content' => 'null',
    ];

    public function newsImage()
    {
        $newsImage = new NewsImageModel();

        return $newsImage->where(['news_id' => $this->attributes['id']])->first();
    }
}
