<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNewsImagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'news_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true,
                'null'       => false,
            ],
            'original' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'large' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'medium' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'small' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->dropColumn('news', 'picture');
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('news_id', 'news', 'id');
        $this->forge->createTable('news_images');
    }

    public function down()
    {
        $this->forge->dropTable('news_images');
    }
}
