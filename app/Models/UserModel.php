<?php

namespace App\Models;

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
        'name' => 'required',
        'password' => 'required',
        'email_address' => 'required',
        'picture' => 'required',
    ];
}
