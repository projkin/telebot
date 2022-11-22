<?php namespace Projkin\TeleBot\Entities;

/**
 * Class Message
 *
 * @link https://core.telegram.org/bots/api#message
 *
 * @method int               getMessageId()             Unique message identifier
 * @method string            getText()                  Message text
 * @method User              getFrom()                  Optional. Sender, can be empty for messages sent to channels
 * @method int               getDate()                  Date the message was sent in Unix time
 * @method Chat              getChat()                  Conversation the message belongs to
 * @method Sticker           getSticker()               Optional. Message is a sticker, information about the sticker
 * @method string            getCaption()               Optional. Caption for the document, photo or video, 0-200 characters
 * @method User[]            getNewChatMembers()        Optional. A new member(s) was added to the group, information about them (one of this members may be the bot itself)
 * @method User              getLeftChatMember()        Optional. A member was removed from the group, information about them (this member may be the bot itself)
 * @method string            getNewChatTitle()          Optional. A chat title was changed to this value
 * @method PhotoSize[]       getNewChatPhoto()          Optional. A chat photo was changed to this value
 * @method bool              getDeleteChatPhoto()       Optional. Service message: the chat photo was deleted
 * @method bool              getGroupChatCreated()      Optional. Service message: the group has been created
 * @method bool              getSupergroupChatCreated() Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can’t be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
 * @method bool              getChannelChatCreated()    Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can’t be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
 * @method int               getMigrateToChatId()       Optional. The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @method int               getMigrateFromChatId()     Optional. The supergroup has been migrated from a group with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
 * @method Message           getPinnedMessage()         Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.e message about a successful payment, information about the payment.
 * @method string            getConnectedWebsite()      Optional. The domain name of the website on which the user has logged in.ta      getPassportData()          Optional. Telegram Passport data* @method InlineKeyboard    getReplyMarkup()           Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
 */

class Message extends Entity
{


    protected function subEntities()
    {
        return [
            'from'          => User::class,
            'photo'         => [PhotoSize::class],
            'chat'          => Chat::class,
            'sticker'       => Sticker::class,
            'reply_markup'  => InlineKeyboard::class,
        ];
    }


    public function __construct($data) {

        parent::__construct($data);
    }


}