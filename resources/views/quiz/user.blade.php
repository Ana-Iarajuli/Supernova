@extends("layout")

@section("body")
<style>
    .container {
        overflow: auto;
        margin-top: 10px;
    }
    img {
        float: left;
        margin-right: 10px;
    }
    .quiz-info {
        float: left;
        margin-right: 5px;
    }

    .editBtn, .deleteBtn {
        float: left;
        margin-top: 10px;
    }
</style>
    @forelse ($user_quizzes as $user_quizzes)
        <form action="" method="post">
        @csrf
            <div class="container">
                <img src="{{ $user_quizzes['image_url'] }}" width="200" height="200" alt="picture">
                <div class="quiz-info">
                    <div class="form-floating" id="name">
                        <textarea name="name" id="name" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">{{ $user_quizzes['name'] }}</textarea>
                        <label for="floatingTextarea">Name</label>
                    </div>
                    <div class="form-floating" id="description">
                        <textarea name="description" id="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">{{ $user_quizzes['description'] }}</textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <div class="form-floating" id="image">
                        <textarea name="image_url" id="image_url" class="form-control" placeholder="Insert Image Link Here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Image Link</label>
                    </div>
                </div>
                <div class="editBtn">
                    <button class="btn btn-primary" name="edit" value="{{$user_quizzes['id']}}">
                    Edit
                    </button> 
                </div>
                <div class="deleteBtn">
                    <button class="btn btn-danger" name="delete" value="{{$user_quizzes['id']}}">
                        Delete
                    </button>
                </div>
            </div>
        </form>
        <br>
        <form action="" method="post" id="createQuestionForm">
            @csrf
            <div class="container"> 
                <button id="createQuestionBtn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createQuestionModal">
                    Create Question
                </button>

                <!-- Modal for adding questions -->
                <div class="modal" tabindex="-1" role="dialog" id="createQuestionModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Question</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="questionText">Question Text</label>
                                    <input type="text" class="form-control" id="questionText" name="questionText" required>
                                </div>
                                <div class="form-group">
                                    <label for="questionImage">Question Image Link</label>
                                    <input class="form-control" type="text" id="questionImageLink" name="questionImageLink">
                                </div>
                                <div class="form-group">
                                    <label for="option1">Answer 1</label>
                                    <input type="text" class="form-control" id="answer1" name="answer1" required>
                                </div>
                                <div class="form-group">
                                    <label for="option2">Answer 2</label>
                                    <input type="text" class="form-control" id="answer2" name="answer2" required>
                                </div>
                                <div class="form-group">
                                    <label for="option3">Answer 3</label>
                                    <input type="text" class="form-control" id="answer3" name="answer3" required>
                                </div>
                                <div class="form-group">
                                    <label for="option4">Answer 4</label>
                                    <input type="text" class="form-control" id="answer4" name="answer4" required>
                                </div>
                                <div class="form-group">
                                    <label for="correctAnswer">Position</label>
                                    <input type="number" class="form-control" id="position" name="position" min="1" required>
                                </div>
                                <div class="form-group">
                                    <label for="correctAnswer">Correct Answer</label>
                                    <input type="text" class="form-control" id="correctAnswer" name="correctAnswer" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button form="createQuestionForm" class="btn btn-success" name="createQuestionBtn" id="createQuestionBtn" value="{{$user_quizzes['id']}}">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <div class="container">
        <a id="viewQuizQuestionsBtn" class="btn btn-dark" href="{{ route('question.page', ['quiz' => $user_quizzes['name']]) }}">
            View Quiz Questions
        </a>
    </div>
   
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
                You have no quizzes! Go back to previous page to create one ↪ 
                <a href="{{ route('user.index') }}" class="btn btn-dark">Go Back</a>
            </div>
        </div> 
    @endforelse
@endsection