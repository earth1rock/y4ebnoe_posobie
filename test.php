<?php
//Добавляем файл подключения к БД
require_once("dbconnect.php");

    //Подключение шапки
require_once("header.php");
?>
<div class="content">
    <div class="d-flex justify-content-center">
			<h1>Тестирование</h1>
			<br>
    </div>
    <div class="aut">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-3">
            <div class="list_tests" >
                <h3>Список тестов</h3>
            </div>
            <ul class="list-group">

        <?php
          $result_query_select = $mysqli->query("SELECT id_test,name FROM `tests`");

                    if($result_query_select)
                    {
                        while ($row = $result_query_select->fetch_array())
                        {
                            $name = $row['name'];
                            $id_test = $row['id_test'];

                            echo '<li class="list-group-item"><a href="/test.php?id_test='.$id_test.'">'.$name.'</a></li>';
                        }
                    }
          ?>

              </ul>
        </div>
    <div class="col-lg-5">
        <script type="text/javascript">


        // Заголовок страницы (h1)

        // Вопросы
        var questions=[


        <?php

        if (is_null($_GET['id_test'])) {$_GET['id_test']=1;}

        // выборка для заголовка вопросов
        $result_query_select = $mysqli->query("SELECT text,id_question FROM `questions` where id_test=".$_GET['id_test']."");

                    if($result_query_select)
                    {
                        while ($row = $result_query_select->fetch_array())
                        {

                          $txt = $row['text'];
                          $id_question = $row['id_question'];

                          //выборка для всех ответов для конкретного вопроса
                          $result_query_select2 = $mysqli->query("SELECT text FROM `answers` WHERE id_question=".$id_question."");

                             if($result_query_select2)
                              {
                                  while ($row2 = $result_query_select2->fetch_array())
                                    {
                                      $answer_string = $answer_string.'"'.$row2['text'].'",';
                                    }
                              }

                          $answer_string = substr($answer_string,0,-1);
                           echo '{text: "'.$txt.'", answers: ['.$answer_string.'], correctAnswer: 0// нумерация правильных ответов с нуля!
                          },';
                          //очищение буфера строки
                          unset($answer_string);
                        }
                    }
                    //заголовок h1
          $result_query_select = $mysqli->query("SELECT name FROM `tests` where id_test=".$_GET['id_test']."");

                    if($result_query_select)
                    {
                        while ($row = $result_query_select->fetch_array())
                        {
                            $head = $row['name'];
                        }
                    }


         ?>
        ];

        var title = "<?php echo $head;?>";
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
        label {}
        label.radiobt {text-align: left; border: 1px solid silver;}
        .back {background-color: white;}
        </style>
        <div class="back">
        <h2 class="title_test"><script>document.write(title)</script></h2>
        <form name="quiz">
        <ol>
        <script>
        for(var q=0; q<questions.length; ++q) {
           var question = questions[q];
           var idx = 1 + q;

           document.writeln('<li><span class="quest">' + question.text + '</span><br/>');
           for(var i in question.answers) {
            document.writeln('<label class="btn btn-light radiobt col-lg-11"><input type=radio name="option' + idx + '" value="' + i +
            '" onClick="Engine(' + q + ', this.value)">' + question.answers[i] + '</label><br/>');
        }
        }
        </script>
        </ol>
        <input type="button" class="btn btn-primary butcheck" onClick="Score()" value="Получить результат" />
        </form>
    </div>
        </div>
    </div>
    </div>
</div>
</div>
<?php
    //Подключение подвала2
require_once("footer.php");
?>