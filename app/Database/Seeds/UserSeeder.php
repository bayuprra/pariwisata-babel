<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $userModel->save([
            'name' => 'user1',
            'email_address' => 'user1@mail.com',
            'password' => password_hash('user1', PASSWORD_DEFAULT)
        ]);

        $result = $this->db->table('role_users')->insert(['user_id' => $userModel->getInsertID(), 'role_id' => 2]);
    }
}
