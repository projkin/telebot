<?php namespace Projkin\Test;


class Message extends Entity
{


    protected $sub_entities = [
        'from' => User::class,
        'file' => File::class,
        //'chat' => Chat::class,
    ];


    public function __construct($data) {

        parent::__construct($data);
    }


}