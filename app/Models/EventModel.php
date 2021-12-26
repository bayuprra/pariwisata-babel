<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Event;
use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $returnType = Event::class;
    protected $allowedFields = [
        'name',
        'district',
        'sub_district',
        'village',
        'date',
        'content',
        'picture'
    ];
    protected $validationRules = [
        'name'          => 'required',
        'district'      => 'required',
        'sub_district'  => 'required',
        'village'       => 'required',
        'date'          => 'required',
        'content'       => 'required',
        'picture'       => 'required',
    ];
}
