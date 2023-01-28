@extends("layout")

@section("body")
    <form action="" method="post">
        @csrf
        <div>
            @forelse($quiz_questions as $question)
                <table>
                    <tr>
                        <td><img src="{{ $question->image_url }}" width="200" height="200"></td>
                        <td>Name:<textarea name="question" id="question" cols="6" rows="3">{{$question->question}}</textarea></td>
                        <td>Answer 1:<textarea name="answer_1" id="answer_1" cols="6" rows="3">{{$question->answer_1}}</textarea></td>
                        <td>Answer 2:<textarea name="answer_2" id="answer_2" cols="6" rows="3">{{$question->answer_2}}</textarea></td>
                        <td>Answer 3:<textarea name="answer_3" id="answer_3" cols="6" rows="3">{{$question->answer_3}}</textarea></td>
                        <td>Answer 4:<textarea name="answer_4" id="answer_4" cols="6" rows="3">{{$question->answer_4}}</textarea></td>
                        <td>Correct Answer:<textarea name="correct_answer" id="correct_answer" cols="6" rows="3">{{$question->correct_answer}}</textarea></td>
                        <td>Position: <input type="number" min="1" name="position" id="position" size="1" value="{{ $question->position }}"></td>
                        <td>
                            <button class="btn btn-primary" name="edit" value="{{$question['id']}}">
                                Edit
                            </button> 
                            <button class="btn btn-danger" name="delete" value="{{$question['id']}}">
                                Delete
                            </button>
                        </td> 
                    </tr>
                </table>
                <input type="text" name="image_url" id="image_url" placeholder="Enter new image link">
                <br>
                <br>
            @empty
                <br>
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                </svg>
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <div>
                        This quiz has no questions! Go back to previous page to create one ↪ 
                        <a href="{{ route('user.quizzes') }}" class="btn btn-dark">Go Back</a>
                    </div>
                </div> 
            @endforelse
        </div>
    </form>
@endsection