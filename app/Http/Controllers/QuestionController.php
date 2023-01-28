<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;

class QuestionController extends Controller
{
    public function showQuiz() {
        $user = Auth::user();
        $user_id = User::find($user->id);
        $user_quizzes = $user_id->quizzes;
        return view("quiz.user", compact("user_quizzes"));
    }

    public function QuizQuestionCRUD(Request $request) {
        $user = Auth::user();
        $input_fields = [
            'name',
            'image_url',
            'description',
        ];
    
        $id = $request->input("createQuestionBtn");
        $question = $request->input("questionText");
        $image_url = $request->input("questionImageLink");
        $answer1 = $request->input("answer1");
        $answer2 = $request->input("answer2");
        $answer3 = $request->input("answer3");
        $answer4 = $request->input("answer4");
        $correct_answer = $request->input("correctAnswer");
        $position = $request->input("position");

        if ($request->input("delete") != "") {
            $quiz_id = $request->input("delete");
            Quiz::where("id", $quiz_id)->delete();
            Question::where("quiz_id", $quiz_id)->delete();
        }
        if ($request->input("edit") != "") {
            $quiz_id = $request->input("edit");
            foreach ($input_fields as $field) {
                if ($request->input($field) != "") {
                    $input = $request->input($field);
                    Quiz::where('id', $quiz_id)->update([$field => $input, "author" => $user->name, "user_id" => $user->id]);
                }
            }
        }

        if ($request->input("createQuestionBtn") != "") {
            $question = Question::create([
                'question' => $question,
                'image_url' => $image_url,
                'answer_1' => $answer1,
                'answer_2' => $answer2,
                'answer_3' => $answer3,
                'answer_4' => $answer4,
                'position' => $position,
                'correct_answer' => $correct_answer,
                'quiz_id' => $id
            ]);
            $question->save();
        }
        return $this->showQuiz();
    }
    
    public function showQuestions($quiz) {
        $quiz = Quiz::where('name', '=', $quiz)->get()[0];
        $quiz = Quiz::find($quiz->id);
        $quiz_questions = $quiz->questions;
        $quizzes = Quiz::all();
        return view("quiz.questions", compact("quiz_questions", "quizzes", "quiz"));
    }

    public function questionUD($quiz, Request $request) {
        $input_fields = [
            'question',
            'image_url',
            'answer_1',
            'answer_2',
            'answer_3',
            'answer_4',
            'position',
            'correct_answer',
            'quiz_id'
        ];

        $parent_quiz_id = $request->parentQuizId;
        $question_id = $request->questionId;
        Question::where("id", $question_id)->update(["quiz_id" => "$parent_quiz_id"]);

        if ($request->input("delete") != "") {
            $question_id = $request->input("delete");
            Question::where("id", $question_id)->delete();
        }
        
        if ($request->input("edit") != "") {
            $question_id = $request->input("edit");
            foreach ($input_fields as $field) {
                if ($request->input($field) != "") {
                    $input = $request->input($field);
                    Question::where('id', $question_id)->update([$field => $input]);
                }
            }
        }
        return $this->showQuestions($quiz);
    }


}
