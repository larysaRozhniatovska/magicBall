<?php
/**
 * Sets  $answer in the session.
 * @param string $answer
 */
function setAnswer(string $answer): void
{
    session_start();
    $_SESSION['answer'] = $answer;
}
/**
 * Get answer from the session.
 * @return string
 */
function getAnswer(): string
{
    session_start();
    $answer = '';
    if (isset($_SESSION['answer'])) {
        $answer = $_SESSION['answer'];
        unset($_SESSION['answer']);
    }
    return $answer;
}
