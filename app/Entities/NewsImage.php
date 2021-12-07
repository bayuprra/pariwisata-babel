<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class NewsImage extends Entity
{
    protected $dates = ['created_at', 'updated_at'];

    public function getSmall()
    {
        return base_url() . '/image/' . $this->attributes['small'];
    }

    public function getMedium()
    {
        return base_url() . '/image/' . $this->attributes['medium'];
    }

    public function getLarge()
    {
        return base_url() . '/image/' . $this->attributes['large'];
    }

    public function getOriginal()
    {
        return base_url() . '/image/' . $this->attributes['original'];
    }
}
