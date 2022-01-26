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
        'user_id',
        'guide_id',
        'message'
    ];
}
