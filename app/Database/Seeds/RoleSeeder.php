<?php

namespace App\Database\Seeds;

use App\Models\RoleModel;
use CodeIgniter\Database\Seeder;
use ReflectionException;

class RoleSeeder extends Seeder
{
    /**
     * @return mixed|void
     * @throws ReflectionException
     */
    public function run()
    {
        $roles = [
            'admin',
            'guide',
            'visitor'
        ];

        foreach ($roles as $role) {
            $model = new RoleModel();
            $model->save(['name' => $role]);
        }
    }
}
