<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\ChatModel;

class ChatRoom extends Entity
{
    protected $dates = ['created_at', 'updated_at'];
    protected $attributes = [
        'user_id'  => 'null',
        'guide_id' => 'null'
    ];

    public function chats()
    {
        $chats = new ChatModel();

        return $reviews->where(['chat_rooms_id' => $this->attributes['id']])->findAll();
    }
}
