<?php namespace Projkin\TeleBot\Core;

class Telegram
{
             
    public function getCore()
    {
        return 'GET Core';
    }


    public function getDataBase()
    {
        $database = new DataBase();
        return $database->getDB();
    }


}
