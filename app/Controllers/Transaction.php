<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\ChatRoomModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Validation\Validation;
use Config\Services;
use Config\Database;
use ReflectionException;

class Transaction extends BaseController
{
    use ResponseTrait;

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

        return view('users/chatting', $data);
    }


    public function nego(): Response
    {
        $transactionId = $this->request->getVar('transaction_id');

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

        if ($transactionId) {
            if ($this->transactionModel->update($transactionId, $data)) {
                return $this->respond('success', 200);
            }

            return $this->fail($this->transactionModel->errors(), 500);
        }

        if ($this->transactionModel->save($data)) {
            $transactionId = $this->transactionModel->getInsertID();

            if (!$transactionId) {
                throw ModelException::forNoPrimaryKey(Transaction::class);
            }

            return $this->respond('success', 200);
        }
        return $this->fail($this->transactionModel->errors(), 500);
    }


    public function transaction(int $id): Response
    {
        $transaction = $this->transactionModel->where('chat_room_id', $id)->first();

        return $this->respond($transaction, 200);
    }
}
