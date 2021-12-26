<?php

namespace App\Models;

use App\Entities\News;
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $returnType = News::class;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'category',
        'content'
    ];
    protected $validationRules = [
        'title'         => 'required',
        'category'      => 'required',
        'content'       => 'required'
    ];
}
