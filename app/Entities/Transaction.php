<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\ChatModel;
use App\Models\TransactionModel;

class Transaction extends Entity
{
    protected $attributes = [
        'chat_room_id'  => 'null',
        'phone'         => 'null',
        'price'         => 'null',
        'date_start'    => 'null',
        'date_finish'   => 'null',
        'destination'   => 'null',
        'transport'     => 'null',
        'payment'       => 'null',
        'status'        => 'null',
        'note'          => 'null',
        'meetpoint'     => 'null',
    ];
}
