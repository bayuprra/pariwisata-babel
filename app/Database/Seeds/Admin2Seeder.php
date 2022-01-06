<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class Admin2Seeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $userModel->save([
            'name' => 'admin2',
            'email_address' => 'admin2@mail.com',
            'password' => password_hash('admin2', PASSWORD_DEFAULT)
        ]);

        $result = $this->db->table('role_users')->insert(['user_id' => $userModel->getInsertID(), 'role_id' => 1]);

        dump($result);
    }
}
