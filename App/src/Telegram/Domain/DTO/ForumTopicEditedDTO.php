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
 * This class represents a service message about an edited forum topic.
 */
final class ForumTopicEditedDTO implements JsonSerializable
{

    /**
     * @param string|null $name                 Optional. New name of the topic, if it was edited
     * @param string|null $icon_custom_emoji_id Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
     */
    public function __construct(
        public readonly ?string $name,
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
            'icon_custom_emoji_id' => $this->icon_custom_emoji_id,
        ];
    }
}
