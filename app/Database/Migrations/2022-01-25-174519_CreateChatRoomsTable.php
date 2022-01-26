<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateChatRoomsTable extends Migration
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
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'guide_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('guide_id', 'guides', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('chat_rooms');
    }

    public function down()
    {
        $this->forge->dropTable('chat_rooms');
    
    }
}
