<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBeGuidesTable extends Migration
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
            'picture'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'bio'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'experience'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'study'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'video'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'user_id'       => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('be_guides');
    }

    public function down()
    {
        $this->forge->dropTable('be_guides');
    }
}
