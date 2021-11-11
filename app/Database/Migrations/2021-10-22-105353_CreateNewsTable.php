<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNewsTable extends Migration
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
            'title'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'category'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'picture'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'content'       => [
                'type'       => 'TEXT',
            ],
            'preview'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at'       => [
                'type'       => 'DATETIME',
                'null'       => TRUE,
            ],
            'updated_at'       => [
                'type'       => 'DATETIME',
                'null'       => TRUE,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
