<?php namespace Projkin\TeleBot\Entities\Keyboard;


use Projkin\TeleBot\Entities\Entity;


/**
 * Class KeyboardButton
 *
 * This object represents one button of the reply keyboard. For simple text buttons String can be used instead of this object to specify text of the button. Optional fields request_contact, request_location, and request_poll are mutually exclusive.
 *
 * @link https://core.telegram.org/bots/api#keyboardbutton
 *
 * @property bool                   $request_contact
 * @property bool                   $request_location
 * @property //KeyboardButtonPollType $request_poll
 *
 * @method string                 getText()            Text of the button. If none of the optional fields are used, it will be sent to the bot as a message when the button is pressed
 * @method bool                   getRequestContact()  Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
 * @method bool                   getRequestLocation() Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only
// * @method KeyboardButtonPollType getRequestPoll() Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only
 *
 * @method $this setText(string $text)                                Text of the button. If none of the optional fields are used, it will be sent to the bot as a message when the button is pressed
 * @method $this setRequestContact(bool $request_contact)             Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only
 * @method $this setRequestLocation(bool $request_location)           Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only
// * @method $this setRequestPoll(KeyboardButtonPollType $request_poll) Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only
 */

class KeyboardButton extends Entity
{


    public function __construct($data)
    {
        if (!is_array($data)) {
            $data = ['text' => (string) $data];
        }
        parent::__construct($data);
    }
}