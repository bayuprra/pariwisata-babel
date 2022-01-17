<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class User2Seeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $userModel->save([
            'name' => 'user2',
            'email_address' => 'user2@mail.com',
            'password' => password_hash('user2', PASSWORD_DEFAULT)
        ]);

        $result = $this->db->table('role_users')->insert(['user_id' => $userModel->getInsertID(), 'role_id' => 3]);
    }
}
