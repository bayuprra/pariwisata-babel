<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class NewsImage extends Entity
{
    protected $dates = ['created_at', 'updated_at'];

    public function getSmall()
    {
        if (getenv('CI_ENVIRONMENT') === 'production') {
            return $this->attributes['small'];
        }

        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['small']);
    }

    public function getMedium()
    {
        if (getenv('CI_ENVIRONMENT') === 'production') {
            return $this->attributes['medium'];
        }

        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['medium']);
    }

    public function getLarge()
    {
        if (getenv('CI_ENVIRONMENT') === 'production') {
            return $this->attributes['large'];
        }

        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['large']);
    }

    public function getOriginal()
    {
        if (getenv('CI_ENVIRONMENT') === 'production') {
            return $this->attributes['original'];
        }

        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['original']);
    }
}
