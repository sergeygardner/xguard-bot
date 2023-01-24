<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Domain\Entity;

use DateTimeInterface;
use JsonSerializable;
use XGuard\Bot\Shared\Domain\ValueObject\TextValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
class MessageEntity implements JsonSerializable
{

    /**
     *
     */
    public function __construct(
        private readonly UuidValueObject $id,
        private readonly DateTimeInterface $date_create,
        private readonly UuidValueObject $channel,
        private readonly TextValueObject $text,

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
     * @return DateTimeInterface
     */
    public function getDateCreate(): DateTimeInterface
    {
        return $this->date_create;
    }

    /**
     * @return UuidValueObject
     */
    public function getChannel(): UuidValueObject
    {
        return $this->channel;
    }

    /**
     * @return TextValueObject
     */
    public function getText(): TextValueObject
    {
        return $this->text;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'          => $this->id,
            'date_create' => $this->date_create,
            'channel'     => $this->channel,
            'text'        => $this->text,
        ];
    }
}
