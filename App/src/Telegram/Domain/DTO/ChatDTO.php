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
 * This class represents a chat.
 */
final class ChatDTO implements JsonSerializable
{

    /**
     * @param int                     $id                                         Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param string                  $type                                       Type of chat, can be either "private", "group", "supergroup" or "channel"
     * @param string|null             $title                                      Optional. Title, for supergroups, channels and group chats
     * @param string|null             $username                                   Optional. Username, for private chats, supergroups and channels if available
     * @param string|null             $first_name                                 Optional. First name of the other party in a private chat
     * @param string|null             $last_name                                  Optional. Last name of the other party in a private chat
     * @param bool|null               $is_forum                                   Optional. True, if the supergroup chat is a forum (has topics enabled)
     * @param ChatPhotoDTO|null       $photo                                      Optional. Chat photo. Returned only in getChat.
     * @param array|null              $active_usernames                           Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. Returned only in getChat.
     * @param string|null             $emoji_status_custom_emoji_id               Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in getChat.
     * @param string|null             $bio                                        Optional. Bio of the other party in a private chat. Returned only in getChat.
     * @param bool|null               $has_private_forwards                       Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id=<user_id> links only in chats with the user. Returned only in getChat.
     * @param bool|null               $has_restricted_voice_and_video_messages    Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the private chat. Returned only in getChat.
     * @param bool|null               $join_to_send_messages                      Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat.
     * @param bool|null               $join_by_request                            Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. Returned only in getChat.
     * @param string|null             $description                                Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
     * @param string|null             $invite_link                                Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat.
     * @param MessageDTO|null         $pinned_message                             Optional. The most recent pinned message (by sending date). Returned only in getChat.
     * @param ChatPermissionsDTO|null $permissions                                Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
     * @param int|null                $slow_mode_delay                            Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged user; in seconds. Returned only in getChat.
     * @param int|null                $message_auto_delete_time                   Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned only in getChat.
     * @param bool|null               $has_aggressive_anti_spam_enabled           Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat administrators. Returned only in getChat.
     * @param bool|null               $has_hidden_members                         Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned only in getChat.
     * @param bool|null               $has_protected_content                      Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat.
     * @param string|null             $sticker_set_name                           Optional. For supergroups, name of group sticker set. Returned only in getChat.
     * @param bool|null               $can_set_sticker_set                        Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     * @param int|null                $linked_chat_id                             Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier. Returned only in getChat.
     * @param ChatLocationDTO|null    $location                                   Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat.
     *                                                                            \$([^,]+),$ '$1'=>\$this->$1,
     */
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly ?string $title,
        public readonly ?string $username,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?bool $is_forum,
        public readonly ?ChatPhotoDTO $photo,
        public readonly ?array $active_usernames,
        public readonly ?string $emoji_status_custom_emoji_id,
        public readonly ?string $bio,
        public readonly ?bool $has_private_forwards,
        public readonly ?bool $has_restricted_voice_and_video_messages,
        public readonly ?bool $join_to_send_messages,
        public readonly ?bool $join_by_request,
        public readonly ?string $description,
        public readonly ?string $invite_link,
        public readonly ?MessageDTO $pinned_message,
        public readonly ?ChatPermissionsDTO $permissions,
        public readonly ?int $slow_mode_delay,
        public readonly ?int $message_auto_delete_time,
        public readonly ?bool $has_aggressive_anti_spam_enabled,
        public readonly ?bool $has_hidden_members,
        public readonly ?bool $has_protected_content,
        public readonly ?string $sticker_set_name,
        public readonly ?bool $can_set_sticker_set,
        public readonly ?int $linked_chat_id,
        public readonly ?ChatLocationDTO $location,
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                                      => $this->id,
            'type'                                    => $this->type,
            'title'                                   => $this->title,
            'username'                                => $this->username,
            'first_name'                              => $this->first_name,
            'last_name'                               => $this->last_name,
            'is_forum'                                => $this->is_forum,
            'photo'                                   => $this->photo,
            'active_usernames'                        => $this->active_usernames,
            'emoji_status_custom_emoji_id'            => $this->emoji_status_custom_emoji_id,
            'bio'                                     => $this->bio,
            'has_private_forwards'                    => $this->has_private_forwards,
            'has_restricted_voice_and_video_messages' => $this->has_restricted_voice_and_video_messages,
            'join_to_send_messages'                   => $this->join_to_send_messages,
            'join_by_request'                         => $this->join_by_request,
            'description'                             => $this->description,
            'invite_link'                             => $this->invite_link,
            'pinned_message'                          => $this->pinned_message,
            'permissions'                             => $this->permissions,
            'slow_mode_delay'                         => $this->slow_mode_delay,
            'message_auto_delete_time'                => $this->message_auto_delete_time,
            'has_aggressive_anti_spam_enabled'        => $this->has_aggressive_anti_spam_enabled,
            'has_hidden_members'                      => $this->has_hidden_members,
            'has_protected_content'                   => $this->has_protected_content,
            'sticker_set_name'                        => $this->sticker_set_name,
            'can_set_sticker_set'                     => $this->can_set_sticker_set,
            'linked_chat_id'                          => $this->linked_chat_id,
            'location'                                => $this->location,
        ];
    }
}
