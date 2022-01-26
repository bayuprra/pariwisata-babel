<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Chat;

class ChatModel extends Model
{
    protected $table = 'chats';
    protected $returnType = Chat::class;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'chat_room_id',
        'user_id',
        'message'
    ];
}
