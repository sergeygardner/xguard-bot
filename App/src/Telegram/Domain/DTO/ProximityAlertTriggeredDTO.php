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
 * This class represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
 */
final class ProximityAlertTriggeredDTO implements JsonSerializable
{

    /**
     * @param UserDTO $traveler User that triggered the alert
     * @param UserDTO $watcher  User that set the alert
     * @param int     $distance The distance between the users
     */
    public function __construct(
        public readonly UserDTO $traveler,
        public readonly UserDTO $watcher,
        public readonly int $distance
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'traveler' => $this->traveler,
            'watcher'  => $this->watcher,
            'distance' => $this->distance,
        ];
    }
}
