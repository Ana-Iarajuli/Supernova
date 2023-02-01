<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function quizList() {
        $user = Auth::user();
        if ($user) {
            if ($user->id == 1) {
                $quizzes = Quiz::select()->orderBy('created_at')->get();
            } 
        }
        $quizzes = Quiz::select()->where("status_id", 1)->orderBy('created_at')->get();
        
        $questionCounts = Question::selectRaw('quiz_id, count(*) as question_count')->groupBy('quiz_id')->get();
        $quizzesWithQuestionCounts = $quizzes->map(function ($quiz) use ($questionCounts) {
            $questionCount = $questionCounts->firstWhere('quiz_id', $quiz->id);
            return [
                'quiz' => $quiz,
                'question_count' => $questionCount ?
            $questionCount->question_count : 0
            ];
        });
        return view('quiz.list', compact('quizzesWithQuestionCounts'));
    }

    public function quizPublish(Request $request) {
        if ($request->input("publish") != "") {
            $quiz_id = $request->input("publish");
            Quiz::where("id", $quiz_id)->update(["status_id" => 1]);
        }
        if ($request->input("delete") != "") {
            $quiz_id = $request->input("delete");
            Quiz::where("id", $quiz_id)->delete();
        }
        return $this->quizList();
    }

    public function quizPage($name) {
        $quiz = Quiz::where('name', '=', $name)->get()[0];
        $questionCount = Question::where('quiz_id', '=', $quiz->id)->count();
        return view('quiz.page', compact('quiz', 'questionCount'));
    }
    
    public function addQuiz(Request $request) {
        $user = Auth::user();
        // create new quiz
        $name = $request->input("quizTitle");
        $image_url = $request->input("quizImageLink");
        $description = $request->input("quizDescription");
        if ($request->input("createQuizBtn") != "") {
            $quiz = Quiz::create([
                "name" => $name,
                "image_url" => $image_url,
                "description" => $description,
                "author" => $user->name,
                "user_id" => $user->id,
                "status_id" => 0
            ]);
            $quiz->save();
            return redirect(route("user.index"))->with("message", "Quiz Created Successfully!");
        }
    }

    public function quizPlay($name, Request $request)
    {
        $quiz = Quiz::where('name', '=', $name)->first();
        $question_count = Question::where('quiz_id', '=', $quiz->id)->count();
        $correctAnswer = false;
        $question = Question::where([["position", $request->input("position")],['quiz_id', $quiz->id]])->first();

        $old_question = Question::where([["position", $request->input("position")-1],['quiz_id', $quiz->id]])->first();
    
        if(isset($old_question)&&$old_question->correct_answer == $request->input("answer")) {
            $correctAnswer = true;
        }
        if(isset($question)){
            return response()->json([
                "question" => $question->question,
                "answer1" => $question->answer_1,
                "answer2" => $question->answer_2,
                "answer3" => $question->answer_3,
                "answer4" => $question->answer_4,
                "imageUrl" => $question->image_url,
                "correctAnswer" => $correctAnswer,
                "questionCount" => $question_count
            ]);
        }
        return response()->json([
            "correctAnswer" => $correctAnswer,
            "questionCount" => $question_count
        ]);

    }
}
