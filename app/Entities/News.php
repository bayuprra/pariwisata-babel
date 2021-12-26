<?php

declare(strict_types=1);

namespace App\Entities;

use App\Models\NewsImageModel;
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

    public function getTime(): string
    {
        $dt = Carbon::parse($this->attributes['created_at']);
        return $dt->diffForHumans();
    }

    public function readableCreatedAt(): string
    {
        return Carbon::parse($this->attributes['created_at'])->format('d F Y , h:m');
    }

    public function readableUpdatedAt(): string
    {
        return Carbon::parse($this->attributes['created_at'])->format('d F Y , h:m');
    }

    public function newsImage()
    {
        $newsImage = new NewsImageModel();

        return $newsImage->where(['news_id' => $this->attributes['id']])->first();
    }
}
