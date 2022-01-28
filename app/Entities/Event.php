<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Event extends Entity
{
    protected $attributes = [
        'name'          => 'null',
        'district'      => 'null',
        'sub_district'  => 'null',
        'village'       => 'null',
        'date'          => 'null',
        'content'       => 'null'
    ];

    public function getPicture()
    {
        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['picture']);
    }
}
