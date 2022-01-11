<?php

declare(strict_types=1);

namespace App\Models;

use App\Entities\Guide;
use CodeIgniter\Model;

class GuideModel extends Model
{
    protected $table = 'guides';
    protected $returnType = Guide::class;
    protected $allowedFields = [
        'name',
        'phone',
        'identity_picture',
        'experience',
        'study',
        'video',
        'gender',
        'religion',
        'address',
        'age',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'user_id',
        'is_approve',
    ];

    protected $validationRules = [
        'name'              => 'required',
        'phone'             => 'required|numeric',
        'identity_picture'  => 'required',
        'experience'        => 'required',
        'study'             => 'required',
        'video'             => 'required',
        'user_id'           => 'required|is_unique[guides.user_id,id,{id}]',
        'gender'            => 'required',
        'religion'          => 'required',
        'address'           => 'required',
        'age'               => 'required',
        'email'             => 'required',
        'facebook'          => 'required',
        'instagram'         => 'required',
        'twitter'           => 'required'
    ];

    public function search($keyword)
    {
        return $this->table('guides')->like('name', $keyword);
    }
}
