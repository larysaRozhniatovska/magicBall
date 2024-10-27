<?php
class MagicBallManager
{
    private static $instance = 0;
     const ANSWERS = [
        "It is decidedly so.",
        "Don't count on it.",
        "Without a doubt.",
        "My reply is no.",
        "Yes definitely.",
        "My sources say no.",
        "You may rely on it.",
        "Outlook not so good.",
        "It is certain.",
        "Very doubtful.",
    ];
    private function __construct(){
    }
    private function __clone(){
    }
    /**
     * returns the created instance of the class
     * @return MagicBallManager
     */
    public static function getInstance() : MagicBallManager
    {
        if(self::$instance == 0){
            self::$instance = new MagicBallManager();
        }
        return self::$instance;
    }
    public function getAnswer( string $question ): string
    {
        return self::ANSWERS[rand(0, count(self::ANSWERS) - 1)];
    }

}