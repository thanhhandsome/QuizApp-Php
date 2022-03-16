<?php
    header('Access-Control-Allow-Origin:');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

    include_once('../../config/db.php');
    include_once('../../model/question.php');

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);
    
    $data = json_decode(file_get_contents("php://input"));
    $question->title = $data->title;
    $question->question_a = $data->question_a;
    $question->question_b = $data->question_b;
    $question->question_c = $data->question_c;
    $question->question_d = $data->question_d;
    $question->correct = $data->correct;

    if($question->create()){
        echo json_encode(array('message', 'Question Created'));
    }else {
        echo json_encode(array('message', 'Question Not Created'));
    }
?>