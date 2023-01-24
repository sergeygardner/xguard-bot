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
 * This class represents a Telegram user or bot.
 */
final class UserDTO implements JsonSerializable
{

    /**
     * @param int         $id                          Unique identifier for this user or bot. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param bool        $is_bot                      True, if this user is a bot
     * @param string      $first_name                  User's or bot's first name
     * @param string|null $last_name                   Optional. User's or bot's last name
     * @param string|null $username                    Optional. User's or bot's username
     * @param string|null $language_code               Optional. IETF language tag of the user's language
     * @param bool|null   $is_premium                  Optional. True, if this user is a Telegram Premium user
     * @param bool|null   $added_to_attachment_menu    Optional. True, if this user added the bot to the attachment menu
     * @param bool|null   $can_join_groups             Optional. True, if the bot can be invited to groups. Returned only in getMe.
     * @param bool|null   $can_read_all_group_messages Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
     * @param bool|null   $supports_inline_queries     Optional. True, if the bot supports inline queries. Returned only in getMe.
     */
    public function __construct(
        public readonly int $id,
        public readonly bool $is_bot,
        public readonly string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $username,
        public readonly ?string $language_code,
        public readonly ?bool $is_premium,
        public readonly ?bool $added_to_attachment_menu,
        public readonly ?bool $can_join_groups,
        public readonly ?bool $can_read_all_group_messages,
        public readonly ?bool $supports_inline_queries
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                          => $this->id,
            'is_bot'                      => $this->is_bot,
            'first_name'                  => $this->first_name,
            'last_name'                   => $this->last_name,
            'username'                    => $this->username,
            'language_code'               => $this->language_code,
            'is_premium'                  => $this->is_premium,
            'added_to_attachment_menu'    => $this->added_to_attachment_menu,
            'can_join_groups'             => $this->can_join_groups,
            'can_read_all_group_messages' => $this->can_read_all_group_messages,
            'supports_inline_queries'     => $this->supports_inline_queries,
        ];
    }
}
