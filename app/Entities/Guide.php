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
        'package'     => 'null',
        'description' => 'null'
    ];

    public function getIdentityPicture()
    {
        return base_url() . '/image/' . $this->attributes['identity_picture'];
    }

    public function getVideo()
    {
        return base_url() . '/image/' . $this->attributes['video'];
    }
}
