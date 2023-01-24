<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Domain\Entity;

use JsonSerializable;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Telegram\Domain\ValueObject\ChatIdValueObject;

/**
 *
 */
class ChannelEntity implements JsonSerializable
{

    /**
     *
     */
    public function __construct(
        private readonly UuidValueObject $id,
        private ChatIdValueObject $chat_id,
        private ChannelNameValueObject $name
    ) {

    }

    /**
     * @return UuidValueObject
     */
    public function getId(): UuidValueObject
    {
        return $this->id;
    }

    /**
     * @return ChatIdValueObject
     */
    public function getChatId(): ChatIdValueObject
    {
        return $this->chat_id;
    }

    /**
     * @param ChatIdValueObject $chatId
     *
     * @return void
     */
    public function setChatId(ChatIdValueObject $chatId): void
    {
        $this->chat_id = $chatId;
    }

    /**
     * @return ChannelNameValueObject
     */
    public function getName(): ChannelNameValueObject
    {
        return $this->name;
    }

    /**
     * @param ChannelNameValueObject $name
     *
     * @return void
     */
    public function setName(ChannelNameValueObject $name): void
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'      => $this->id,
            'chat_id' => $this->chat_id,
            'name'    => $this->name,
        ];
    }
}
