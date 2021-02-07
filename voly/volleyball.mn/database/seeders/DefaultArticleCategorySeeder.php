<?php

namespace Database\Seeders;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class DefaultArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = "Тоглогчид";
        ArticleCategory::create([
            'category' => $category,
            'slug' => Str::slug($category)
        ])->save();
        $category = "Багууд";
        ArticleCategory::create([
            'category' => $category,
            'slug' => Str::slug($category)
        ])->save();
        $category = "Шинээр";
        ArticleCategory::create([
            'category' => $category,
            'slug' => Str::slug($category)
        ])->save();
        $category = "Тэмцээн";
        ArticleCategory::create([
            'category' => $category,
            'slug' => Str::slug($category)
        ])->save();
        $category = "Тоглолтууд";
        ArticleCategory::create([
            'category' => $category,
            'slug' => Str::slug($category)
        ])->save();
        $category = "Ивээн тэтгэгчид";
        ArticleCategory::create([
            'category' => $category,
            'slug' => Str::slug($category)
        ])->save();
    }
}
