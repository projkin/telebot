<?php namespace Projkin\TeleBot\Entities;


class Chat extends Entity
{

    protected function subEntities()
    {
        return [
            'photo' => Photo::class,
        ];
    }

}