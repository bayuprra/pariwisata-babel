<?php

namespace App\Controllers;

use App\Models\ChatModel;
use App\Models\ChatRoomModel;
use App\Models\TransactionModel;
use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\Response;
use CodeIgniter\Validation\Validation;
use Config\Services;

class ChatRoom extends BaseController
{
    use ResponseTrait;


    /** @var ChatRoomModel */
    private $chatRoomModel;

    /** @var TransactionModel */
    private $transactionModel;

    /** @var ChatModel */
    private $chatModel;

    /** @var Validation */
    private $validation;


    public function __construct()
    {
        $this->chatRoomModel = new ChatRoomModel();
        $this->chatModel = new ChatModel();
        $this->transactionModel = new TransactionModel();
        $this->validation = Services::validation();
    }


    public function index(): string
    {
        $rooms = $this->chatRoomModel->where('user_id', session()->get('id'))->findAll();
        if (session()->get('dataGuide')) {
            $rooms = $this->chatRoomModel->where('guide_id', session()->get('dataGuide')->id)->findAll();
        }

        $data = [
            'title'    => 'Direct Message | ',
            'chatRoom' => $rooms,
            'transaction' => $this->transactionModel->where('chat_room_id', 1)->first()
        ];

        return view('users/chatting', $data);
    }


    public function store(int $guideId): RedirectResponse
    {
        $data = [
            'user_id'  => session()->get('id'),
            'guide_id' => $guideId
        ];

        $chatRoom = $this->chatRoomModel->where('user_id', $data['user_id'])->where('guide_id', $data['guide_id'])->first();

        if ($chatRoom) {

            session()->set('chat_room', $chatRoom);

            return redirect()->to('/direct-message');
        }

        if ($this->chatRoomModel->save($data)) {

            return redirect()->to('/direct-message')->with('chat_room_id', $this->chatRoomModel->getInsertID());
        }

        return redirect()->back()->with('errors', $this->chatRoomModel->errors());
    }


    public function sendMessage()
    {
        $this->validation->setRules([
            'chat_room_id' => 'required|is_not_unique[chat_rooms.id,id,{chat_room_id}]',
            'user_id'      => 'required|is_not_unique[users.id,id,{user_id}]',
            'message'      => 'required'
        ]);

        if ($this->validation->withRequest($this->request)->run()) {

            $data = [
                'chat_room_id' => $this->request->getVar('chat_room_id'),
                'user_id'      => $this->request->getVar('user_id'),
                'message'      => $this->request->getVar('message')
            ];

            if ($this->chatModel->save($data)) {

                return $this->respond('success', 200);
            }

            return $this->fail($this->chatModel->errors(), 500);
        }

        return $this->fail($this->validation->getErrors(), 500);
    }

    public function triggerMessage(int $roomId): Response
    {
        $chats = $this->chatRoomModel->where('id', $roomId)->first();

        return $this->respond($chats->chats(), 200);
    }
}
