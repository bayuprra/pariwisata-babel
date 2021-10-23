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
        'name' => 'required',
        'password' => 'required|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/]',
        'email_address' => 'required|valid_email|is_unique[users.email_address,id,{id}]',
        'picture' => 'required|mime_in[picture,image/png,image/jpg]',
    ];
}
