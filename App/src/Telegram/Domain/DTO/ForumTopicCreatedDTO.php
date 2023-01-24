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
 * This class represents a service message about a new forum topic created in the chat.
 */
final class ForumTopicCreatedDTO implements JsonSerializable
{

    /**
     * @param string      $name                 Name of the topic
     * @param int         $icon_color           Color of the topic icon in RGB format
     * @param string|null $icon_custom_emoji_id Optional. Unique identifier of the custom emoji shown as the topic icon
     */
    public function __construct(
        public readonly string $name,
        public readonly int $icon_color,
        public readonly ?string $icon_custom_emoji_id
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'name'                 => $this->name,
            'icon_color'           => $this->icon_color,
            'icon_custom_emoji_id' => $this->icon_custom_emoji_id,
        ];
    }
}
