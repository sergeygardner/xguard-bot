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
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
class BotEntity implements JsonSerializable
{

    /**
     *
     */
    public function __construct(
        private readonly UuidValueObject $id,
        private TokenValueObject $token,
        private BotNameValueObject $name
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
     * @return TokenValueObject
     */
    public function getToken(): TokenValueObject
    {
        return $this->token;
    }

    /**
     * @param TokenValueObject $token
     */
    public function setToken(TokenValueObject $token): void
    {
        $this->token = $token;
    }

    /**
     * @return BotNameValueObject
     */
    public function getName(): BotNameValueObject
    {
        return $this->name;
    }

    /**
     * @param BotNameValueObject $name
     */
    public function setName(BotNameValueObject $name): void
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'    => $this->id,
            'token' => $this->token,
            'name'  => $this->name,
        ];
    }
}
