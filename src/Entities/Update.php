<?php namespace Projkin\TeleBot\Entities;

/**
 * Class Update
 *
 * @link https://core.telegram.org/bots/api#update
 *
 * @method int                 getUpdateId()           The update's unique identifier. Update identifiers start from a certain positive number and increase sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order.
 * @method Message             getMessage()            Optional. New incoming message of any kind — text, photo, sticker, etc.
 * @method Message             getEditedMessage()      Optional. New version of a message that is known to the bot and was edited
 * @method Message             getChannelPost()        Optional. New post in the channel, can be any kind — text, photo, sticker, etc.
 * @method Message             getEditedChannelPost()  Optional. New version of a post in the channel that is known to the bot and was edited* @InlineQuery         getInlineQuery()        Optional. New incoming inline querymethod ChosenInlineResult  getChosenInlineResult() Optional. The result of an inline query that was chosen by a user and sent to their chat partner.        getPollAnswer()         Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 */

class Update extends Entity
{


    protected function subEntities()
    {
        return [
            'message' => Message::class,
        ];
    }


}