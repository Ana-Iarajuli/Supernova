@extends("layout")

@section("body")
    <style>
      .container {
        display: flex;
        align-items: center;
        min-width:2.2cm;
        height:3.8cm;
        vertical-align: middle;
        justify-content: center
      }
      .image {
        flex-basis: 40%
      }
      .name, .author, .quiz-info {
        font-size: 20px;
        padding-left: 20px;
      }
      #publishBtn, #deleteBtn {
        margin-top: 10px;
      }
    </style>
    @forelse($quizzesWithQuestionCounts as $quizWithQuestionCount)
        <div class="container" style="display:inline-block;  ">
            <div class="image" style="display:inline-block;vertical-align: middle;">
                <img src="{{ $quizWithQuestionCount['quiz']->image_url }}" width="200" height="200">
                <h6>Name: {{ $quizWithQuestionCount['quiz']->name }}</h6>
                <h6>Author: {{ $quizWithQuestionCount['quiz']->author }}</h6>
                <h6>Number of questions: {{$quizWithQuestionCount['question_count']}}</h6>
            </div>
            <div class="quiz-info">
                <a href="{{ route('quiz.page', ['name' => $quizWithQuestionCount['quiz']['name']]) }}" class="btn btn-primary" name="view-quiz">
                    View Quiz
                </a>
                @if (Auth::user()->id == 1)
                    <form action="" method="post">
                        @csrf
                        <button id="publishBtn" class="btn btn-dark" name="publish" value="{{$quizWithQuestionCount['quiz']['id']}}">
                            Publish
                        </button>
                        <button id="deleteBtn" class="btn btn-danger" name="delete" value="{{$quizWithQuestionCount['quiz']['id']}}">
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @empty
        "no quizzes"
    @endforelse
@endsection