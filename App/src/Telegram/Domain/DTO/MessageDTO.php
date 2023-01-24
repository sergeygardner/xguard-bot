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
 * This class represents a message.
 */
final class MessageDTO implements JsonSerializable
{

    /**
     * @param int                                   $message_id                        Unique message identifier inside this chat
     * @param int|null                              $message_thread_id                 Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
     * @param UserDTO|null                          $from                              Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     * @param ChatDTO|null                          $sender_chat                       Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     * @param int                                   $date                              Date the message was sent in Unix time
     * @param ChatDTO                               $chat                              Conversation the message belongs to
     * @param UserDTO|null                          $forward_from                      Optional. For forwarded messages, sender of the original message
     * @param ChatDTO|null                          $forward_from_chat                 Optional. For messages forwarded from channels or from anonymous administrators, information about the original sender chat
     * @param int|null                              $forward_from_message_id           Optional. For messages forwarded from channels, identifier of the original message in the channel
     * @param string|null                           $forward_signature                 Optional. For forwarded messages that were originally sent in channels or by an anonymous chat administrator, signature of the message sender if present
     * @param string|null                           $forward_sender_name               Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded messages
     * @param int|null                              $forward_date                      Optional. For forwarded messages, date the original message was sent in Unix time
     * @param bool|null                             $is_topic_message                  Optional. True, if the message is sent to a forum topic
     * @param bool|null                             $is_automatic_forward              Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
     * @param MessageDTO|null                       $reply_to_message                  Optional. For replies, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param UserDTO|null                          $via_bot                           Optional. Bot through which the message was sent
     * @param int|null                              $edit_date                         Optional. Date the message was last edited in Unix time
     * @param bool|null                             $has_protected_content             Optional. True, if the message can't be forwarded
     * @param string|null                           $media_group_id                    Optional. The unique identifier of a media message group this message belongs to
     * @param string|null                           $author_signature                  Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
     * @param string|null                           $text                              Optional. For text messages, the actual UTF-8 text of the message
     * @param MessageEntityDTO[]|null               $entities                          Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     * @param AnimationDTO|null                     $animation                         Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
     * @param AudioDTO|null                         $audio                             Optional. Message is an audio file, information about the file
     * @param DocumentDTO|null                      $document                          Optional. Message is a general file, information about the file
     * @param PhotoSizeDTO[]|null                   $photo                             Optional. Message is a photo, available sizes of the photo
     * @param StickerDTO|null                       $sticker                           Optional. Message is a sticker, information about the sticker
     * @param VideoDTO|null                         $video                             Optional. Message is a video, information about the video
     * @param VideoNoteDTO|null                     $video_note                        Optional. Message is a video note, information about the video message
     * @param VoiceDTO|null                         $voice                             Optional. Message is a voice message, information about the file
     * @param string|null                           $caption                           Optional. Caption for the animation, audio, document, photo, video or voice
     * @param MessageEntityDTO[]|null               $caption_entities                  Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     * @param bool|null                             $has_media_spoiler                 Optional. True, if the message media is covered by a spoiler animation
     * @param ContactDTO|null                       $contact                           Optional. Message is a shared contact, information about the contact
     * @param DiceDTO|null                          $dice                              Optional. Message is a die with random value
     * @param GameDTO|null                          $game                              Optional. Message is a game, information about the game. More about games »
     * @param PollDTO|null                          $poll                              Optional. Message is a native poll, information about the poll
     * @param VenueDTO|null                         $venue                             Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
     * @param LocationDTO|null                      $location                          Optional. Message is a shared location, information about the location
     * @param UserDTO[]|null                        $new_chat_members                  Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
     * @param UserDTO|null                          $left_chat_member                  Optional. A member was removed from the group, information about them (this member may be the bot itself)
     * @param string|null                           $new_chat_title                    Optional. A chat title was changed to this value
     * @param PhotoSizeDTO[]|null                   $new_chat_photo                    Optional. A chat photo was change to this value
     * @param bool|null                             $delete_chat_photo                 Optional. Service message: the chat photo was deleted
     * @param bool|null                             $group_chat_created                Optional. Service message: the group has been created
     * @param bool|null                             $supergroup_chat_created           Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     * @param bool|null                             $channel_chat_created              Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
     * @param MessageAutoDeleteTimerChangedDTO|null $message_auto_delete_timer_changed Optional. Service message: auto-delete timer settings changed in the chat
     * @param int|null                              $migrate_to_chat_id                Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param int|null                              $migrate_from_chat_id              Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param MessageDTO|null                       $pinned_message                    Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply.
     * @param InvoiceDTO|null                       $invoice                           Optional. Message is an invoice for a payment, information about the invoice. More about payments »
     * @param SuccessfulPaymentDTO|null             $successful_payment                Optional. Message is a service message about a successful payment, information about the payment. More about payments »
     * @param string|null                           $connected_website                 Optional. The domain name of the website on which the user has logged in. More about Telegram Login »
     * @param WriteAccessAllowedDTO|null            $write_access_allowed              Optional. Service message: the user allowed the bot added to the attachment menu to write messages
     * @param PassportDataDTO|null                  $passport_data                     Optional. Telegram Passport data
     * @param ProximityAlertTriggeredDTO|null       $proximity_alert_triggered         Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     * @param ForumTopicCreatedDTO|null             $forum_topic_created               Optional. Service message: forum topic created
     * @param ForumTopicEditedDTO|null              $forum_topic_edited                Optional. Service message: forum topic edited
     * @param ForumTopicClosedDTO|null              $forum_topic_closed                Optional. Service message: forum topic closed
     * @param ForumTopicReopenedDTO|null            $forum_topic_reopened              Optional. Service message: forum topic reopened
     * @param GeneralForumTopicHiddenDTO|null       $general_forum_topic_hidden        Optional. Service message: the 'General' forum topic hidden
     * @param GeneralForumTopicUnhiddenDTO|null     $general_forum_topic_unhidden      Optional. Service message: the 'General' forum topic unhidden
     * @param VideoChatScheduledDTO|null            $video_chat_scheduled              Optional. Service message: video chat scheduled
     * @param VideoChatStartedDTO|null              $video_chat_started                Optional. Service message: video chat started
     * @param VideoChatEndedDTO|null                $video_chat_ended                  Optional. Service message: video chat ended
     * @param VideoChatParticipantsInvitedDTO|null  $video_chat_participants_invited   Optional. Service message: new participants invited to a video chat
     * @param WebAppDataDTO|null                    $web_app_data                      Optional. Service message: data sent by a Web App
     * @param InlineKeyboardMarkupDTO|null          $reply_markup                      Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     */
    public function __construct(
        public readonly int $message_id,
        public readonly ?int $message_thread_id,
        public readonly ?UserDTO $from,
        public readonly ?ChatDTO $sender_chat,
        public readonly int $date,
        public readonly ChatDTO $chat,
        public readonly ?UserDTO $forward_from,
        public readonly ?ChatDTO $forward_from_chat,
        public readonly ?int $forward_from_message_id,
        public readonly ?string $forward_signature,
        public readonly ?string $forward_sender_name,
        public readonly ?int $forward_date,
        public readonly ?bool $is_topic_message,
        public readonly ?bool $is_automatic_forward,
        public readonly ?MessageDTO $reply_to_message,
        public readonly ?UserDTO $via_bot,
        public readonly ?int $edit_date,
        public readonly ?bool $has_protected_content,
        public readonly ?string $media_group_id,
        public readonly ?string $author_signature,
        public readonly ?string $text,
        public readonly ?array $entities,
        public readonly ?AnimationDTO $animation,
        public readonly ?AudioDTO $audio,
        public readonly ?DocumentDTO $document,
        public readonly ?array $photo,
        public readonly ?StickerDTO $sticker,
        public readonly ?VideoDTO $video,
        public readonly ?VideoNoteDTO $video_note,
        public readonly ?VoiceDTO $voice,
        public readonly ?string $caption,
        public readonly ?array $caption_entities,
        public readonly ?bool $has_media_spoiler,
        public readonly ?ContactDTO $contact,
        public readonly ?DiceDTO $dice,
        public readonly ?GameDTO $game,
        public readonly ?PollDTO $poll,
        public readonly ?VenueDTO $venue,
        public readonly ?LocationDTO $location,
        public readonly ?array $new_chat_members,
        public readonly ?UserDTO $left_chat_member,
        public readonly ?string $new_chat_title,
        public readonly ?array $new_chat_photo,
        public readonly ?bool $delete_chat_photo,
        public readonly ?bool $group_chat_created,
        public readonly ?bool $supergroup_chat_created,
        public readonly ?bool $channel_chat_created,
        public readonly ?MessageAutoDeleteTimerChangedDTO $message_auto_delete_timer_changed,
        public readonly ?int $migrate_to_chat_id,
        public readonly ?int $migrate_from_chat_id,
        public readonly ?MessageDTO $pinned_message,
        public readonly ?InvoiceDTO $invoice,
        public readonly ?SuccessfulPaymentDTO $successful_payment,
        public readonly ?string $connected_website,
        public readonly ?WriteAccessAllowedDTO $write_access_allowed,
        public readonly ?PassportDataDTO $passport_data,
        public readonly ?ProximityAlertTriggeredDTO $proximity_alert_triggered,
        public readonly ?ForumTopicCreatedDTO $forum_topic_created,
        public readonly ?ForumTopicEditedDTO $forum_topic_edited,
        public readonly ?ForumTopicClosedDTO $forum_topic_closed,
        public readonly ?ForumTopicReopenedDTO $forum_topic_reopened,
        public readonly ?GeneralForumTopicHiddenDTO $general_forum_topic_hidden,
        public readonly ?GeneralForumTopicUnhiddenDTO $general_forum_topic_unhidden,
        public readonly ?VideoChatScheduledDTO $video_chat_scheduled,
        public readonly ?VideoChatStartedDTO $video_chat_started,
        public readonly ?VideoChatEndedDTO $video_chat_ended,
        public readonly ?VideoChatParticipantsInvitedDTO $video_chat_participants_invited,
        public readonly ?WebAppDataDTO $web_app_data,
        public readonly ?InlineKeyboardMarkupDTO $reply_markup
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'message_id'                        => $this->message_id,
            'message_thread_id'                 => $this->message_thread_id,
            'from'                              => $this->from,
            'sender_chat'                       => $this->sender_chat,
            'date'                              => $this->date,
            'chat'                              => $this->chat,
            'forward_from'                      => $this->forward_from,
            'forward_from_chat'                 => $this->forward_from_chat,
            'forward_from_message_id'           => $this->forward_from_message_id,
            'forward_signature'                 => $this->forward_signature,
            'forward_sender_name'               => $this->forward_sender_name,
            'forward_date'                      => $this->forward_date,
            'is_topic_message'                  => $this->is_topic_message,
            'is_automatic_forward'              => $this->is_automatic_forward,
            'reply_to_message'                  => $this->reply_to_message,
            'via_bot'                           => $this->via_bot,
            'edit_date'                         => $this->edit_date,
            'has_protected_content'             => $this->has_protected_content,
            'media_group_id'                    => $this->media_group_id,
            'author_signature'                  => $this->author_signature,
            'text'                              => $this->text,
            'entities'                          => $this->entities,
            'animation'                         => $this->animation,
            'audio'                             => $this->audio,
            'document'                          => $this->document,
            'photo'                             => $this->photo,
            'sticker'                           => $this->sticker,
            'video'                             => $this->video,
            'video_note'                        => $this->video_note,
            'voice'                             => $this->voice,
            'caption'                           => $this->caption,
            'caption_entities'                  => $this->caption_entities,
            'has_media_spoiler'                 => $this->has_media_spoiler,
            'contact'                           => $this->contact,
            'dice'                              => $this->dice,
            'game'                              => $this->game,
            'poll'                              => $this->poll,
            'venue'                             => $this->venue,
            'location'                          => $this->location,
            'new_chat_members'                  => $this->new_chat_members,
            'left_chat_member'                  => $this->left_chat_member,
            'new_chat_title'                    => $this->new_chat_title,
            'new_chat_photo'                    => $this->new_chat_photo,
            'delete_chat_photo'                 => $this->delete_chat_photo,
            'group_chat_created'                => $this->group_chat_created,
            'supergroup_chat_created'           => $this->supergroup_chat_created,
            'channel_chat_created'              => $this->channel_chat_created,
            'message_auto_delete_timer_changed' => $this->message_auto_delete_timer_changed,
            'migrate_to_chat_id'                => $this->migrate_to_chat_id,
            'migrate_from_chat_id'              => $this->migrate_from_chat_id,
            'pinned_message'                    => $this->pinned_message,
            'invoice'                           => $this->invoice,
            'successful_payment'                => $this->successful_payment,
            'connected_website'                 => $this->connected_website,
            'write_access_allowed'              => $this->write_access_allowed,
            'passport_data'                     => $this->passport_data,
            'proximity_alert_triggered'         => $this->proximity_alert_triggered,
            'forum_topic_created'               => $this->forum_topic_created,
            'forum_topic_edited'                => $this->forum_topic_edited,
            'forum_topic_closed'                => $this->forum_topic_closed,
            'forum_topic_reopened'              => $this->forum_topic_reopened,
            'general_forum_topic_hidden'        => $this->general_forum_topic_hidden,
            'general_forum_topic_unhidden'      => $this->general_forum_topic_unhidden,
            'video_chat_scheduled'              => $this->video_chat_scheduled,
            'video_chat_started'                => $this->video_chat_started,
            'video_chat_ended'                  => $this->video_chat_ended,
            'video_chat_participants_invited'   => $this->video_chat_participants_invited,
            'web_app_data'                      => $this->web_app_data,
            'reply_markup'                      => $this->reply_markup,
        ];
    }
}
