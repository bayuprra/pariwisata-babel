<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'chat_room_id'          => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
            ],
            'phone'                 => [
                'type'              => 'INT',
                'constraint'        => 15,
            ],
            'price'                 => [
                'type'              => 'INT',
                'constraint'        => 255,
            ],
            'date_start'            => [
                'type'              => 'DATETIME'
            ],
            'date_finish'           => [
                'type'              => 'DATETIME'
            ],
            'destination'           => [
                'type'              => 'TEXT'
            ],
            'transport'             => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'payment'               => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'status'                => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'note'                  => [
                'type'              => 'TEXT'
            ],
            'meetpoint'             => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('chat_room_id', 'chat_rooms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('transactions');
    }

    public function down()
    {
        $this->forge->dropTable('transactions');
    }
}
