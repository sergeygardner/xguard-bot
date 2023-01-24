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
 * This class represents a service message about new members invited to a video chat.
 */
final class VideoChatParticipantsInvitedDTO implements JsonSerializable
{

    /**
     * @param UserDTO[] $users New members that were invited to the video chat
     */
    public function __construct(public readonly array $users)
    {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'users' => $this->users,
        ];
    }
}
