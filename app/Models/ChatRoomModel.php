<?php

namespace App\Models;

use App\Entities\ChatRoom;
use CodeIgniter\Model;

class ChatRoomModel extends Model
{
    protected $table = 'chat_rooms';
    protected $returnType = ChatRoom::class;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_id',
        'guide_id',
    ];

    protected $validationRules = [
        'user_id'  => 'required|is_not_unique[users.id,id,{user_id}]',
        'guide_id' => 'required|is_not_unique[guides.id,id,{guide_id}]'
    ];
}
