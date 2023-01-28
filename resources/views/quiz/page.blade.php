@extends("layout")

@section("body")
    <div>
        <div id="question">
        </div>
        <img src="{{ $quiz->image_url }}" width="200" height="200">
        <h1>Name: {{ $quiz->name }}</h1>
        <p>Description: {{ $quiz->description }}</p>
        <p>Author: {{ $quiz->author }}</p>
        <p>Number of Questions: {{$questionCount}}</p>
        <a href="#"><button class="btn btn-primary" id="startBtn">Start The Quiz!</button></a>
    </div>
@endsection