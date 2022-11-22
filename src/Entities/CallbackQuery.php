<?php namespace Projkin\TeleBot\Entities;

/**
 * Class CallbackQuery.
 *
 * @link https://core.telegram.org/bots/api#callbackquery
 *
 * @method string  getId()              Unique identifier for this query
 * @method User    getFrom()            Sender
 * @method Message getMessage()         Optional. Message with the callback button that originated the query. Note that message content and message date will not be available if the message is too old
 * @method string  getInlineMessageId() Optional. Identifier of the message sent via the bot in inline mode, that originated the query
 * @method string  getChatInstance()    Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in games.
 * @method string  getData()            Data associated with the callback button. Be aware that a bad client can send arbitrary data in this field
 * @method string  getGameShortName()   Optional. Short name of a Game to be returned, serves as the unique identifier for the game
 */

class CallbackQuery extends Entity
{


    protected function subEntities()
    {
        return [
            'from'    => User::class,
            'message' => Message::class,
        ];
    }
}