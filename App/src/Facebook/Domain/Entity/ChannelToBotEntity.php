<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\Entity;

use JsonSerializable;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
class ChannelToBotEntity implements JsonSerializable
{

    /**
     *
     */
    public function __construct(
        private readonly UuidValueObject $id,
        private UuidValueObject $channel_id,
        private UuidValueObject $bot_id
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
     * @return UuidValueObject
     */
    public function getChannelId(): UuidValueObject
    {
        return $this->channel_id;
    }

    /**
     * @param UuidValueObject $channel_id
     */
    public function setChannelId(UuidValueObject $channel_id): void
    {
        $this->channel_id = $channel_id;
    }

    /**
     * @return UuidValueObject
     */
    public function getBotId(): UuidValueObject
    {
        return $this->bot_id;
    }

    /**
     * @param UuidValueObject $bot_id
     */
    public function setBotId(UuidValueObject $bot_id): void
    {
        $this->bot_id = $bot_id;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'channel_id' => $this->channel_id,
            'bot_id'     => $this->bot_id,
        ];
    }
}
