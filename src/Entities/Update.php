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
 * @method Message             getEditedChannelPost()  Optional. New version of a post in the channel that is known to the bot and was edited
// * @method InlineQuery         getInlineQuery()        Optional. New incoming inline query
// * @method ChosenInlineResult  getChosenInlineResult() Optional. The result of an inline query that was chosen by a user and sent to their chat partner.
 * @method CallbackQuery       getCallbackQuery()      Optional. New incoming callback query
// * @method ShippingQuery       getShippingQuery()      Optional. New incoming shipping query. Only for invoices with flexible price
// * @method PreCheckoutQuery    getPreCheckoutQuery()   Optional. New incoming pre-checkout query. Contains full information about checkout
// * @method Poll                getPoll()               Optional. New poll state. Bots receive only updates about polls, which are sent or stopped by the bot
// * @method PollAnswer          getPollAnswer()         Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
 */

class Update extends Entity
{


    protected function subEntities()
    {
        return [
            'message' => Message::class,
            'callback_query' => CallbackQuery::class,
        ];
    }



    /**
     * Get the update type based on the set properties
     *
     * @return string|null
     */
    public function type()
    {
        $types = array_keys($this->subEntities());
        foreach ($types as $type) {
            if ($this->getProperty($type)) {
                return $type;
            }
        }

        return null;
    }


    /**
     * Get update content
     *
     * @return CallbackQuery|Message
     */
    public function content()
    {
        if ($this->type()) {
            // Getting the property as an array,
            $method = 'get' . str_replace('_', '', ucwords($this->type(), '_'));
            return $this->$method();
        }

        return null;
    }


}