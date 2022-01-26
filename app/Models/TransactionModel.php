<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Transaction;
use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transactions';
    protected $returnType = Transaction::class;
    protected $allowedFields = [
        'chat_room_id',
        'phone',
        'price',
        'date_start',
        'date_finish',
        'destination',
        'transport',
        'payment',
        'status',
        'note',
        'meetpoint'
    ];

    protected $validationRules = [
        'chat_room_id'  => 'required|is_unique[transactions.chat_room_id,id,{id}]',
        'phone'         => 'required|numeric',
        'price'         => 'required|numeric',
        'date_start'    => 'required|valid_date',
        'date_finish'   => 'required|valid_date',
        'destination'   => 'required',
        'transport'     => 'required',
        'payment'       => 'required',
        'status'        => 'required',
        'note'          => 'required',
        'meetpoint'     => 'required'
    ];
}
