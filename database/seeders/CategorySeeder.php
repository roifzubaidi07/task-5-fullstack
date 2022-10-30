<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Wisata Alam',
        ]);
        Category::create([
            'name' => 'Teknologi',
        ]);
        Category::create([
            'name' => 'Hiburan',
        ]);
        Category::create([
            'name' => 'Kuliner',
        ]);
        Category::create([
            'name' => 'Horror',
        ]);
    }
}
