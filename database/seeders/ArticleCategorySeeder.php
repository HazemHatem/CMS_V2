<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(100)
            ->hasComments(5)
            ->create();
        Category::factory()->count(9)->create();
        Article::all()->each(function ($article) {
            $article->categories()->sync(Category::all()->random(2)->pluck('id'));
        });
    }
}
