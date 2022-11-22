<?php namespace Projkin\Test;


class File extends Entity
{



    public function __construct($data) {
        parent::__construct($data);

        //$this->date = ($this->date !== '') ?? date('d.m.Y', $data['date']);
    }


}