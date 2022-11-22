<?php namespace Projkin\TeleBot\Entities;

/**
 * Class Sticker
 *
 * @link https://core.telegram.org/bots/api#sticker
 *
 * @method string       getFileId()       Identifier for this file, which can be used to download or reuse the file
 * @method string       getFileUniqueId() Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
 * @method int          getWidth()        Sticker width
 * @method int          getHeight()       Sticker height
 * @method bool         getIsAnimated()   True, if the sticker is animated
 * @method PhotoSize    getThumb()        Optional. Sticker thumbnail in .webp or .jpg format
 * @method string       getEmoji()        Optional. Emoji associated with the sticker
 * @method string       getSetName()      Optional. Name of the sticker set to which the sticker belongs
 * @method int          getFileSize()     Optional. File size
 */

class Sticker extends Entity
{

    protected function subEntities()
    {
        return [
            'thumb' => PhotoSize::class,
        ];
    }

}