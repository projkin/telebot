<?php namespace Projkin\TeleBot\Core;

class Telegram
{
    
    public $db;         

    public function __construct(DataBase $db)
    {
        $this->db = $db;
    }


    public function getCore()
    {
        return 'GET Core';
    }


    public function getCoreDB()
    {
        return $this->db;
    }



}
