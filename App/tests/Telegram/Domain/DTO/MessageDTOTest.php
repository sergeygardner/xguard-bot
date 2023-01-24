<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class MessageDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromMessage(null));

        $message_id                              = time();
        $message_thread_id                       = null;
        $from                                    = null;
        $sender_chat                             = null;
        $date                                    = time();
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
        $permissions = null;
        $slow_mode_delay = null;
        $message_auto_delete_time = null;
        $has_aggressive_anti_spam_enabled = true;
        $has_hidden_members = true;
        $has_protected_content = true;
        $sticker_set_name = null;
        $can_set_sticker_set = false;
        $linked_chat_id = null;
        $location = null;
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
        ];
        $forward_from = null;
        $forward_from_chat = null;
        $forward_from_message_id = null;
        $forward_signature = null;
        $forward_sender_name = null;
        $forward_date = null;
        $is_topic_message = null;
        $is_automatic_forward = null;
        $reply_to_message = null;
        $via_bot = null;
        $edit_date                               = null;
        $has_protected_content                   = null;
        $media_group_id                          = null;
        $author_signature                        = null;
        $text                                    = null;
        $entities                                = null;
        $animation                               = null;
        $audio                                   = null;
        $document                                = null;
        $photo                                   = null;
        $sticker                                 = null;
        $video                                   = null;
        $video_note                              = null;
        $voice                                   = null;
        $caption                                 = null;
        $caption_entities                        = null;
        $has_media_spoiler                       = null;
        $contact                                 = null;
        $dice                                    = null;
        $game                                    = null;
        $poll                                    = null;
        $venue                                   = null;
        $location                                = null;
        $new_chat_members                        = null;
        $left_chat_member                        = null;
        $new_chat_title                          = null;
        $new_chat_photo                          = null;
        $delete_chat_photo                       = null;
        $group_chat_created                      = null;
        $supergroup_chat_created                 = null;
        $channel_chat_created                    = null;
        $message_auto_delete_timer_changed       = null;
        $migrate_to_chat_id                      = null;
        $migrate_from_chat_id                    = null;
        $pinned_message                          = null;
        $invoice                                 = null;
        $successful_payment                      = null;
        $connected_website                       = null;
        $write_access_allowed                    = null;
        $passport_data                           = null;
        $proximity_alert_triggered               = null;
        $forum_topic_created                     = null;
        $forum_topic_edited                      = null;
        $forum_topic_closed = null;
        $forum_topic_reopened = null;
        $general_forum_topic_hidden = null;
        $general_forum_topic_unhidden = null;
        $video_chat_scheduled = null;
        $video_chat_started = null;
        $video_chat_ended = null;
        $video_chat_participants_invited = null;
        $web_app_data = null;
        $reply_markup = null;
        $messageDTO = $DTOFactoryService->createDTOFromMessage(
            $message = [
                'message_id'                        => $message_id,
                'message_thread_id'                 => $message_thread_id,
                'from'                              => $from,
                'sender_chat'                       => $sender_chat,
                'date'                              => $date,
                'chat'                              => $chat,
                'forward_from'                      => $forward_from,
                'forward_from_chat'                 => $forward_from_chat,
                'forward_from_message_id'           => $forward_from_message_id,
                'forward_signature'                 => $forward_signature,
                'forward_sender_name'               => $forward_sender_name,
                'forward_date'                      => $forward_date,
                'is_topic_message'                  => $is_topic_message,
                'is_automatic_forward'              => $is_automatic_forward,
                'reply_to_message'                  => $reply_to_message,
                'via_bot'                           => $via_bot,
                'edit_date'                         => $edit_date,
                'has_protected_content'             => $has_protected_content,
                'media_group_id'                    => $media_group_id,
                'author_signature'                  => $author_signature,
                'text'                              => $text,
                'entities'                          => $entities,
                'animation'                         => $animation,
                'audio'                             => $audio,
                'document'                          => $document,
                'photo'                             => $photo,
                'sticker'                           => $sticker,
                'video'                             => $video,
                'video_note'                        => $video_note,
                'voice'                             => $voice,
                'caption'                           => $caption,
                'caption_entities'                  => $caption_entities,
                'has_media_spoiler'                 => $has_media_spoiler,
                'contact'                           => $contact,
                'dice'                              => $dice,
                'game'                              => $game,
                'poll'                              => $poll,
                'venue'                             => $venue,
                'location'                          => $location,
                'new_chat_members'                  => $new_chat_members,
                'left_chat_member'                  => $left_chat_member,
                'new_chat_title'                    => $new_chat_title,
                'new_chat_photo'                    => $new_chat_photo,
                'delete_chat_photo'                 => $delete_chat_photo,
                'group_chat_created'                => $group_chat_created,
                'supergroup_chat_created'           => $supergroup_chat_created,
                'channel_chat_created'              => $channel_chat_created,
                'message_auto_delete_timer_changed' => $message_auto_delete_timer_changed,
                'migrate_to_chat_id'                => $migrate_to_chat_id,
                'migrate_from_chat_id'              => $migrate_from_chat_id,
                'pinned_message'                    => $pinned_message,
                'invoice'                           => $invoice,
                'successful_payment'                => $successful_payment,
                'connected_website'                 => $connected_website,
                'write_access_allowed'              => $write_access_allowed,
                'passport_data'                     => $passport_data,
                'proximity_alert_triggered'         => $proximity_alert_triggered,
                'forum_topic_created'               => $forum_topic_created,
                'forum_topic_edited'                => $forum_topic_edited,
                'forum_topic_closed'                => $forum_topic_closed,
                'forum_topic_reopened'              => $forum_topic_reopened,
                'general_forum_topic_hidden'        => $general_forum_topic_hidden,
                'general_forum_topic_unhidden'      => $general_forum_topic_unhidden,
                'video_chat_scheduled'              => $video_chat_scheduled,
                'video_chat_started'                => $video_chat_started,
                'video_chat_ended'                  => $video_chat_ended,
                'video_chat_participants_invited'   => $video_chat_participants_invited,
                'web_app_data'                      => $web_app_data,
                'reply_markup'                      => $reply_markup,
            ]
        );
        self::assertIsObject($messageDTO);
        self::assertEquals($message_id, $messageDTO->message_id);
        self::assertEquals($message_thread_id, $messageDTO->message_thread_id);
        self::assertEquals($from, $messageDTO->from);
        self::assertEquals($sender_chat, $messageDTO->sender_chat);
        self::assertEquals($date, $messageDTO->date);
        self::assertEquals($chat, $messageDTO->chat->jsonSerialize());
        self::assertEquals($forward_from, $messageDTO->forward_from);
        self::assertEquals($forward_from_chat, $messageDTO->forward_from_chat);
        self::assertEquals($forward_from_message_id, $messageDTO->forward_from_message_id);
        self::assertEquals($forward_signature, $messageDTO->forward_signature);
        self::assertEquals($forward_sender_name, $messageDTO->forward_sender_name);
        self::assertEquals($forward_date, $messageDTO->forward_date);
        self::assertEquals($is_topic_message, $messageDTO->is_topic_message);
        self::assertEquals($is_automatic_forward, $messageDTO->is_automatic_forward);
        self::assertEquals($reply_to_message, $messageDTO->reply_to_message);
        self::assertEquals($via_bot, $messageDTO->via_bot);
        self::assertEquals($edit_date, $messageDTO->edit_date);
        self::assertEquals($has_protected_content, $messageDTO->has_protected_content);
        self::assertEquals($media_group_id, $messageDTO->media_group_id);
        self::assertEquals($author_signature, $messageDTO->author_signature);
        self::assertEquals($text, $messageDTO->text);
        self::assertEquals($entities, $messageDTO->entities);
        self::assertEquals($animation, $messageDTO->animation);
        self::assertEquals($audio, $messageDTO->audio);
        self::assertEquals($document, $messageDTO->document);
        self::assertEquals($photo, $messageDTO->photo);
        self::assertEquals($sticker, $messageDTO->sticker);
        self::assertEquals($video, $messageDTO->video);
        self::assertEquals($video_note, $messageDTO->video_note);
        self::assertEquals($voice, $messageDTO->voice);
        self::assertEquals($caption, $messageDTO->caption);
        self::assertEquals($caption_entities, $messageDTO->caption_entities);
        self::assertEquals($has_media_spoiler, $messageDTO->has_media_spoiler);
        self::assertEquals($contact, $messageDTO->contact);
        self::assertEquals($dice, $messageDTO->dice);
        self::assertEquals($game, $messageDTO->game);
        self::assertEquals($poll, $messageDTO->poll);
        self::assertEquals($venue, $messageDTO->venue);
        self::assertEquals($location, $messageDTO->location);
        self::assertEquals($new_chat_members, $messageDTO->new_chat_members);
        self::assertEquals($left_chat_member, $messageDTO->left_chat_member);
        self::assertEquals($new_chat_title, $messageDTO->new_chat_title);
        self::assertEquals($new_chat_photo, $messageDTO->new_chat_photo);
        self::assertEquals($delete_chat_photo, $messageDTO->delete_chat_photo);
        self::assertEquals($group_chat_created, $messageDTO->group_chat_created);
        self::assertEquals($supergroup_chat_created, $messageDTO->supergroup_chat_created);
        self::assertEquals($channel_chat_created, $messageDTO->channel_chat_created);
        self::assertEquals($message_auto_delete_timer_changed, $messageDTO->message_auto_delete_timer_changed);
        self::assertEquals($migrate_to_chat_id, $messageDTO->migrate_to_chat_id);
        self::assertEquals($migrate_from_chat_id, $messageDTO->migrate_from_chat_id);
        self::assertEquals($pinned_message, $messageDTO->pinned_message);
        self::assertEquals($invoice, $messageDTO->invoice);
        self::assertEquals($successful_payment, $messageDTO->successful_payment);
        self::assertEquals($connected_website, $messageDTO->connected_website);
        self::assertEquals($write_access_allowed, $messageDTO->write_access_allowed);
        self::assertEquals($passport_data, $messageDTO->passport_data);
        self::assertEquals($proximity_alert_triggered, $messageDTO->proximity_alert_triggered);
        self::assertEquals($forum_topic_created, $messageDTO->forum_topic_created);
        self::assertEquals($forum_topic_edited, $messageDTO->forum_topic_edited);
        self::assertEquals($forum_topic_closed, $messageDTO->forum_topic_closed);
        self::assertEquals($forum_topic_reopened, $messageDTO->forum_topic_reopened);
        self::assertEquals($general_forum_topic_hidden, $messageDTO->general_forum_topic_hidden);
        self::assertEquals($general_forum_topic_unhidden, $messageDTO->general_forum_topic_unhidden);
        self::assertEquals($video_chat_scheduled, $messageDTO->video_chat_scheduled);
        self::assertEquals($video_chat_started, $messageDTO->video_chat_started);
        self::assertEquals($video_chat_ended, $messageDTO->video_chat_ended);
        self::assertEquals($video_chat_participants_invited, $messageDTO->video_chat_participants_invited);
        self::assertEquals($web_app_data, $messageDTO->web_app_data);
        self::assertEquals($reply_markup, $messageDTO->reply_markup);
        self::assertEquals(
            json_encode($message, JSON_THROW_ON_ERROR),
            json_encode($messageDTO, JSON_THROW_ON_ERROR)
        );
    }
}
