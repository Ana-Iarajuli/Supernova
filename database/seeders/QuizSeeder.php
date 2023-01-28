<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quiz::create([
            'name' => "Romeli Moereva",
            'image_url' => "https://cdn-wp.thesportsrush.com/2022/03/9dc72993-john-cena-you-cant-see-me.jpg",
            'description' => "Sustebs Gansacdeli Elit",
            'author' => "gagi",
            'user_id' => "3",
            'status_id' => "0"
        ]);

        Quiz::create([
            'name' => "Jojo’s Bizarre Adventure",
            'image_url' => "https://upload.wikimedia.org/wikipedia/en/a/aa/JoJo_Part_1_Phantom_Blood.jpg",
            'description' => "Check your knowledge in Jojo’s Bizarre Adventure",
            'author' => "ana",
            'user_id' => "2",
            'status_id' => "1"
        ]);

        Quiz::create([
            'name' => "Guess the author",
            'image_url' => "https://image.slidesharecdn.com/quiz-guesstheauthor-160830115424/85/quiz-guess-the-author-1-638.jpg?cb=1668876880",
            'description' => "Take the challenge to guess the famous writers that penned these literary masterpieces",
            'author' => "admin",
            'user_id' => "1",
            'status_id' => "1"
        ]);
    }
}
