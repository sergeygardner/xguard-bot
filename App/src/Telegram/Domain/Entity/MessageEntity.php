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
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Telegram\Domain\ValueObject\TextValueObject;

/**
 *
 */
class MessageEntity implements JsonSerializable
{

    /**
     *
     */
    public function __construct(
        private readonly UuidValueObject $uuid,
        private readonly TextValueObject $text,
    ) {

    }

    /**
     * @return TextValueObject
     */
    public function getId(): TextValueObject
    {
        return $this->text;
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
            'uuid' => $this->uuid,
            'text' => $this->text,
        ];
    }
}
