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
        'name',
        'district',
        'sub_district',
        'village',
        'rt/rw',
        'emergency_number',
        'fee',
        'operational_hour',
        'maps',
        'picture',
        'user_id',
        'is_approve'
    ];

    protected $validationRules = [
        'name' => 'required',
        'district' => 'required',
        'sub_district' => 'required',
        'village' => 'required',
        'rt/rw' => 'required',
        'emergency_number' => 'required',
        'fee' => 'required|numeric',
        'operational_hour' => 'required',
        'maps' => 'required|valid_url',
        'picture' => 'required|mime_in[picture,image/png,image/jpg]',
        'user_id' => 'required|is_unique[users.id]',
        'is_approve' => 'required'
    ];
}
