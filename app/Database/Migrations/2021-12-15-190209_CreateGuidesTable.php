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
                'type'       => 'INT',
                'constraint' => '100',
            ],
            'identity_picture'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
            'gender' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'religion' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'address' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'age' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'facebook' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'instagram' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'twitter' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255,
            ],
            'user_id'       => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
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
