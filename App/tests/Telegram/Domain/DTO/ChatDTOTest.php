<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ChatDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromChat(null));

        $id                                      = time();
        $type                                    = 'channel';
        $title                                   = 'ChannelTitle';
        $username                                = 'Username';
        $first_name                              = 'User';
        $last_name                               = 'Name';
        $is_forum                                = false;
        $photo                                   = null;
        $active_usernames                        = ['Username', 'Username2'];
        $emoji_status_custom_emoji_id            = null;
        $bio                                     = null;
        $has_private_forwards                    = false;
        $has_restricted_voice_and_video_messages = false;
        $join_to_send_messages                   = false;
        $join_by_request                         = false;
        $description                             = 'ChannelDescription';
        $invite_link                             = 'telegram://invite.me/'.$id;
        $pinned_message                          = null;
        $permissions                             = null;
        $slow_mode_delay                         = null;
        $message_auto_delete_time                = null;
        $has_aggressive_anti_spam_enabled        = true;
        $has_hidden_members                      = true;
        $has_protected_content                   = true;
        $sticker_set_name                        = null;
        $can_set_sticker_set                     = false;
        $linked_chat_id                          = null;
        $location                                = null;

        $chatDTO = $DTOFactoryService->createDTOFromChat(
            $chat = [
                'id'                                      => $id,
                'type'                                    => $type,
                'title'                                   => $title,
                'username'                                => $username,
                'first_name'                              => $first_name,
                'last_name'                               => $last_name,
                'is_forum'                                => $is_forum,
                'photo'                                   => $photo,
                'active_usernames'                        => $active_usernames,
                'emoji_status_custom_emoji_id'            => $emoji_status_custom_emoji_id,
                'bio'                                     => $bio,
                'has_private_forwards'                    => $has_private_forwards,
                'has_restricted_voice_and_video_messages' => $has_restricted_voice_and_video_messages,
                'join_to_send_messages'                   => $join_to_send_messages,
                'join_by_request'                         => $join_by_request,
                'description'                             => $description,
                'invite_link'                             => $invite_link,
                'pinned_message'                          => $pinned_message,
                'permissions'                             => $permissions,
                'slow_mode_delay'                         => $slow_mode_delay,
                'message_auto_delete_time'                => $message_auto_delete_time,
                'has_aggressive_anti_spam_enabled'        => $has_aggressive_anti_spam_enabled,
                'has_hidden_members'                      => $has_hidden_members,
                'has_protected_content'                   => $has_protected_content,
                'sticker_set_name'                        => $sticker_set_name,
                'can_set_sticker_set'                     => $can_set_sticker_set,
                'linked_chat_id'                          => $linked_chat_id,
                'location'                                => $location,
            ]
        );
        self::assertIsObject($chatDTO);
        self::assertEquals($id, $chatDTO->id);
        self::assertEquals($type, $chatDTO->type);
        self::assertEquals($title, $chatDTO->title);
        self::assertEquals($username, $chatDTO->username);
        self::assertEquals($first_name, $chatDTO->first_name);
        self::assertEquals($last_name, $chatDTO->last_name);
        self::assertEquals($is_forum, $chatDTO->is_forum);
        self::assertEquals($photo, $chatDTO->photo);
        self::assertEquals($active_usernames, $chatDTO->active_usernames);
        self::assertEquals($emoji_status_custom_emoji_id, $chatDTO->emoji_status_custom_emoji_id);
        self::assertEquals($bio, $chatDTO->bio);
        self::assertEquals($has_private_forwards, $chatDTO->has_private_forwards);
        self::assertEquals($has_restricted_voice_and_video_messages, $chatDTO->has_restricted_voice_and_video_messages);
        self::assertEquals($join_to_send_messages, $chatDTO->join_to_send_messages);
        self::assertEquals($join_by_request, $chatDTO->join_by_request);
        self::assertEquals($description, $chatDTO->description);
        self::assertEquals($invite_link, $chatDTO->invite_link);
        self::assertEquals($pinned_message, $chatDTO->pinned_message);
        self::assertEquals($permissions, $chatDTO->permissions);
        self::assertEquals($slow_mode_delay, $chatDTO->slow_mode_delay);
        self::assertEquals($message_auto_delete_time, $chatDTO->message_auto_delete_time);
        self::assertEquals($has_aggressive_anti_spam_enabled, $chatDTO->has_aggressive_anti_spam_enabled);
        self::assertEquals($has_hidden_members, $chatDTO->has_hidden_members);
        self::assertEquals($has_protected_content, $chatDTO->has_protected_content);
        self::assertEquals($sticker_set_name, $chatDTO->sticker_set_name);
        self::assertEquals($can_set_sticker_set, $chatDTO->can_set_sticker_set);
        self::assertEquals($linked_chat_id, $chatDTO->linked_chat_id);
        self::assertEquals($location, $chatDTO->location);
        self::assertEquals(
            json_encode($chat, JSON_THROW_ON_ERROR),
            json_encode($chatDTO, JSON_THROW_ON_ERROR)
        );
    }
}
