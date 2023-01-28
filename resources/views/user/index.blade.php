@extends("layout")

@section("body")
    @if(session("message"))
        <div class="alert alert-success">{{session("message")}}</div>
    @endif
    <h2>Email: {{ $user->email }}</h1>
    <h4>Name: {{ $user->name }}</h4>
    <br>
    
    <form action="" method="post" id="createQuizForm">
        @csrf
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createQuizModal">
        Create Quiz
        </button>

        <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="createQuizModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Quiz</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="quizTitle">Quiz Title</label>
                                <input type="text" class="form-control" id="quizTitle" name="quizTitle" required>
                            </div>
                            <div class="form-group">
                                <label for="quizImage">Quiz Image Link</label>
                                <input class="form-control" type="text" id="quizImageLink" name="quizImageLink">
                            </div>
                            <div class="form-group">
                                <label for="quizDescription">Quiz Description</label>
                                <textarea class="form-control" id="quizDescription" name="quizDescription" rows="3" required></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button form="createQuizForm" class="btn btn-success" name="createQuizBtn" value="yba" id="createQuizBtn">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form> 

    <br>
    <a href="{{ route('user.quizzes') }}" class="btn btn-dark">View My Quizzes</a>
@endsection