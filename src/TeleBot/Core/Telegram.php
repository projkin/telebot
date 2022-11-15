<?php namespace Projkin\TeleBot\Core;

use DataBase;

class Core
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
