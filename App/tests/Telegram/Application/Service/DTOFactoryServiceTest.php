<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Application\Service;

use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\Telegram\Domain\DTO\AnimationDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\AudioDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\CallbackGameDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ChatDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ChatLocationDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ChatPermissionsDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ChatPhotoDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ContactDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\DiceDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\DocumentDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\EncryptedCredentialsDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\EncryptedPassportElementDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\FileDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ForumTopicClosedDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ForumTopicCreatedDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ForumTopicEditedDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ForumTopicReopenedDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\GameDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\GeneralForumTopicHiddenDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\GeneralForumTopicUnhiddenDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\InlineKeyboardButtonDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\InlineKeyboardMarkupDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\InvoiceDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\LocationDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\LoginUrlDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\MaskPositionDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\MessageAutoDeleteTimerChangedDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\MessageDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\MessageEntityDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\OrderInfoDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\PassportDataDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\PassportFileDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\PhotoSizeDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\PollDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\PollOptionDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ProximityAlertTriggeredDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\ShippingAddressDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\StickerDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\SuccessfulPaymentDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\UserDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\VenueDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\VideoChatEndedDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\VideoChatParticipantsInvitedDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\VideoChatScheduledDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\VideoChatStartedDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\VideoDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\VideoNoteDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\VoiceDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\WebAppDataDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\WebAppInfoDTOTest;
use Test\XGuard\Bot\Telegram\Domain\DTO\WriteAccessAllowedDTOTest;
use Throwable;

/**
 *
 */
final class DTOFactoryServiceTest extends TestCase
{


    /**
     * @var string|null
     */
    private ?string $name;


    /**
     * @var array
     */
    private array $data;


    /**
     * @var mixed|string
     */
    private mixed $dataName;


    /**
     * @param string|null $name
     * @param array       $data
     * @param mixed       $dataName
     */
    public function __construct(?string $name = null, array $data = [], mixed $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->name     = 'testConstruct';
        $this->data     = $data;
        $this->dataName = $dataName;
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMessage(): void
    {
        (new MessageDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromUser(): void
    {
        (new UserDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromChat(): void
    {
        (new ChatDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMessageEntities(): void
    {
        (new MessageEntityDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMessageEntity(): void
    {
        (new MessageEntityDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAnimation(): void
    {
        (new AnimationDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAudio(): void
    {
        (new AudioDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromDocument(): void
    {
        (new DocumentDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPhotoSizes(): void
    {
        (new PhotoSizeDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPhotoSize(): void
    {
        (new PhotoSizeDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromSticker(): void
    {
        (new StickerDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideo(): void
    {
        (new VideoDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoNote(): void
    {
        (new VideoNoteDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVoice(): void
    {
        (new VoiceDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromContact(): void
    {
        (new ContactDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromDice(): void
    {
        (new DiceDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromGame(): void
    {
        (new GameDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPoll(): void
    {
        (new PollDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVenue(): void
    {
        (new VenueDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromLocation(): void
    {
        (new LocationDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromUsers(): void
    {
        (new UserDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMessageAutoDeleteTimerChanged(): void
    {
        (new MessageAutoDeleteTimerChangedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromInvoice(): void
    {
        (new InvoiceDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromSuccessfulPayment(): void
    {
        (new SuccessfulPaymentDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromWriteAccessAllowed(): void
    {
        (new WriteAccessAllowedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPassportData(): void
    {
        (new PassportDataDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromProximityAlertTriggered(): void
    {
        (new ProximityAlertTriggeredDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromForumTopicCreated(): void
    {
        (new ForumTopicCreatedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromForumTopicEdited(): void
    {
        (new ForumTopicEditedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromForumTopicClosed(): void
    {
        (new ForumTopicClosedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromForumTopicReopened(): void
    {
        (new ForumTopicReopenedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromGeneralForumTopicHidden(): void
    {
        (new GeneralForumTopicHiddenDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromGeneralForumTopicUnhidden(): void
    {
        (new GeneralForumTopicUnhiddenDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoChatScheduled(): void
    {
        (new VideoChatScheduledDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoChatStarted(): void
    {
        (new VideoChatStartedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoChatEnded(): void
    {
        (new VideoChatEndedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoChatParticipantsInvited(): void
    {
        (new VideoChatParticipantsInvitedDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromWebAppData(): void
    {
        (new WebAppDataDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromInlineKeyboardMarkup(): void
    {
        (new InlineKeyboardMarkupDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromInlineKeyboardButtons(): void
    {
        (new InlineKeyboardButtonDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromInlineKeyboardButton(): void
    {
        (new InlineKeyboardButtonDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromChatPhoto(): void
    {
        (new ChatPhotoDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromChatPermissions(): void
    {
        (new ChatPermissionsDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromChatLocation(): void
    {
        (new ChatLocationDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromFile(): void
    {
        (new FileDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMaskPosition(): void
    {
        (new MaskPositionDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPollOptions(): void
    {
        (new PollOptionDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPollOption(): void
    {
        (new PollOptionDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromOrderInfo(): void
    {
        (new OrderInfoDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromEncryptedPassportElements(): void
    {
        (new EncryptedPassportElementDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromEncryptedPassportElement(): void
    {
        (new EncryptedPassportElementDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromEncryptedCredentials(): void
    {
        (new EncryptedCredentialsDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromWebAppInfo(): void
    {
        (new WebAppInfoDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromLoginUrl(): void
    {
        (new LoginUrlDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromCallbackGame(): void
    {
        (new CallbackGameDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromShippingAddress(): void
    {
        (new ShippingAddressDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPassportFiles(): void
    {
        (new PassportFileDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPassportFile(): void
    {
        (new PassportFileDTOTest($this->name, $this->data, $this->dataName))->runTest();
    }
}
