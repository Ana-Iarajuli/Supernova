<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::create([
            'question' => "Avstralia mtvareze ganieria. Romeli moereve: Avstralia tu mtvare?",
            'image_url' => "https://images.theconversation.com/files/284051/original/file-20190715-173360-1nn1to4.png?ixlib=rb-1.1.0&q=45&auto=format&w=1000&fit=clip",
            'answer_1' => "mtvare",
            'answer_2' => "avstralia",
            'answer_3' => "saqartvelo",
            'answer_4' => "mainc sikete gaimarjvebs",
            'position' => "1",
            'correct_answer' => "saqartvelo",
            'quiz_id' => "1"
        ]);

        Question::create([
            'question' => "Zezva da Mzia 1.5 mln wlis win cxovrobdnen. romeli moereva: Zezva tu Mzia?",
            'image_url' => "https://georgiaabout.files.wordpress.com/2012/07/mzia-and-zezva_the-oldest-europeans.jpg",
            'answer_1' => "Zezva",
            'answer_2' => "Mzia",
            'answer_3' => "Qali",
            'answer_4' => "Odes yofil ars aqamomde,tumca mamata da dedata ertad etchama puri?!",
            'position' => "2",
            'correct_answer' => "Qali",
            'quiz_id' => "1"
        ]);

        Question::create([
            'question' => "author of 'Robinson Crusoe'",
            'image_url' => "https://images-na.ssl-images-amazon.com/images/S/pv-target-images/c3576586ae4670370a7fd23b417cd98352929c3ee0aa565c49198dcda8bf5e33._RI_.png",
            'answer_1' => "Daniel Dafoe",
            'answer_2' => "Nacnobia,magram ar maxsovs",
            'answer_3' => "Ki, aq vcxovrob ra...",
            'answer_4' => "answer 1",
            'position' => "1",
            'correct_answer' => "answer 1",
            'quiz_id' => "3"
        ]);

        Question::create([
            'question' => "Why does the Pillar Man awaken?",
            'image_url' => "https://i.kym-cdn.com/entries/icons/facebook/000/018/559/Awaken_My_Masters_Banner.jpg",
            'answer_1' => "Due to German Expedition",
            'answer_2' => "Intentionally",
            'answer_3' => "A curse brought him back",
            'answer_4' => "Someone charmed his soul",
            'position' => "1",
            'correct_answer' => "Due to German Expedition",
            'quiz_id' => "2"
        ]);

        Question::create([
            'question' => "How many days could Dio survive in Stardust Crusaders?",
            'image_url' => "https://pbs.twimg.com/media/EPJYTRqW4AEpUEN.jpg",
            'answer_1' => "20",
            'answer_2' => "30",
            'answer_3' => "40",
            'answer_4' => "50",
            'position' => "2",
            'correct_answer' => "30",
            'quiz_id' => "2"
        ]);
    }
}
