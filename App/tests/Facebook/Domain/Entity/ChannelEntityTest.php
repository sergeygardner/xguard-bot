<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\Entity;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Facebook\Domain\ValueObject\ChannelIdValueObject;
use XGuard\Bot\Facebook\Domain\ValueObject\TypeValueObject;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

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
            new ChannelIdValueObject('channel_id'),
            new ChannelNameValueObject('channel_name'),
            new TypeValueObject('group'),
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
    public function testGetChannelId(): void
    {
        self::assertInstanceOf(ChannelIdValueObject::class, $this->channelEntity->getChannelId());
    }

    /**
     * @return void
     */
    public function testSetChannelId(): void
    {
        $channelId = $this->channelEntity->getChannelId();

        $this->channelEntity->setChannelId(new ChannelIdValueObject('channel_id2'));

        self::assertNotEquals($channelId, $this->channelEntity->getChannelId());
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
     */
    public function testSetType(): void
    {
        $type = $this->channelEntity->getType();

        $this->channelEntity->setType(new TypeValueObject('user'));

        self::assertNotEquals($type, $this->channelEntity->getType());

        $type = $this->channelEntity->getType();

        $this->channelEntity->setType(new TypeValueObject('page'));

        self::assertNotEquals($type, $this->channelEntity->getType());

        $this->expectException(InvalidObjectValueException::class);

        $type = $this->channelEntity->getType();

        $this->channelEntity->setType(new TypeValueObject('wrong_type'));

        self::assertNotEquals($type, $this->channelEntity->getType());
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
