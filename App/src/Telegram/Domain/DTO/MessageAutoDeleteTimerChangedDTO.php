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
 * This class represents a service message about a change in auto-delete timer settings.
 */
final class MessageAutoDeleteTimerChangedDTO implements JsonSerializable
{

    /**
     * @param int $message_auto_delete_time New auto-delete time for messages in the chat; in seconds
     */
    public function __construct(public readonly int $message_auto_delete_time)
    {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): int
    {
        return $this->message_auto_delete_time;
    }
}
