<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGuidesTable2 extends Migration
{
    public function up()
    {
        //
        $this->forge->dropColumn('guides', 'bio');
    }

    public function down()
    {
        //
    }
}
