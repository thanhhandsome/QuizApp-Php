<?php
    header('Access-Control-Allow-Origin:');
    header('Content-Type: application/json');
    include_once('../../config/db.php');
    include_once('../../model/question.php');

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);
    $question->id = isset($_GET['id']) ? $_GET['id'] : die();
    $question->show();

    $question_item = array(
        'id' => $question->id,
        'title' => $question->title,
        'question_a' => $question->question_a,
        'question_b' => $question->question_b,
        'question_c' => $question->question_c,
        'question_d' => $question->question_d,
        'correct' => $question->correct
    );
    print_r(json_encode($question_item));
?>