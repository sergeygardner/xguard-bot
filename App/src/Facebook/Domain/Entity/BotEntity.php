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
use XGuard\Bot\Facebook\Domain\ValueObject\ClientIdValueObject;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientSecretValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
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
        private ClientIdValueObject $client_id,
        private ClientSecretValueObject $client_secret,
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
     * @return ClientIdValueObject
     */
    public function getClientId(): ClientIdValueObject
    {
        return $this->client_id;
    }

    /**
     * @param ClientIdValueObject $clientId
     */
    public function setClientId(ClientIdValueObject $clientId): void
    {
        $this->client_id = $clientId;
    }

    /**
     * @return ClientSecretValueObject
     */
    public function getClientSecret(): ClientSecretValueObject
    {
        return $this->client_secret;
    }

    /**
     * @param ClientSecretValueObject $clientSecret
     */
    public function setClientSecret(ClientSecretValueObject $clientSecret): void
    {
        $this->client_secret = $clientSecret;
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
            'uuid'          => $this->id,
            'client_id'     => $this->client_id,
            'client_secret' => $this->client_secret,
            'name'          => $this->name,
        ];
    }
}
