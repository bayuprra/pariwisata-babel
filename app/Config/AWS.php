<?php

declare(strict_types=1);

namespace App\Config;


use CodeIgniter\Config\BaseConfig;

class AWS extends BaseConfig
{
    public $region = 'ap-southeast-1';

    public $accessKey = '';
    public $secretKey = '';

    public $inputS3bucket = '';
    public $outputS3bucket = '';
}