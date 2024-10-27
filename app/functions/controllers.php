<?php

function index()
{
    $answer = getAnswer();
    render('index', [
        'answer' => $answer,
    ]);
}

/**
 * data reading, validation and saving
 * Redirect to /index.php
 * @return void
 */
function proc()
{
    $data = [
        'question' => htmlspecialchars(filter_input(INPUT_POST,'question')),
     ];
    if(!empty($data['question'])) {
        $magicBall = new MagicBallManager();

        $answer = $magicBall->getAnswer($data['question']);
        setAnswer($answer);
    }
    redirect('/index.php');
}