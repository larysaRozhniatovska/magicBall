<?php

class ResponsesManager
{
    private static $instance = 0;
    private function __construct(){
    }
    private function __clone(){
    }
    /**
     * returns the created instance of the class
     * @return ResponsesManager
     */
    public static function getInstance() : ResponsesManager
    {
        if(self::$instance == 0){
            self::$instance = new ResponsesManager();
        }
        return self::$instance;
    }

    /**
     * Show front
     * @param string $partTemplate
     * @param array $data
     * @param string $template
     */
    function render(string $partTemplate,array $data = [], string $template = VIEWS_TEMPLATE): void
    {
        extract($data);
        include_once VIEWS_DIR . $template . '.php';
    }

    /**
     * Redirect to specify url
     * @param string $url
     */
    function redirect(string $url) : never
    {
        header('Location: ' . $url);
        exit();
    }
}