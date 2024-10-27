<?php
class MagicBallManager
{
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
    public function __construct(){

    }
    public function getAnswer( string $question ): string
    {
        return self::ANSWERS[rand(0, count(self::ANSWERS) - 1)];
    }

}