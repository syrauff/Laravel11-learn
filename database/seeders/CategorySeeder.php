<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
            'description' => 'deskripsi dari postingan'
        ]);


        Category::create([
            'name' => 'UI/UX Design',
            'slug' => 'ui-ux-design',
            'description' => 'deskripsi dari postingan'
        ]);


        Category::create([
            'name' => 'Personal Development',
            'slug' => 'personal-development',
            'description' => 'deskripsi dari postingan'
        ]);
    }

}
