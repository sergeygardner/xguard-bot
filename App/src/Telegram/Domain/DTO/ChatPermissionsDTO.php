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
 * This class describes actions that a non-administrator user is allowed to take in a chat.
 */
final class ChatPermissionsDTO implements JsonSerializable
{

    /**
     * @param bool      $can_send_messages         Optional. True, if the user is allowed to send text messages, contacts, locations and venues
     * @param bool|null $can_send_media_messages   Optional. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages
     * @param bool|null $can_send_polls            Optional. True, if the user is allowed to send polls, implies can_send_messages
     * @param bool|null $can_send_other_messages   Optional. True, if the user is allowed to send animations, games, stickers and use inline bots, implies can_send_media_messages
     * @param bool|null $can_add_web_page_previews Optional. True, if the user is allowed to add web page previews to their messages, implies can_send_media_messages
     * @param bool|null $can_change_info           Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public supergroups
     * @param bool|null $can_invite_users          Optional. True, if the user is allowed to invite new users to the chat
     * @param bool|null $can_pin_messages          Optional. True, if the user is allowed to pin messages. Ignored in public supergroups
     * @param bool|null $can_manage_topics         Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages
     */
    public function __construct(
        public readonly bool $can_send_messages,
        public readonly ?bool $can_send_media_messages,
        public readonly ?bool $can_send_polls,
        public readonly ?bool $can_send_other_messages,
        public readonly ?bool $can_add_web_page_previews,
        public readonly ?bool $can_change_info,
        public readonly ?bool $can_invite_users,
        public readonly ?bool $can_pin_messages,
        public readonly ?bool $can_manage_topics
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'can_send_messages'         => $this->can_send_messages,
            'can_send_media_messages'   => $this->can_send_media_messages,
            'can_send_polls'            => $this->can_send_polls,
            'can_send_other_messages'   => $this->can_send_other_messages,
            'can_add_web_page_previews' => $this->can_add_web_page_previews,
            'can_change_info'           => $this->can_change_info,
            'can_invite_users'          => $this->can_invite_users,
            'can_pin_messages'          => $this->can_pin_messages,
            'can_manage_topics'         => $this->can_manage_topics,
        ];
    }
}
