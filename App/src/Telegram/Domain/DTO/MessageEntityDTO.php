<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Domain\DTO;

use JsonSerializable;

/**
 * This class represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
 */
final class MessageEntityDTO implements JsonSerializable
{

    /**
     * @param string       $type            Type of the entity. Currently, can be "mention" (@username), "hashtag" (#hashtag), "cashtag" ($USD), "bot_command" (/start@jobs_bot), "url" (https://telegram.org), "email" (do-not-reply@telegram.org), "phone_number" (+1-212-555-0123), "bold" (bold text), "italic" (italic text), "underline" (underlined text), "strikethrough" (strikethrough text), "spoiler" (spoiler message), "code" (monowidth string), "pre" (monowidth block), "text_link" (for clickable text URLs), "text_mention" (for users without usernames), "custom_emoji" (for inline custom emoji stickers)
     * @param int          $offset          Offset in UTF-16 code units to the start of the entity
     * @param int          $length          Length of the entity in UTF-16 code units
     * @param string|null  $url             Optional. For "text_link" only, URL that will be opened after user taps on the text
     * @param UserDTO|null $user            Optional. For "text_mention" only, the mentioned user
     * @param string|null  $language        Optional. For "pre" only, the programming language of the entity text
     * @param string|null  $custom_emoji_id Optional. For "custom_emoji" only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker
     */
    public function __construct(
        public readonly string $type,
        public readonly int $offset,
        public readonly int $length,
        public readonly ?string $url,
        public readonly ?UserDTO $user,
        public readonly ?string $language,
        public readonly ?string $custom_emoji_id
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'type'            => $this->type,
            'offset'          => $this->offset,
            'length'          => $this->length,
            'url'             => $this->url,
            'user'            => $this->user,
            'language'        => $this->language,
            'custom_emoji_id' => $this->custom_emoji_id,
        ];
    }
}
