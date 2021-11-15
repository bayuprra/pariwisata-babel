<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();
        $b = 3;
        for ($a = 0; $a < $b; $a++) {
            $data = [
                'title'     => static::faker()->name,
                'category'  => static::faker()->cityPrefix(),
                'picture'   => static::faker()->image,
                'content'   => static::faker()->text,
                'preview'   => static::faker()->paragraph
            ];

            $result = $this->db->table('news')->insert($data);

            dump($result);
        }
    }
}
