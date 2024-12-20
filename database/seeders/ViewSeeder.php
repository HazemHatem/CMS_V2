<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\View;
use App\Models\User;
use App\Models\Article;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $articles = Article::all();
        foreach ($users as $user) {
            foreach ($articles as $article) {
                View::create([
                    'user_id' => $user->id,
                    'article_id' => $article->id,
                ]);
            }
        }
    }
}
