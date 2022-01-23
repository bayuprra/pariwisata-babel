<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $returnType = User::class;
    protected $allowedFields = [
        'name',
        'password',
        'email_address',
        'picture'
    ];
    protected $validationRules = [
        'name'          => 'required',
        'picture'       => 'permit_empty|mime_in[picture,image/png,image/jpg]'
    ];
}
