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
use XGuard\Bot\Facebook\Domain\ValueObject\ChannelIdValueObject;
use XGuard\Bot\Facebook\Domain\ValueObject\TypeValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

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
        private ChannelIdValueObject $channel_id,
        private ChannelNameValueObject $name,
        private TypeValueObject $type
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
     * @return ChannelIdValueObject
     */
    public function getChannelId(): ChannelIdValueObject
    {
        return $this->channel_id;
    }

    /**
     * @param ChannelIdValueObject $channelId
     *
     * @return void
     */
    public function setChannelId(ChannelIdValueObject $channelId): void
    {
        $this->channel_id = $channelId;
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
     * @return TypeValueObject
     */
    public function getType(): TypeValueObject
    {
        return $this->type;
    }

    /**
     * @param TypeValueObject $type
     *
     * @return void
     */
    public function setType(TypeValueObject $type): void
    {
        $this->type = $type;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'channel_id' => $this->channel_id,
            'name'       => $this->name,
            'type'       => $this->type,
        ];
    }
}
