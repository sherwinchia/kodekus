<?php

use App\models\Option;
use App\models\Question;
use App\models\Quiz;
use Illuminate\Database\Seeder;

class QuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quiz1 = Quiz::create([
            'name' => 'HTML Dasar',
            'article_id' => 1
        ]);

        $question1 = Question::create([
            'quiz_id' => $quiz1->id,
            'text' => 'Apa itu HTML?',
        ]);

        Option::create([
            'question_id' => $question1->id,
            'point' => 1,
            'text' => 'Hypertext Markup Language'
        ]);
        Option::create([
            'question_id' => $question1->id,
            'point' => 0,
            'text' => 'not dis'
        ]);
        Option::create([
            'question_id' => $question1->id,
            'point' => 0,
            'text' => 'nope'
        ]);
        Option::create([
            'question_id' => $question1->id,
            'point' => 0,
            'text' => 'wrong'
        ]);
    }
}
