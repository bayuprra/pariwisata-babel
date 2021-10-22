<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGuidesTable extends Migration
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
            'name'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone'       => [
                'type'       => 'STRING',
                'constraint' => '100',
            ],
            'identity_picture'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'bio'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'experience'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'study'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'video'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'user_id'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'is_approve'    => [
                'type'          => 'BOOLEAN',
                'default'       => 0,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('guides');
    }

    public function down()
    {
        $this->forge->dropTable('guides');
    }
}
