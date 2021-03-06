<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use Config\Database;

class User extends Entity
{
    protected $attributes = [
        'name'          => null,
        'password'      => null,
        'email_address' => null,
        'picture'       => null
    ];

    public function getPicture()
    {
        if (getenv('CI_ENVIRONMENT') === 'production') {
            return $this->attributes['picture'];
        }

        return sprintf('%s/%s/%s', base_url(), getenv('image_folder'), $this->attributes['picture']);
    }

    public function roles()
    {
        $roleUser   = Database::connect();

        return $roleUser->table('role_users')
            ->join('roles', 'role_users.role_id=roles.id')
            ->where("user_id", $this->attributes['id'])
            ->get()
            ->getResult();
    }
}
