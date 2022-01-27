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
        'phone'         => 'permit_empty|numeric',
        'price'         => 'permit_empty|numeric',
        'date_start'    => 'permit_empty|valid_date',
        'date_finish'   => 'permit_empty|valid_date',
        'destination'   => 'permit_empty',
        'transport'     => 'permit_empty',
        'payment'       => 'permit_empty',
        'status'        => 'permit_empty',
        'note'          => 'permit_empty',
        'meetpoint'     => 'permit_empty'
    ];

    public function transaction()
    {
        $transaction = new TransactionModel();

        return $transaction->table('transactions')->join('chat_rooms', 'transactions.chat_room_id=chat_rooms.id')->findAll();
    }
}
