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
            'picture'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'bio'       => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('guides');
    }

    public function down()
    {
        $this->forge->dropTable('guides');
    }
}
