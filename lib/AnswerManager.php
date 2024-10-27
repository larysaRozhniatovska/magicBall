<?php

class AnswerManager
{
    private function __construct(){
    }
    private function __clone(){
    }
    /**
     * returns the created instance of the class
     * @return AnswerManager
     */
    public static function getInstance() : AnswerManager
    {
        if(self::$instance == 0){
            self::$instance = new AnswerManager();
        }
        return self::$instance;
    }
    private static $instance = 0;
    /**
     * Sets  $answer in the session.
     * @param string $answer
     */
    public function setAnswer(string $answer): void
    {
        session_start();
        $_SESSION['answer'] = $answer;
    }
    /**
     * Get answer from the session.
     * @return string
     */
    public function getAnswer(): string
    {
        session_start();
        $answer = '';
        if (isset($_SESSION['answer'])) {
            $answer = $_SESSION['answer'];
            unset($_SESSION['answer']);
        }
        return $answer;
    }

}