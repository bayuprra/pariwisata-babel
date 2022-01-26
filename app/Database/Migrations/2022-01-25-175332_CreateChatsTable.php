<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChatsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'chat_room_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'message'          => [
                'type'           => 'TEXT',
            ],
            'created_at'       => [
                'type'       => 'DATETIME',
                'null'       => TRUE,
            ],
            'updated_at'       => [
                'type'       => 'DATETIME',
                'null'       => TRUE,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('chat_room_id', 'chat_rooms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('chats');
    }

    public function down()
    {
        $this->forge->dropTable('chats');
    }
}
