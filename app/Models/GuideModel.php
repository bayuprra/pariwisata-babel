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
        'bio',
        'experience',
        'study',
        'video',
        'user_id',
        'is_approve'
    ];

    protected $validationRules = [
        'name' => 'required',
        'phone' => 'required|numeric',
        'identity_picture' => 'required',
        'bio' => 'required',
        'experience' => 'required',
        'study' => 'required',
        'video' => 'required|mime_in[video,video/mk4,video/3gp,video/mp4]',
        'user_id' => 'required|is_unique[users.id]',
        'is_approve' => 'required'
    ];
}
