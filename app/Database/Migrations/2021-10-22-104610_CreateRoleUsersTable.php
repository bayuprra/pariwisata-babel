<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'role_id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
        ]);
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
