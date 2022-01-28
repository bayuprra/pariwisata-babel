<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class NewsImage extends Entity
{
    protected $dates = ['created_at', 'updated_at'];

    public function getSmall()
    {
        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['small']);
    }

    public function getMedium()
    {
        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['medium']);
    }

    public function getLarge()
    {
        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['large']);
    }

    public function getOriginal()
    {
        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['original']);
    }
}
