<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Application\Service;

use XGuard\Bot\Telegram\Domain\DTO\AnimationDTO;
use XGuard\Bot\Telegram\Domain\DTO\AudioDTO;
use XGuard\Bot\Telegram\Domain\DTO\CallbackGameDTO;
use XGuard\Bot\Telegram\Domain\DTO\ChatDTO;
use XGuard\Bot\Telegram\Domain\DTO\ChatLocationDTO;
use XGuard\Bot\Telegram\Domain\DTO\ChatPermissionsDTO;
use XGuard\Bot\Telegram\Domain\DTO\ChatPhotoDTO;
use XGuard\Bot\Telegram\Domain\DTO\ContactDTO;
use XGuard\Bot\Telegram\Domain\DTO\DiceDTO;
use XGuard\Bot\Telegram\Domain\DTO\DocumentDTO;
use XGuard\Bot\Telegram\Domain\DTO\EncryptedCredentialsDTO;
use XGuard\Bot\Telegram\Domain\DTO\EncryptedPassportElementDTO;
use XGuard\Bot\Telegram\Domain\DTO\FileDTO;
use XGuard\Bot\Telegram\Domain\DTO\ForumTopicClosedDTO;
use XGuard\Bot\Telegram\Domain\DTO\ForumTopicCreatedDTO;
use XGuard\Bot\Telegram\Domain\DTO\ForumTopicEditedDTO;
use XGuard\Bot\Telegram\Domain\DTO\ForumTopicReopenedDTO;
use XGuard\Bot\Telegram\Domain\DTO\GameDTO;
use XGuard\Bot\Telegram\Domain\DTO\GeneralForumTopicHiddenDTO;
use XGuard\Bot\Telegram\Domain\DTO\GeneralForumTopicUnhiddenDTO;
use XGuard\Bot\Telegram\Domain\DTO\InlineKeyboardButtonDTO;
use XGuard\Bot\Telegram\Domain\DTO\InlineKeyboardMarkupDTO;
use XGuard\Bot\Telegram\Domain\DTO\InvoiceDTO;
use XGuard\Bot\Telegram\Domain\DTO\LocationDTO;
use XGuard\Bot\Telegram\Domain\DTO\LoginUrlDTO;
use XGuard\Bot\Telegram\Domain\DTO\MaskPositionDTO;
use XGuard\Bot\Telegram\Domain\DTO\MessageAutoDeleteTimerChangedDTO;
use XGuard\Bot\Telegram\Domain\DTO\MessageDTO;
use XGuard\Bot\Telegram\Domain\DTO\MessageEntityDTO;
use XGuard\Bot\Telegram\Domain\DTO\OrderInfoDTO;
use XGuard\Bot\Telegram\Domain\DTO\PassportDataDTO;
use XGuard\Bot\Telegram\Domain\DTO\PassportFileDTO;
use XGuard\Bot\Telegram\Domain\DTO\PhotoSizeDTO;
use XGuard\Bot\Telegram\Domain\DTO\PollDTO;
use XGuard\Bot\Telegram\Domain\DTO\PollOptionDTO;
use XGuard\Bot\Telegram\Domain\DTO\ProximityAlertTriggeredDTO;
use XGuard\Bot\Telegram\Domain\DTO\ShippingAddressDTO;
use XGuard\Bot\Telegram\Domain\DTO\StickerDTO;
use XGuard\Bot\Telegram\Domain\DTO\SuccessfulPaymentDTO;
use XGuard\Bot\Telegram\Domain\DTO\UserDTO;
use XGuard\Bot\Telegram\Domain\DTO\VenueDTO;
use XGuard\Bot\Telegram\Domain\DTO\VideoChatEndedDTO;
use XGuard\Bot\Telegram\Domain\DTO\VideoChatParticipantsInvitedDTO;
use XGuard\Bot\Telegram\Domain\DTO\VideoChatScheduledDTO;
use XGuard\Bot\Telegram\Domain\DTO\VideoChatStartedDTO;
use XGuard\Bot\Telegram\Domain\DTO\VideoDTO;
use XGuard\Bot\Telegram\Domain\DTO\VideoNoteDTO;
use XGuard\Bot\Telegram\Domain\DTO\VoiceDTO;
use XGuard\Bot\Telegram\Domain\DTO\WebAppDataDTO;
use XGuard\Bot\Telegram\Domain\DTO\WebAppInfoDTO;
use XGuard\Bot\Telegram\Domain\DTO\WriteAccessAllowedDTO;

/**
 *
 */
class DTOFactoryService implements DTOFactoryServiceInterface
{

    /**
     * @inheritDoc
     */
    public function createDTOFromMessage(?array $message): ?MessageDTO
    {
        if (null === $message) {
            return null;
        }

        return new MessageDTO(
            $message['message_id'],
            $message['message_thread_id'] ?? null,
            $this->createDTOFromUser($message['from'] ?? null),
            $this->createDTOFromChat($message['sender_chat'] ?? null),
            $message['date'],
            $this->createDTOFromChat($message['chat']),
            $this->createDTOFromUser($message['forward_from'] ?? null),
            $this->createDTOFromChat($message['forward_from_chat'] ?? null),
            $message['forward_from_message_id'] ?? null,
            $message['forward_signature'] ?? null,
            $message['forward_sender_name'] ?? null,
            $message['forward_date'] ?? null,
            $message['is_topic_message'] ?? null,
            $message['is_automatic_forward'] ?? null,
            $this->createDTOFromMessage($message['reply_to_message'] ?? null),
            $this->createDTOFromUser($message['via_bot'] ?? null),
            $message['edit_date'] ?? null,
            $message['has_protected_content'] ?? null,
            $message['media_group_id'] ?? null,
            $message['author_signature'] ?? null,
            $message['text'] ?? null,
            $this->createDTOFromMessageEntities($message['entities'] ?? null),
            $this->createDTOFromAnimation($message['animation'] ?? null),
            $this->createDTOFromAudio($message['audio'] ?? null),
            $this->createDTOFromDocument($message['document'] ?? null),
            $this->createDTOFromPhotoSizes($message['photo'] ?? null),
            $this->createDTOFromSticker($message['sticker'] ?? null),
            $this->createDTOFromVideo($message['video'] ?? null),
            $this->createDTOFromVideoNote($message['video_note'] ?? null),
            $this->createDTOFromVoice($message['voice'] ?? null),
            $message['caption'] ?? null,
            $this->createDTOFromMessageEntities($message['caption_entities'] ?? null),
            $message['has_media_spoiler'] ?? null,
            $this->createDTOFromContact($message['contact'] ?? null),
            $this->createDTOFromDice($message['dice'] ?? null),
            $this->createDTOFromGame($message['game'] ?? null),
            $this->createDTOFromPoll($message['poll'] ?? null),
            $this->createDTOFromVenue($message['venue'] ?? null),
            $this->createDTOFromLocation($message['location'] ?? null),
            $this->createDTOFromUsers($message['new_chat_members'] ?? null),
            $this->createDTOFromUser($message['left_chat_member'] ?? null),
            $message['new_chat_title'] ?? null,
            $this->createDTOFromPhotoSizes($message['new_chat_photo'] ?? null),
            $message['delete_chat_photo'] ?? null,
            $message['group_chat_created'] ?? null,
            $message['supergroup_chat_created'] ?? null,
            $message['channel_chat_created'] ?? null,
            $this->createDTOFromMessageAutoDeleteTimerChanged($message['message_auto_delete_timer_changed'] ?? null),
            $message['migrate_to_chat_id'] ?? null,
            $message['migrate_from_chat_id'] ?? null,
            $this->createDTOFromMessage($message['pinned_message'] ?? null),
            $this->createDTOFromInvoice($message['invoice'] ?? null),
            $this->createDTOFromSuccessfulPayment($message['successful_payment'] ?? null),
            $message['connected_website'] ?? null,
            $this->createDTOFromWriteAccessAllowed($message['write_access_allowed'] ?? null),
            $this->createDTOFromPassportData($message['passport_data'] ?? null),
            $this->createDTOFromProximityAlertTriggered($message['proximity_alert_triggered'] ?? null),
            $this->createDTOFromForumTopicCreated($message['forum_topic_created'] ?? null),
            $this->createDTOFromForumTopicEdited($message['forum_topic_edited'] ?? null),
            $this->createDTOFromForumTopicClosed($message['forum_topic_closed'] ?? null),
            $this->createDTOFromForumTopicReopened($message['forum_topic_reopened'] ?? null),
            $this->createDTOFromGeneralForumTopicHidden($message['general_forum_topic_hidden'] ?? null),
            $this->createDTOFromGeneralForumTopicUnhidden($message['general_forum_topic_unhidden'] ?? null),
            $this->createDTOFromVideoChatScheduled($message['video_chat_scheduled'] ?? null),
            $this->createDTOFromVideoChatStarted($message['video_chat_started'] ?? null),
            $this->createDTOFromVideoChatEnded($message['video_chat_ended'] ?? null),
            $this->createDTOFromVideoChatParticipantsInvited($message['video_chat_participants_invited'] ?? null),
            $this->createDTOFromWebAppData($message['web_app_data'] ?? null),
            $this->createDTOFromInlineKeyboardMarkup($message['reply_markup'] ?? null),
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromUser(?array $user): ?UserDTO
    {
        if (null === $user) {
            return null;
        }

        return new UserDTO(
            $user['id'],
            $user['is_bot'],
            $user['first_name'],
            $user['last_name'] ?? null,
            $user['username'] ?? null,
            $user['language_code'] ?? null,
            $user['is_premium'] ?? null,
            $user['added_to_attachment_menu'] ?? null,
            $user['can_join_groups'] ?? null,
            $user['can_read_all_group_messages'] ?? null,
            $user['supports_inline_queries'] ?? null

        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromChat(?array $chat): ?ChatDTO
    {
        if (null === $chat) {
            return null;
        }

        return new ChatDTO(
            $chat['id'],
            $chat['type'],
            $chat['title'] ?? null,
            $chat['username'] ?? null,
            $chat['first_name'] ?? null,
            $chat['last_name'] ?? null,
            $chat['is_forum'] ?? null,
            $this->createDTOFromChatPhoto($chat['photo'] ?? null),
            $chat['active_usernames'] ?? null,
            $chat['emoji_status_custom_emoji_id'] ?? null,
            $chat['bio'] ?? null,
            $chat['has_private_forwards'] ?? null,
            $chat['has_restricted_voice_and_video_messages'] ?? null,
            $chat['join_to_send_messages'] ?? null,
            $chat['join_by_request'] ?? null,
            $chat['description'] ?? null,
            $chat['invite_link'] ?? null,
            $this->createDTOFromMessage($chat['pinned_message'] ?? null),
            $this->createDTOFromChatPermissions($chat['permissions'] ?? null),
            $chat['slow_mode_delay'] ?? null,
            $chat['message_auto_delete_time'] ?? null,
            $chat['has_aggressive_anti_spam_enabled'] ?? null,
            $chat['has_hidden_members'] ?? null,
            $chat['has_protected_content'] ?? null,
            $chat['sticker_set_name'] ?? null,
            $chat['can_set_sticker_set'] ?? null,
            $chat['linked_chat_id'] ?? null,
            $this->createDTOFromChatLocation($chat['location'] ?? null),
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromChatPhoto(?array $chatPhoto): ?ChatPhotoDTO
    {
        if (null === $chatPhoto) {
            return null;
        }

        return new ChatPhotoDTO(
            $chatPhoto['small_file_id'],
            $chatPhoto['small_file_unique_id'],
            $chatPhoto['big_file_id'],
            $chatPhoto['big_file_unique_id']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromChatPermissions(?array $chatPermissions): ?ChatPermissionsDTO
    {
        if (null === $chatPermissions) {
            return null;
        }

        return new ChatPermissionsDTO(
            $chatPermissions['can_send_messages'],
            $chatPermissions['can_send_media_messages'] ?? null,
            $chatPermissions['can_send_polls'] ?? null,
            $chatPermissions['can_send_other_messages'] ?? null,
            $chatPermissions['can_add_web_page_previews'] ?? null,
            $chatPermissions['can_change_info'] ?? null,
            $chatPermissions['can_invite_users'] ?? null,
            $chatPermissions['can_pin_messages'] ?? null,
            $chatPermissions['can_manage_topics'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromChatLocation(?array $chatLocation): ?ChatLocationDTO
    {
        if (null === $chatLocation) {
            return null;
        }

        return new ChatLocationDTO(
            $this->createDTOFromLocation($chatLocation['location']),
            $chatLocation['address']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromLocation(?array $location): ?LocationDTO
    {
        if (null === $location) {
            return null;
        }

        return new LocationDTO(
            $location['longitude'],
            $location['latitude'],
            $location['horizontal_accuracy'] ?? null,
            $location['live_period'] ?? null,
            $location['heading'] ?? null,
            $location['proximity_alert_radius'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromMessageEntities(?array $messageEntities): ?array
    {
        if (null === $messageEntities) {
            return null;
        }

        return $this->createDTOFromComplexData(
            $messageEntities,
            fn($item): ?MessageEntityDTO => $this->createDTOFromMessageEntity($item)
        );
    }

    /**
     * @param array $data
     * @param callable $callback
     *
     * @return array
     */
    private function createDTOFromComplexData(array $data, callable $callback): array
    {
        return array_reduce(
            $data,
            static function (array $carry, ?array $item) use ($callback): array {
                if (null !== (($result = $callback($item)))) {
                    $carry[] = $result;
                }

                return $carry;
            },
            []
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromMessageEntity(?array $messageEntity): ?MessageEntityDTO
    {
        if (null === $messageEntity) {
            return null;
        }

        return new MessageEntityDTO(
            $messageEntity['type'],
            $messageEntity['offset'],
            $messageEntity['length'],
            $messageEntity['url'] ?? null,
            $this->createDTOFromUser($messageEntity['user'] ?? null),
            $messageEntity['language'] ?? null,
            $messageEntity['custom_emoji_id'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAnimation(?array $animation): ?AnimationDTO
    {
        if (null === $animation) {
            return null;
        }

        return new AnimationDTO(
            $animation['file_id'],
            $animation['file_unique_id'],
            $animation['width'],
            $animation['height'],
            $animation['duration'],
            $this->createDTOFromPhotoSize($animation['thumb'] ?? null),
            $animation['file_name'] ?? null,
            $animation['mime_type'] ?? null,
            $animation['file_size'] ?? null,
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPhotoSize(?array $photoSize): ?PhotoSizeDTO
    {
        if (null === $photoSize) {
            return null;
        }

        return new PhotoSizeDTO(
            $photoSize['file_id'],
            $photoSize['file_unique_id'],
            $photoSize['width'],
            $photoSize['height'],
            $photoSize['file_size'] ?? null,
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAudio(?array $audio): ?AudioDTO
    {
        if (null === $audio) {
            return null;
        }

        return new AudioDTO(
            $audio['file_id'],
            $audio['file_unique_id'],
            $audio['duration'],
            $audio['performer'],
            $audio['title'],
            $audio['file_name'],
            $audio['mime_type'],
            $audio['file_size'],
            $this->createDTOFromPhotoSize($audio['thumb'] ?? null),
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromDocument(?array $document): ?DocumentDTO
    {
        if (null === $document) {
            return null;
        }

        return new DocumentDTO(
            $document['file_id'],
            $document['file_unique_id'],
            $this->createDTOFromPhotoSize($document['thumb'] ?? null),
            $document['file_name'] ?? null,
            $document['mime_type'] ?? null,
            $document['file_size'] ?? null,
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPhotoSizes(?array $photoSizes): ?array
    {
        if (null === $photoSizes) {
            return null;
        }

        return $this->createDTOFromComplexData(
            $photoSizes,
            fn($item): ?PhotoSizeDTO => $this->createDTOFromPhotoSize($item)
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromSticker(?array $sticker): ?StickerDTO
    {
        if (null === $sticker) {
            return null;
        }

        return new StickerDTO(
            $sticker['file_id'],
            $sticker['file_unique_id'],
            $sticker['type'],
            $sticker['width'],
            $sticker['height'],
            $sticker['is_animated'],
            $sticker['is_video'],
            $this->createDTOFromPhotoSize($sticker['thumb'] ?? null),
            $sticker['emoji'] ?? null,
            $sticker['set_name'] ?? null,
            $this->createDTOFromFile($sticker['premium_animation'] ?? null),
            $this->createDTOFromMaskPosition($sticker['mask_position'] ?? null),
            $sticker['custom_emoji_id'] ?? null,
            $sticker['file_size'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromFile(?array $file): ?FileDTO
    {
        if (null === $file) {
            return null;
        }

        return new FileDTO(
            $file['file_id'],
            $file['file_unique_id'],
            $file['file_size'] ?? null,
            $file['file_path'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromMaskPosition(?array $maskPosition): ?MaskPositionDTO
    {
        if (null === $maskPosition) {
            return null;
        }

        return new MaskPositionDTO(
            $maskPosition['point'],
            $maskPosition['x_shift'],
            $maskPosition['y_shift'],
            $maskPosition['scale']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideo(?array $video): ?VideoDTO
    {
        if (null === $video) {
            return null;
        }

        return new VideoDTO(
            $video['file_id'],
            $video['file_unique_id'],
            $video['width'],
            $video['height'],
            $video['duration'],
            $this->createDTOFromPhotoSize($video['thumb'] ?? null),
            $video['file_name'] ?? null,
            $video['mime_type'] ?? null,
            $video['file_size'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoNote(?array $videoNote): ?VideoNoteDTO
    {
        if (null === $videoNote) {
            return null;
        }

        return new VideoNoteDTO(
            $videoNote['file_id'],
            $videoNote['file_unique_id'],
            $videoNote['length'],
            $videoNote['duration'],
            $this->createDTOFromPhotoSize($videoNote['thumb'] ?? null),
            $videoNote['file_size'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVoice(?array $voice): ?VoiceDTO
    {
        if (null === $voice) {
            return null;
        }

        return new VoiceDTO(
            $voice['file_id'],
            $voice['file_unique_id'],
            $voice['duration'],
            $voice['mime_type'] ?? null,
            $voice['file_size'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromContact(?array $contact): ?ContactDTO
    {
        if (null === $contact) {
            return null;
        }

        return new ContactDTO(
            $contact['phone_number'],
            $contact['first_name'],
            $contact['last_name'] ?? null,
            $contact['user_id'] ?? null,
            $contact['vcard'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromDice(?array $dice): ?DiceDTO
    {
        if (null === $dice) {
            return null;
        }

        return new DiceDTO(
            $dice['emoji'],
            $dice['value']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromGame(?array $game): ?GameDTO
    {
        if (null === $game) {
            return null;
        }

        return new GameDTO(
            $game['title'],
            $game['description'],
            $this->createDTOFromPhotoSizes($game['photo']),
            $game['text'] ?? null,
            $this->createDTOFromMessageEntities($game['text_entities'] ?? null),
            $this->createDTOFromAnimation($game['animation'] ?? null)
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPoll(?array $poll): ?PollDTO
    {
        if (null === $poll) {
            return null;
        }

        return new PollDTO(
            $poll['id'],
            $poll['question'],
            $this->createDTOFromPollOptions($poll['options']),
            $poll['total_voter_count'],
            $poll['is_closed'],
            $poll['is_anonymous'],
            $poll['type'],
            $poll['allows_multiple_answers'],
            $poll['correct_option_id'] ?? null,
            $poll['explanation'] ?? null,
            $this->createDTOFromMessageEntities($poll['explanation_entities'] ?? null),
            $poll['open_period'] ?? null,
            $poll['close_date'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPollOptions(?array $pollOptions): ?array
    {
        if (null === $pollOptions) {
            return null;
        }

        return $this->createDTOFromComplexData(
            $pollOptions,
            fn($item): ?PollOptionDTO => $this->createDTOFromPollOption($item)
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPollOption(?array $pollOption): ?PollOptionDTO
    {
        if (null === $pollOption) {
            return null;
        }

        return new PollOptionDTO(
            $pollOption['text'],
            $pollOption['voter_count']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVenue(?array $venue): ?VenueDTO
    {
        if (null === $venue) {
            return null;
        }

        return new VenueDTO(
            $this->createDTOFromLocation($venue['location']),
            $venue['title'],
            $venue['address'],
            $venue['foursquare_id'] ?? null,
            $venue['foursquare_type'] ?? null,
            $venue['google_place_id'] ?? null,
            $venue['google_place_type'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromUsers(?array $users): ?array
    {
        if (null === $users) {
            return null;
        }

        return $this->createDTOFromComplexData($users, fn($item): ?UserDTO => $this->createDTOFromUser($item));
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromMessageAutoDeleteTimerChanged(?int $messageAutoDeleteTimerChanged
    ): ?MessageAutoDeleteTimerChangedDTO {
        if (null === $messageAutoDeleteTimerChanged) {
            return null;
        }

        return new MessageAutoDeleteTimerChangedDTO(
            $messageAutoDeleteTimerChanged
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromInvoice(?array $invoice): ?InvoiceDTO
    {
        if (null === $invoice) {
            return null;
        }

        return new InvoiceDTO(
            $invoice['title'],
            $invoice['description'],
            $invoice['start_parameter'],
            $invoice['currency'],
            $invoice['total_amount']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromSuccessfulPayment(?array $successfulPayment): ?SuccessfulPaymentDTO
    {
        if (null === $successfulPayment) {
            return null;
        }

        return new SuccessfulPaymentDTO(
            $successfulPayment['currency'],
            $successfulPayment['total_amount'],
            $successfulPayment['invoice_payload'],
            $successfulPayment['shipping_option_id'] ?? null,
            $this->createDTOFromOrderInfo($successfulPayment['order_info'] ?? null),
            $successfulPayment['telegram_payment_charge_id'],
            $successfulPayment['provider_payment_charge_id']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromOrderInfo(?array $orderInfo): ?OrderInfoDTO
    {
        if (null === $orderInfo) {
            return null;
        }

        return new OrderInfoDTO(
            $orderInfo['name'] ?? null,
            $orderInfo['phone_number'] ?? null,
            $orderInfo['email'] ?? null,
            $this->createDTOFromShippingAddress($orderInfo['shipping_address'] ?? null)
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromShippingAddress(?array $shippingAddress): ?ShippingAddressDTO
    {
        if (null === $shippingAddress) {
            return null;
        }

        return new ShippingAddressDTO(
            $shippingAddress['country_code'],
            $shippingAddress['state'],
            $shippingAddress['city'],
            $shippingAddress['street_line1'],
            $shippingAddress['street_line2'],
            $shippingAddress['post_code']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromWriteAccessAllowed(?array $writeAccessAllowed): ?WriteAccessAllowedDTO
    {
        if (null === $writeAccessAllowed) {
            return null;
        }

        return new WriteAccessAllowedDTO($writeAccessAllowed);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPassportData(?array $passportData): ?PassportDataDTO
    {
        if (null === $passportData) {
            return null;
        }

        return new PassportDataDTO(
            $this->createDTOFromEncryptedPassportElements($passportData['data']),
            $this->createDTOFromEncryptedCredentials($passportData['credentials'])
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromEncryptedPassportElements(?array $encryptedPassportElements): ?array
    {
        if (null === $encryptedPassportElements) {
            return null;
        }

        return $this->createDTOFromComplexData(
            $encryptedPassportElements,
            fn($item): ?EncryptedPassportElementDTO => $this->createDTOFromEncryptedPassportElement($item)
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromEncryptedPassportElement(
        ?array $encryptedPassportElement
    ): ?EncryptedPassportElementDTO {
        if (null === $encryptedPassportElement) {
            return null;
        }

        return new EncryptedPassportElementDTO(
            $encryptedPassportElement['type'],
            $encryptedPassportElement['data'] ?? null,
            $encryptedPassportElement['phone_number'] ?? null,
            $encryptedPassportElement['email'] ?? null,
            $this->createDTOFromPassportFiles($encryptedPassportElement['files'] ?? null),
            $this->createDTOFromPassportFile($encryptedPassportElement['front_side'] ?? null),
            $this->createDTOFromPassportFile($encryptedPassportElement['reverse_side'] ?? null),
            $this->createDTOFromPassportFile($encryptedPassportElement['selfie'] ?? null),
            $this->createDTOFromPassportFiles($encryptedPassportElement['translation'] ?? null),
            $encryptedPassportElement['hash'],
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPassportFiles(?array $passportFiles): ?array
    {
        if (null === $passportFiles) {
            return null;
        }

        return $this->createDTOFromComplexData(
            $passportFiles,
            fn($item): ?PassportFileDTO => $this->createDTOFromPassportFile($item)
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPassportFile(?array $passportFile): ?PassportFileDTO
    {
        if (null === $passportFile) {
            return null;
        }

        return new PassportFileDTO(
            $passportFile['file_id'],
            $passportFile['file_unique_id'],
            $passportFile['file_size'],
            $passportFile['file_date'],
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromEncryptedCredentials(?array $encryptedCredentials): ?EncryptedCredentialsDTO
    {
        if (null === $encryptedCredentials) {
            return null;
        }

        return new EncryptedCredentialsDTO(
            $encryptedCredentials['data'],
            $encryptedCredentials['hash'],
            $encryptedCredentials['secret']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromProximityAlertTriggered(?array $proximityAlertTriggered): ?ProximityAlertTriggeredDTO
    {
        if (null === $proximityAlertTriggered) {
            return null;
        }

        return new ProximityAlertTriggeredDTO(
            $this->createDTOFromUser($proximityAlertTriggered['traveler']),
            $this->createDTOFromUser($proximityAlertTriggered['watcher']),
            $proximityAlertTriggered['distance']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromForumTopicCreated(?array $forumTopicCreated): ?ForumTopicCreatedDTO
    {
        if (null === $forumTopicCreated) {
            return null;
        }

        return new ForumTopicCreatedDTO(
            $forumTopicCreated['name'],
            $forumTopicCreated['icon_color'],
            $forumTopicCreated['icon_custom_emoji_id'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromForumTopicEdited(?array $forumTopicEdited): ?ForumTopicEditedDTO
    {
        if (null === $forumTopicEdited) {
            return null;
        }

        return new ForumTopicEditedDTO(
            $forumTopicEdited['name'] ?? null,
            $forumTopicEdited['icon_custom_emoji_id'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromForumTopicClosed(?array $forumTopicClosed): ?ForumTopicClosedDTO
    {
        if (null === $forumTopicClosed) {
            return null;
        }

        return new ForumTopicClosedDTO($forumTopicClosed);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromForumTopicReopened(?array $forumTopicReopened): ?ForumTopicReopenedDTO
    {
        if (null === $forumTopicReopened) {
            return null;
        }

        return new ForumTopicReopenedDTO($forumTopicReopened);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromGeneralForumTopicHidden(?array $generalForumTopicHidden): ?GeneralForumTopicHiddenDTO
    {
        if (null === $generalForumTopicHidden) {
            return null;
        }

        return new GeneralForumTopicHiddenDTO($generalForumTopicHidden);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromGeneralForumTopicUnhidden(
        ?array $generalForumTopicUnhidden
    ): ?GeneralForumTopicUnhiddenDTO {
        if (null === $generalForumTopicUnhidden) {
            return null;
        }

        return new GeneralForumTopicUnhiddenDTO($generalForumTopicUnhidden);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoChatScheduled(?array $videoChatScheduled): ?VideoChatScheduledDTO
    {
        if (null === $videoChatScheduled) {
            return null;
        }

        return new VideoChatScheduledDTO($videoChatScheduled['start_date']);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoChatStarted(?array $videoChatStarted): ?VideoChatStartedDTO
    {
        if (null === $videoChatStarted) {
            return null;
        }

        return new VideoChatStartedDTO($videoChatStarted);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoChatEnded(?array $videoChatEnded): ?VideoChatEndedDTO
    {
        if (null === $videoChatEnded) {
            return null;
        }

        return new VideoChatEndedDTO($videoChatEnded['duration']);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoChatParticipantsInvited(
        ?array $videoChatParticipantsInvited
    ): ?VideoChatParticipantsInvitedDTO {
        if (null === $videoChatParticipantsInvited) {
            return null;
        }

        return new VideoChatParticipantsInvitedDTO($this->createDTOFromUsers($videoChatParticipantsInvited['users']));
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromWebAppData(?array $webAppData): ?WebAppDataDTO
    {
        if (null === $webAppData) {
            return null;
        }

        return new WebAppDataDTO(
            $webAppData['data'],
            $webAppData['button_text']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromInlineKeyboardMarkup(?array $inlineKeyboardMarkup): ?InlineKeyboardMarkupDTO
    {
        if (null === $inlineKeyboardMarkup) {
            return null;
        }

        return new InlineKeyboardMarkupDTO(
            $this->createDTOFromInlineKeyboardButtons($inlineKeyboardMarkup)
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromInlineKeyboardButtons(?array $inlineKeyboardButtons): ?array
    {
        if (null === $inlineKeyboardButtons) {
            return null;
        }

        return $this->createDTOFromComplexData(
            $inlineKeyboardButtons,
            fn($item): ?InlineKeyboardButtonDTO => $this->createDTOFromInlineKeyboardButton($item)
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromInlineKeyboardButton(?array $inlineKeyboardButton): ?InlineKeyboardButtonDTO
    {
        if (null === $inlineKeyboardButton) {
            return null;
        }

        return new InlineKeyboardButtonDTO(
            $inlineKeyboardButton['text'],
            $inlineKeyboardButton['url'] ?? null,
            $inlineKeyboardButton['callback_data'] ?? null,
            $this->createDTOFromWebAppInfo($inlineKeyboardButton['web_app'] ?? null),
            $this->createDTOFromLoginUrl($inlineKeyboardButton['login_url'] ?? null),
            $inlineKeyboardButton['switch_inline_query'] ?? null,
            $inlineKeyboardButton['switch_inline_query_current_chat'] ?? null,
            $this->createDTOFromCallbackGame($inlineKeyboardButton['callback_game'] ?? null),
            $inlineKeyboardButton['pay'] ?? null

        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromWebAppInfo(?array $webAppInfo): ?WebAppInfoDTO
    {
        if (null === $webAppInfo) {
            return null;
        }

        return new WebAppInfoDTO($webAppInfo['url']);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromLoginUrl(?array $loginUrl): ?LoginUrlDTO
    {
        if (null === $loginUrl) {
            return null;
        }

        return new LoginUrlDTO(
            $loginUrl['url'],
            $loginUrl['forward_text'] ?? null,
            $loginUrl['bot_username'] ?? null,
            $loginUrl['request_write_access'] ?? null,
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromCallbackGame(?array $callbackGame): ?CallbackGameDTO
    {
        if (null === $callbackGame) {
            return null;
        }

        return new CallbackGameDTO($callbackGame);
    }
}
