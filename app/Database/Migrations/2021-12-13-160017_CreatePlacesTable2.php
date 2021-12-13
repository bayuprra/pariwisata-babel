<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlacesTable2 extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'street'             => [
                'type'           => 'VARCHAR',
                'constraint'     => '100'
            ]
        ]);

        $this->forge->addColumn('places', 'street');
        $this->forge->dropColumn('places', 'rt/rw');
        $this->forge->dropColumn('places', 'emergency_number');
        $this->forge->dropColumn('places', 'operational_hour');
    }

    //



    public function down()
    {
        //
    }
}
