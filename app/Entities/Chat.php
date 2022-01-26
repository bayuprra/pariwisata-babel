<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Chat extends Entity
{
    protected $dates = ['created_at', 'updated_at'];
    protected $attributes = [
        'chat_room_id'  => 'null',
        'user_id'       => 'null',
        'message'       => 'null',
    ];
}
