<?php

namespace App\Controllers;

use App\Models\ChatModel;
use App\Models\ChatRoomModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\Validation\Validation;
use Config\Services;

class ChatRoom extends BaseController
{
    use ResponseTrait;


    /** @var ChatRoomModel */
    private $chatRoomModel;

    /** @var ChatModel */
    private $chatModel;

    /** @var Validation */
    private $validation;


    public function __construct()
    {
        $this->chatRoomModel = new ChatRoomModel();
        $this->chatModel = new ChatModel();
        $this->validation = Services::validation();
    }


    public function index(): string
    {
        $data = [
            'title'    => 'Direct Message | ',
            'chatRoom' => $this->chatRoomModel->first()
        ];

        return view('users/chatting', $data);
    }


    public function store(): RedirectResponse
    {
        $data = [
            'user_id'  => $this->request->getVar('user_id'),
            'guide_id' => $this->request->getVar('guide_id')
        ];

        $chatRoom = $this->chatRoomModel->where('user_id', $data['user_id'])->where('guide_id', $data['guide_id'])->first();

        if ($chatRoom) {
            return redirect()->to('/direct-message')->with('chat_room_id', $chatRoom->id);
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

    public function triggerMessage(int $roomId)
    {
        $chats = $this->chatRoomModel->where('id', $roomId)->first();

        return $this->respond($chats->chats(), 200);
    }
}