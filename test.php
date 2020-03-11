<?php
    //Подключение шапки
require_once("header.php");
?>
<div class="content">
    <div class="d-flex justify-content-center">
			<h1>Тестирование</h1>
			<br>
	</div>
    <div class="aut">
        <div class="col-lg-6">
            <div class="list_tests" >
                <h3>Список тестов</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item"><a href="#">Тест №1</a></li>
                <li class="list-group-item"><a href="#">Тест №2</a></li>
                <li class="list-group-item"><a href="#">Тест №3</a></li>
                <li class="list-group-item"><a href="#">Тест №4</a></li>
                <li class="list-group-item"><a href="#">Тест №5</a></li><br>
              </ul>
        </div>
        </div>
    <div class="col-lg-6">
        <script type="text/javascript">
        // Заголовок страницы (h1)
        var title = 'Пример теста';
        // Вопросы
        var questions=[
        {
            text: "Вопрос №1:",
            answers: ["Правильный ответ",
                  "Неправильный ответ",
                  "Неправильный ответ"],
            correctAnswer: 0 // нумерация правильных ответов с нуля!
        },
        {
            text: "Вопрос №2:",
            answers: ["Неправильный ответ",
                  "Правильный ответ",
                  "Неправильный ответ"],
            correctAnswer: 1
        },
        {
            text: "Вопрос №3:",
            answers: ["Неправильный ответ",
                  "Неправильный ответ",
                  "Правильный ответ"],
            correctAnswer: 2
        }
        ];
        
        var yourAns = new Array;
        var score = 0;
        
        function Engine(question, answer) {yourAns[question]=answer;}
        
        function Score(){
           var answerText = "Результаты:\n";
           for(var i = 0; i < yourAns.length; ++i){
            var num = i+1;
            answerText=answerText+"\n    Вопрос №"+ num +"";
            if(yourAns[i]!=questions[i].correctAnswer){
                answerText=answerText+"\n    Правильный ответ: " +
                questions[i].answers[questions[i].correctAnswer] + "\n";
              }
                else{
                answerText=answerText+": Верно! \n";
                ++score;
                }
               }
        
           answerText=answerText+"\nВсего правильных ответов: "+score+"\n";
        
           alert(answerText);
           yourAns = [];
           score = 0;
           clearForm("quiz");
        }
        function clearForm(name) {
           var f = document.forms[name];
           for(var i = 0; i < f.elements.length; ++i) {
            if(f.elements[i].checked)
                f.elements[i].checked = false;
        }
        }
        </script>
        
        <style>
        span.quest {font-weight: bold;}
        h2.title_test {background-color: blue; color: white; text-align: center; border-radius: 5px 5px 0 0;}
        label.radiobt {min-width: 600px; max-width: 600px; text-align: left;}
        </style>
        
        <h2 class="title_test"><script>document.write(title)</script></h2>
        <form name="quiz">
        <ol>
        <script>
        for(var q=0; q<questions.length; ++q) {
           var question = questions[q];
           var idx = 1 + q;
        
           document.writeln('<li><span class="quest">' + question.text + '</span><br/>');
           for(var i in question.answers) {
            document.writeln('<label class="btn btn-light radiobt"><input type=radio name="option' + idx + '" value="' + i +
            '" onClick="Engine(' + q + ', this.value)">' + question.answers[i] + '</label><br/>');
        }
        }
        </script>
        </ol>
        <input type="button" class="btn btn-primary butcheck" onClick="Score()" value="Получить результат" />
        </form>
    </div>
</div>
<?php
    //Подключение подвала
require_once("footer.php");
?>