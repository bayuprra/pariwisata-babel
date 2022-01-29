<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Guide extends Entity
{
    protected $attributes = [
        'name'        => 'null',
        'phone'       => 'null',
        'experience'  => 'null',
        'study'       => 'null',
        'gender'      => 'null',
        'religion'    => 'null',
        'address'     => 'null',
        'age'         => 'null',
        'email'       => 'null',
        'facebook'    => 'null',
        'instagram'   => 'null',
        'twitter'     => 'null',
        'user_id'     => 'null',
        'is_approve'  => 'null',
    ];

    public function getIdentityPicture()
    {
        if (getenv('CI_ENVIRONMENT') === 'production') {
            return $this->attributes['identity_picture'];
        }

        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['identity_picture']);
    }

    public function getVideo()
    {
        if (getenv('CI_ENVIRONMENT') === 'production') {
            return $this->attributes['video'];
        }

        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['video']);
    }
}
