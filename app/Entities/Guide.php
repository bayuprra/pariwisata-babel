<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Guide extends Entity
{
    protected $attributes = [
        'name' => 'null',
        'phone' => 'null',
        'identity_picture' => 'null',
        'experience' => 'null',
        'study' => 'null',
        'video' => 'null',
        'gender' => 'null',
        'religion' => 'null',
        'address' => 'null',
        'age' => 'null',
        'email' => 'null',
        'facebook' => 'null',
        'instagram' => 'null',
        'twitter' => 'null',
        'user_id' => 'null',
        'is_approve' => 'null',

    ];

    public function guidePicture()
    {
        return base_url() . '/image/' .  $this->attributes['identity_picture'];
    }
    public function guideVideo()
    {
        return base_url() . '/image/' .  $this->attributes['video'];
    }
}
