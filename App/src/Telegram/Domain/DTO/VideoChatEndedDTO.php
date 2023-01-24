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
 * This class represents a service message about a video chat ended in the chat.
 */
final class VideoChatEndedDTO implements JsonSerializable
{

    /**
     * @param int $duration Video chat duration in seconds
     */
    public function __construct(public readonly int $duration)
    {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'duration' => $this->duration,
        ];
    }
}
