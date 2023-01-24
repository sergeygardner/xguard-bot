<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\Entity;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\Entity\ChannelToBotEntity;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
final class ChannelToBotEntityTest extends TestCase
{

    /**
     * @var ChannelToBotEntity|null
     */
    private ?ChannelToBotEntity $channelToBotEntity;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->channelToBotEntity = new ChannelToBotEntity(
            UuidValueObject::generate(),
            UuidValueObject::generate(),
            UuidValueObject::generate(),
        );
    }

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject($this->channelToBotEntity);
    }

    /**
     * @return void
     */
    public function testGetId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->channelToBotEntity->getId());
    }

    /**
     * @return void
     */
    public function testGetChannelId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->channelToBotEntity->getChannelId());
    }

    /**
     * @return void
     */
    public function testSetChannelId(): void
    {
        $channelId = $this->channelToBotEntity->getChannelId();

        $this->channelToBotEntity->setChannelId(UuidValueObject::generate());

        self::assertNotEquals($channelId, $this->channelToBotEntity->getChannelId());
    }

    /**
     * @return void
     */
    public function testGetBotId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->channelToBotEntity->getBotId());
    }

    /**
     * @return void
     */
    public function testSetBotId(): void
    {
        $botId = $this->channelToBotEntity->getBotId();

        $this->channelToBotEntity->setBotId(UuidValueObject::generate());

        self::assertNotEquals($botId, $this->channelToBotEntity->getBotId());
    }

    /**
     * @return void
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        self::assertJson(json_encode($this->channelToBotEntity, JSON_THROW_ON_ERROR));
    }
}
