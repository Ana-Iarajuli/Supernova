@extends("layout")

@section("body")
    <div>
        <img src="{{ $quiz->image_url }}" width="200" height="200">
        <h1>Name: {{ $quiz->name }}</h1>
        <p>Description: {{ $quiz->description }}</p>
        <p>Author: {{ $quiz->author }}</p>
        <p>Number of Questions: {{$questionCount}}</p>
        
        <input type="hidden" id="quiz" value="{{json_encode($quiz)}}">
        <div id="questions">
            <button class="btn btn-primary" id="startBtn" onclick="getQuestion(this)">Start The Quiz!</button>
        </div>
    </div>

    <script>
        const quizObject = JSON.parse($("#quiz").val());
        let position = 1;
        let answer;
        let correctAnswers = 0;
        let questionCount;
        let questionNum = 0;
        function getQuestion(element){
            answer = $(element).text();
            fetch(`http://localhost:8000/api/quiz/play/${quizObject.name}`, {
                method: "POST",
                headers: {
                'Content-Type': 'application/json'},
                body: JSON.stringify({
                    position: position,
                    answer: answer
                })
            }).then(response => {
                    return response.json();
                }).then(data => {
                    questionCount = data.questionCount;
                    questionNum++;
                    if(data.correctAnswer) {
                        correctAnswers++;
                    }
                    if(position - 1 == questionCount) {
                        $("#questions").html(`Correct: (${correctAnswers}/${questionCount})`);
                    } else {
                        let question = `<h1>${data.question}</h1>
                        <img src="${data.imageUrl}" width='200' height='200'>
                        <button onclick="getQuestion(this)">${data.answer1}</button>
                        <button onclick="getQuestion(this)">${data.answer2}</button>
                        <button onclick="getQuestion(this)">${data.answer3}</button>
                        <button onclick="getQuestion(this)">${data.answer4}</button>
                    `
                        $("#questions").html(`(${position}/${questionCount})`);
                        $("#questions").append(question);
                        position++;
                    }
                })
        }

    </script>
@endsection