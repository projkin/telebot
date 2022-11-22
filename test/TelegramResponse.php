<?php namespace Projkin\Test;



class TelegramResponse extends Entity {


    //public $rawdata;
    public $result;

    public function __construct(array $data) {

        parent::__construct($data);
        //$this->rawdata = $data;

//        $types = [
//            'message' => Message::class,
//            'file' => File::class,
//        ];

//        foreach ($data as $key => $value) {
//            $object_class = array_key_exists($key, $types) ? $types[$key] : Message::class;
//            $this->result[] = new $object_class($value);
//        }

        //Test::dd($this->result[1]->from);
    }













}