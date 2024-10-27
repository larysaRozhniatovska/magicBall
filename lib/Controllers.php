<?php
class Controllers
{
    private static $instance = 0;
    private function __construct(){
    }
    private function __clone(){
    }
    /**
     * returns the created instance of the class
     * @return MagicBallManager
     */
    public static function getInstance() : Controllers
    {
        if(self::$instance == 0){
            self::$instance = new Controllers();
        }
        return self::$instance;
    }
    public function index()
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
    public function proc()
    {
        $data = [
            'question' => htmlspecialchars(filter_input(INPUT_POST,'question')),
        ];
        if(!empty($data['question'])) {
            $magicBall = MagicBallManager::getInstance();
            $answer = $magicBall->getAnswer($data['question']);
            setAnswer($answer);
        }
        redirect('/index.php');
    }

}