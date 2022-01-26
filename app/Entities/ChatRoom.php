<?php

namespace App\Entities;

use App\Models\GuideModel;
use App\Models\UserModel;
use CodeIgniter\Entity\Entity;
use App\Models\ChatModel;

class ChatRoom extends Entity
{
    protected $dates = ['created_at', 'updated_at'];
    protected $attributes = [
        'user_id'  => 'null',
        'guide_id' => 'null'
    ];

    public function user()
    {
        $user = new UserModel();

        return $user->where(['id' => $this->attributes['user_id']])->first();
    }

    public function guide()
    {
        $guide = new GuideModel();

        return $guide->where(['id' => $this->attributes['guide_id']])->first();
    }

    public function chats(): array
    {
        $chats = new ChatModel();

        return $chats->where(['chat_room_id' => $this->attributes['id']])->findAll();
    }
}
