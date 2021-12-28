<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $userModel->save([
            'name' => 'admin1',
            'email_address' => 'admin1@mail.com',
            'password' => password_hash('R4h4si4!', PASSWORD_DEFAULT)
        ]);

        $result = $this->db->table('role_users')->insert(['user_id' => $userModel->getInsertID(), 'role_id' => 1]);

        dump($result);
    }
}
