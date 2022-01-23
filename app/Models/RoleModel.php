<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Role;
use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $returnType = Role::class;
    protected $allowedFields = [
        'name',
    ];

    protected $validationRules = [
        'name' => 'required',
    ];

    public function joinRole($id)
    {
        return $this->db->table('role_users')->join('roles', 'role_users.role_id=roles.id')
            ->where("user_id", $id)
            ->get()->getRowArray();
    }
}
