<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\Entity;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Telegram\Domain\Entity\ChannelEntity;
use XGuard\Bot\Telegram\Domain\ValueObject\ChatIdValueObject;

/**
 *
 */
final class ChannelEntityTest extends TestCase
{

    /**
     * @var ChannelEntity|null
     */
    private ?ChannelEntity $channelEntity;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->channelEntity = new ChannelEntity(
            UuidValueObject::generate(),
            new ChatIdValueObject('chat_id'),
            new ChannelNameValueObject('channel_name')
        );
    }

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject($this->channelEntity);
    }

    /**
     * @return void
     */
    public function testGetId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->channelEntity->getId());
    }

    /**
     * @return void
     */
    public function testGetChatId(): void
    {
        self::assertInstanceOf(ChatIdValueObject::class, $this->channelEntity->getChatId());
    }

    /**
     * @return void
     */
    public function testSetChatId(): void
    {
        $chatId = $this->channelEntity->getChatId();

        $this->channelEntity->setChatId(new ChatIdValueObject('chat_id2'));

        self::assertNotEquals($chatId, $this->channelEntity->getChatId());
    }

    /**
     * @return void
     */
    public function testGetName(): void
    {
        self::assertInstanceOf(ChannelNameValueObject::class, $this->channelEntity->getName());
    }

    /**
     * @return void
     */
    public function testSetName(): void
    {
        $channelName = $this->channelEntity->getName();

        $this->channelEntity->setName(new ChannelNameValueObject('channel_name2'));

        self::assertNotEquals($channelName, $this->channelEntity->getName());
    }

    /**
     * @return void
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        self::assertJson(json_encode($this->channelEntity, JSON_THROW_ON_ERROR));
    }
}
