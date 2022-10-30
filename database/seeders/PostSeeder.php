<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Post::create([
            'title' => 'Post 1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo, neque vel rhoncus sodales, tellus purus vulputate elit, eu tincidunt nisi risus eu nibh. Quisque eu mollis elit, sit amet dapibus justo. Donec mi justo, commodo in sem eu, consequat cursus arcu. Integer vehicula est est, ut porttitor lorem ultrices sed. ',
            'image' => 'image/default.jpg',
            'user_id' => 1,
            'category_id' => 1
        ]);
        \App\Models\Post::create([
            'title' => 'Post 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo, neque vel rhoncus sodales, tellus purus vulputate elit, eu tincidunt nisi risus eu nibh. Quisque eu mollis elit, sit amet dapibus justo. Donec mi justo, commodo in sem eu, consequat cursus arcu. Integer vehicula est est, ut porttitor lorem ultrices sed. ',
            'image' => 'image/default.jpg',
            'user_id' => 2,
            'category_id' => 1
        ]);
        \App\Models\Post::create([
            'title' => 'Post 3',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo, neque vel rhoncus sodales, tellus purus vulputate elit, eu tincidunt nisi risus eu nibh. Quisque eu mollis elit, sit amet dapibus justo. Donec mi justo, commodo in sem eu, consequat cursus arcu. Integer vehicula est est, ut porttitor lorem ultrices sed. ',
            'image' => 'image/default.jpg',
            'user_id' => 3,
            'category_id' => 5
        ]);
        \App\Models\Post::create([
            'title' => 'Post 4',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo, neque vel rhoncus sodales, tellus purus vulputate elit, eu tincidunt nisi risus eu nibh. Quisque eu mollis elit, sit amet dapibus justo. Donec mi justo, commodo in sem eu, consequat cursus arcu. Integer vehicula est est, ut porttitor lorem ultrices sed. ',
            'image' => 'image/default.jpg',
            'user_id' => 4,
            'category_id' => 4
        ]);
        \App\Models\Post::create([
            'title' => 'Post 5',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam commodo, neque vel rhoncus sodales, tellus purus vulputate elit, eu tincidunt nisi risus eu nibh. Quisque eu mollis elit, sit amet dapibus justo. Donec mi justo, commodo in sem eu, consequat cursus arcu. Integer vehicula est est, ut porttitor lorem ultrices sed. ',
            'image' => 'image/default.jpg',
            'user_id' => 5,
            'category_id' => 5
        ]);
    }
}
