<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        PostCategory::insert([
            'title' => 'Новини',
            'slug' => 'news',
        ]);
        PostCategory::insert([
            'title' => 'Блоґ',
            'slug' => 'blog',
        ]);
        PostCategory::insert([
            'title' => 'Програми',
            'slug' => 'programs',
        ]);
        PostCategory::insert([
            'title' => 'Сеанси',
            'slug' => 'sessions',
        ]);
        PostCategory::insert([
            'title' => 'Проєкти',
            'slug' => 'projects',
        ]);
    }

}
