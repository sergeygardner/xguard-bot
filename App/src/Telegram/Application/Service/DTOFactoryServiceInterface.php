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
interface DTOFactoryServiceInterface
{

    /**
     * @param array $message
     *
     * @return MessageDTO|null
     */
    public function createDTOFromMessage(array $message): ?MessageDTO;

    /**
     * @param array|null $user
     *
     * @return UserDTO|null
     */
    public function createDTOFromUser(?array $user): ?UserDTO;

    /**
     * @param array|null $chat
     *
     * @return ChatDTO|null
     */
    public function createDTOFromChat(?array $chat): ?ChatDTO;

    /**
     * @param array|null $messageEntities
     *
     * @return array|null
     */
    public function createDTOFromMessageEntities(?array $messageEntities): ?array;

    /**
     * @param array|null $messageEntity
     *
     * @return MessageEntityDTO|null
     */
    public function createDTOFromMessageEntity(?array $messageEntity): ?MessageEntityDTO;

    /**
     * @param array|null $animation
     *
     * @return AnimationDTO|null
     */
    public function createDTOFromAnimation(?array $animation): ?AnimationDTO;

    /**
     * @param array|null $audio
     *
     * @return AudioDTO|null
     */
    public function createDTOFromAudio(?array $audio): ?AudioDTO;

    /**
     * @param array|null $document
     *
     * @return DocumentDTO|null
     */
    public function createDTOFromDocument(?array $document): ?DocumentDTO;

    /**
     * @param array|null $photoSizes
     *
     * @return array|null
     */
    public function createDTOFromPhotoSizes(?array $photoSizes): ?array;

    /**
     * @param array|null $photoSize
     *
     * @return PhotoSizeDTO|null
     */
    public function createDTOFromPhotoSize(?array $photoSize): ?PhotoSizeDTO;

    /**
     * @param array|null $sticker
     *
     * @return StickerDTO|null
     */
    public function createDTOFromSticker(?array $sticker): ?StickerDTO;

    /**
     * @param array|null $video
     *
     * @return VideoDTO|null
     */
    public function createDTOFromVideo(?array $video): ?VideoDTO;

    /**
     * @param array|null $videoNote
     *
     * @return VideoNoteDTO|null
     */
    public function createDTOFromVideoNote(?array $videoNote): ?VideoNoteDTO;

    /**
     * @param array|null $voice
     *
     * @return VoiceDTO|null
     */
    public function createDTOFromVoice(?array $voice): ?VoiceDTO;

    /**
     * @param array|null $contact
     *
     * @return ContactDTO|null
     */
    public function createDTOFromContact(?array $contact): ?ContactDTO;

    /**
     * @param array|null $dice
     *
     * @return DiceDTO|null
     */
    public function createDTOFromDice(?array $dice): ?DiceDTO;

    /**
     * @param array|null $game
     *
     * @return GameDTO|null
     */
    public function createDTOFromGame(?array $game): ?GameDTO;

    /**
     * @param array|null $poll
     *
     * @return PollDTO|null
     */
    public function createDTOFromPoll(?array $poll): ?PollDTO;

    /**
     * @param array|null $venue
     *
     * @return VenueDTO|null
     */
    public function createDTOFromVenue(?array $venue): ?VenueDTO;

    /**
     * @param array|null $location
     *
     * @return LocationDTO|null
     */
    public function createDTOFromLocation(?array $location): ?LocationDTO;

    /**
     * @param array|null $users
     *
     * @return array|null
     */
    public function createDTOFromUsers(?array $users): ?array;

    /**
     * @param int|null $messageAutoDeleteTimerChanged
     *
     * @return MessageAutoDeleteTimerChangedDTO|null
     */
    public function createDTOFromMessageAutoDeleteTimerChanged(?int $messageAutoDeleteTimerChanged
    ): ?MessageAutoDeleteTimerChangedDTO;

    /**
     * @param array|null $invoice
     *
     * @return InvoiceDTO|null
     */
    public function createDTOFromInvoice(?array $invoice): ?InvoiceDTO;

    /**
     * @param array|null $successfulPayment
     *
     * @return SuccessfulPaymentDTO|null
     */
    public function createDTOFromSuccessfulPayment(?array $successfulPayment): ?SuccessfulPaymentDTO;

    /**
     * @param array|null $writeAccessAllowed
     *
     * @return WriteAccessAllowedDTO|null
     */
    public function createDTOFromWriteAccessAllowed(?array $writeAccessAllowed): ?WriteAccessAllowedDTO;

    /**
     * @param array|null $passportData
     *
     * @return PassportDataDTO|null
     */
    public function createDTOFromPassportData(?array $passportData): ?PassportDataDTO;

    /**
     * @param array|null $proximityAlertTriggered
     *
     * @return ProximityAlertTriggeredDTO|null
     */
    public function createDTOFromProximityAlertTriggered(?array $proximityAlertTriggered): ?ProximityAlertTriggeredDTO;

    /**
     * @param array|null $forumTopicCreated
     *
     * @return ForumTopicCreatedDTO|null
     */
    public function createDTOFromForumTopicCreated(?array $forumTopicCreated): ?ForumTopicCreatedDTO;

    /**
     * @param array|null $forumTopicEdited
     *
     * @return ForumTopicEditedDTO|null
     */
    public function createDTOFromForumTopicEdited(?array $forumTopicEdited): ?ForumTopicEditedDTO;

    /**
     * @param array|null $forumTopicClosed
     *
     * @return ForumTopicClosedDTO|null
     */
    public function createDTOFromForumTopicClosed(?array $forumTopicClosed): ?ForumTopicClosedDTO;

    /**
     * @param array|null $forumTopicReopened
     *
     * @return ForumTopicReopenedDTO|null
     */
    public function createDTOFromForumTopicReopened(?array $forumTopicReopened): ?ForumTopicReopenedDTO;

    /**
     * @param array|null $generalForumTopicHidden
     *
     * @return GeneralForumTopicHiddenDTO|null
     */
    public function createDTOFromGeneralForumTopicHidden(?array $generalForumTopicHidden): ?GeneralForumTopicHiddenDTO;

    /**
     * @param array|null $generalForumTopicUnhidden
     *
     * @return GeneralForumTopicUnhiddenDTO|null
     */
    public function createDTOFromGeneralForumTopicUnhidden(?array $generalForumTopicUnhidden
    ): ?GeneralForumTopicUnhiddenDTO;

    /**
     * @param array|null $videoChatScheduled
     *
     * @return VideoChatScheduledDTO|null
     */
    public function createDTOFromVideoChatScheduled(?array $videoChatScheduled): ?VideoChatScheduledDTO;

    /**
     * @param array|null $videoChatStarted
     *
     * @return VideoChatStartedDTO|null
     */
    public function createDTOFromVideoChatStarted(?array $videoChatStarted): ?VideoChatStartedDTO;

    /**
     * @param array|null $videoChatEnded
     *
     * @return VideoChatEndedDTO|null
     */
    public function createDTOFromVideoChatEnded(?array $videoChatEnded): ?VideoChatEndedDTO;

    /**
     * @param array|null $videoChatParticipantsInvited
     *
     * @return VideoChatParticipantsInvitedDTO|null
     */
    public function createDTOFromVideoChatParticipantsInvited(?array $videoChatParticipantsInvited
    ): ?VideoChatParticipantsInvitedDTO;

    /**
     * @param array|null $webAppData
     *
     * @return WebAppDataDTO|null
     */
    public function createDTOFromWebAppData(?array $webAppData): ?WebAppDataDTO;

    /**
     * @param array|null $inlineKeyboardMarkup
     *
     * @return InlineKeyboardMarkupDTO|null
     */
    public function createDTOFromInlineKeyboardMarkup(?array $inlineKeyboardMarkup): ?InlineKeyboardMarkupDTO;

    /**
     * @param array|null $inlineKeyboardButtons
     *
     * @return InlineKeyboardButtonDTO[][]|null
     */
    public function createDTOFromInlineKeyboardButtons(?array $inlineKeyboardButtons): ?array;

    /**
     * @param array|null $inlineKeyboardButton
     *
     * @return InlineKeyboardButtonDTO|null
     */
    public function createDTOFromInlineKeyboardButton(?array $inlineKeyboardButton): ?InlineKeyboardButtonDTO;

    /**
     * @param array $chatPhoto
     *
     * @return ChatPhotoDTO|null
     */
    public function createDTOFromChatPhoto(array $chatPhoto): ?ChatPhotoDTO;

    /**
     * @param array $chatPermissions
     *
     * @return ChatPermissionsDTO|null
     */
    public function createDTOFromChatPermissions(array $chatPermissions): ?ChatPermissionsDTO;

    /**
     * @param array $chatLocation
     *
     * @return ChatLocationDTO|null
     */
    public function createDTOFromChatLocation(array $chatLocation): ?ChatLocationDTO;

    /**
     * @param array|null $file
     *
     * @return FileDTO|null
     */
    public function createDTOFromFile(?array $file): ?FileDTO;

    /**
     * @param array|null $maskPosition
     *
     * @return MaskPositionDTO|null
     */
    public function createDTOFromMaskPosition(?array $maskPosition): ?MaskPositionDTO;

    /**
     * @param array|null $pollOptions
     *
     * @return array|null
     */
    public function createDTOFromPollOptions(?array $pollOptions): ?array;

    /**
     * @param array|null $pollOption
     *
     * @return PollOptionDTO|null
     */
    public function createDTOFromPollOption(?array $pollOption): ?PollOptionDTO;

    /**
     * @param array|null $orderInfo
     *
     * @return OrderInfoDTO|null
     */
    public function createDTOFromOrderInfo(?array $orderInfo): ?OrderInfoDTO;

    /**
     * @param array|null $encryptedPassportElements
     *
     * @return array|null
     */
    public function createDTOFromEncryptedPassportElements(?array $encryptedPassportElements): ?array;

    /**
     * @param array|null $encryptedPassportElement
     *
     * @return EncryptedPassportElementDTO|null
     */
    public function createDTOFromEncryptedPassportElement(
        ?array $encryptedPassportElement
    ): ?EncryptedPassportElementDTO;

    /**
     * @param array|null $encryptedCredentials
     *
     * @return EncryptedCredentialsDTO|null
     */
    public function createDTOFromEncryptedCredentials(?array $encryptedCredentials): ?EncryptedCredentialsDTO;

    /**
     * @param array|null $webAppInfo
     *
     * @return WebAppInfoDTO|null
     */
    public function createDTOFromWebAppInfo(?array $webAppInfo): ?WebAppInfoDTO;

    /**
     * @param array|null $loginUrl
     *
     * @return LoginUrlDTO|null
     */
    public function createDTOFromLoginUrl(?array $loginUrl): ?LoginUrlDTO;

    /**
     * @param array|null $callbackGame
     *
     * @return CallbackGameDTO|null
     */
    public function createDTOFromCallbackGame(?array $callbackGame): ?CallbackGameDTO;

    /**
     * @param array|null $shippingAddress
     *
     * @return ShippingAddressDTO|null
     */
    public function createDTOFromShippingAddress(?array $shippingAddress): ?ShippingAddressDTO;

    /**
     * @param array|null $passportFiles
     *
     * @return PassportFileDTO[]|null
     */
    public function createDTOFromPassportFiles(?array $passportFiles): ?array;

    /**
     * @param array|null $passportFile
     *
     * @return PassportFileDTO|null
     */
    public function createDTOFromPassportFile(?array $passportFile): ?PassportFileDTO;
}
