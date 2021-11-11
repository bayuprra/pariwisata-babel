<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run()
    {
        // $faker = \Faker\Factory::create();
        $b = 3;
        for ($a = 0; $a > $b; $a++) {
            // $data = [
            //     'title'     => $faker->name(),
            //     'category'  => $faker->cityPrefix(),
            //     'picture'   => $faker->image(),
            //     'content'   => $faker->text(),
            //     'preview'   => $faker->paragraph(),
            // ];
            // $data = [
            //     [
            //         'title'     => $a,
            //         'category'  => 'pantddddai',
            //         'picture'   => 'cancel.jpg',
            //         'content'   => 'lorem',
            //         'preview'   => 'loremmm',
            //     ]
            // ];
            // $this->db->table('news')->insert($data);

            $data = model('NewsModel');

            $data->insert([
                'title'     => static::faker()->name(),
                'category'  => static::faker()->cityPrefix(),
                'picture'   => static::faker()->image(),
                'content'   => static::faker()->text(),
                'preview'   => static::faker()->paragraph()
            ]);
        }
    }
}
