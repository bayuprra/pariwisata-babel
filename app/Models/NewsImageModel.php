<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsImageModel extends Model
{
    protected $table      = 'news_images';
    protected $primaryKey = 'id';

    protected $returnType     = 'App\Entities\NewsImage';

    protected $allowedFields = [
        'news_id',
        'original',
        'large',
        'medium',
        'small'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [];

    protected $validationMessages = [];
    protected $skipValidation     = false;

    const IMAGE_SIZES = [
        'large' => [
            'width' => 1024,
            'height' => 800,
        ],
        'medium' => [
            'width' => 400,
            'height' => 275,
        ],
        'small' => [
            'width' => 200,
            'height' => 175,
        ],
    ];
}
