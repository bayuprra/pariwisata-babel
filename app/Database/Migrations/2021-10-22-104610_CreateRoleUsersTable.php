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
        $this->forge->addForeignKey('role_id','roles','id');
        $this->forge->addForeignKey('user_id','users','id');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
