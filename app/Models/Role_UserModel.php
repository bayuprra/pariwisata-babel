<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Place;
use CodeIgniter\Model;

class PlaceModel extends Model
{
    protected $table = 'places';
    protected $returnType = Place::class;

    protected $allowedFields = [
        'user_id',
        'role_id',
    ];

    protected $validationRules = [
        'user_id' => 'required|is_unique[users.id]',
        'role_id' => 'required|is_unique[roles.id]',
    ];
}
