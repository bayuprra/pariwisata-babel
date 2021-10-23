<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $returnType = News::class;
    protected $allowedFields = [
        'title',
        'category',
        'picture',
        'content',
        'preview'
    ];
    protected $validationRules = [
        'title' => 'required',
        'category' => 'required',
        'picture' => 'required|mime_in[picture,image/png,image/jpg]',
        'content' => 'required',
        'preview' => 'required',
    ];
}
