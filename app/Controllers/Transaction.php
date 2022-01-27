<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\ChatRoomModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Validation\Validation;
use Config\Services;
use Config\Database;
use ReflectionException;

class Transaction extends BaseController
{
    /** @var TransactionModel */
    private $transactionModel;

    /** @var ChatRoomModel */
    private $chatroomModel;

    /** @var Validation */
    private $validation;

    public function __construct()
    {
        $this->validation = Services::validation();
        $this->transactionModel = new TransactionModel();
        $this->chatroomModel = new ChatRoomModel();
    }

    public function index(): string
    {
        $data = [
            'title'         => 'Guide | ',
            'transaction'   =>  $this->transactionModel->transaction()
        ];
        dump($data);

        return view('users/chatting', $data);
    }


    public function store(): RedirectResponse
    {
        $data = [
            'chat_room_id'     => $this->request->getVar('chat_room_id'),
            'phone'            => $this->request->getVar('phone'),
            'price'            => $this->request->getVar('price'),
            'date_start'       => $this->request->getVar('date_start'),
            'date_finish'      => $this->request->getVar('date_finish'),
            'destination'      => $this->request->getVar('destination'),
            'transport'        => $this->request->getVar('transport'),
            'payment'          => $this->request->getVar('payment'),
            'status'           => $this->request->getVar('status'),
            'note'             => $this->request->getVar('note'),
            'meetpoint'        => $this->request->getVar('meetpoint'),
        ];


        if ($this->transactionModel->save($data)) {
            $transactionId = $this->transactionModel->getInsertID();

            if (!$transactionId) {
                throw ModelException::forNoPrimaryKey(Transaction::class);
            }

            return redirect()->back()->withInput()->with('success', 'Data Transaksi Telah Disimpan');
        }

        return redirect()->back()->withInput()->with('errors', $this->transactionModel->errors());
    }
}
