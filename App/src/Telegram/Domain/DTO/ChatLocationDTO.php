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
 * This class represents a location to which a chat is connected.
 */
final class ChatLocationDTO implements JsonSerializable
{

    /**
     * @param LocationDTO $location The location to which the supergroup is connected. Can't be a live location.
     * @param string      $address  Location address; 1-64 characters, as defined by the chat owner
     */
    public function __construct(
        public readonly LocationDTO $location,
        public readonly string $address
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'location' => $this->location,
            'address'  => $this->address,
        ];
    }
}
