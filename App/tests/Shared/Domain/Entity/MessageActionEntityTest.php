<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\Entity\MessageActionEntity;
use XGuard\Bot\Shared\Domain\ValueObject\ActionValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
final class MessageActionEntityTest extends TestCase
{

    /**
     * @var MessageActionEntity|null
     */
    private ?MessageActionEntity $messageActionEntity;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->messageActionEntity = new MessageActionEntity(
            UuidValueObject::generate(),
            UuidValueObject::generate(),
            UuidValueObject::generate(),
            new DateTimeImmutable,
            ActionValueObject::createOpen()
        );
    }

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject($this->messageActionEntity);
    }

    /**
     * @return void
     */
    public function testGetId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->messageActionEntity->getId());
    }

    /**
     * @return void
     */
    public function testGetMessageId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->messageActionEntity->getMessageId());
    }

    /**
     * @return void
     */
    public function testGetChannelToBotId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->messageActionEntity->getChannelToBotId());
    }

    /**
     * @return void
     */
    public function testGetActionDate(): void
    {
        self::assertInstanceOf(DateTimeInterface::class, $this->messageActionEntity->getActionDate());
    }

    /**
     * @return void
     */
    public function testSetActionDate(): void
    {
        $actionDate = $this->messageActionEntity->getActionDate();

        $this->messageActionEntity->setActionDate(new DateTimeImmutable('-1day'));

        self::assertNotEquals($actionDate, $this->messageActionEntity->getActionDate());
    }

    /**
     * @return void
     */
    public function testGetAction(): void
    {
        self::assertInstanceOf(ActionValueObject::class, $this->messageActionEntity->getAction());
    }

    /**
     * @return void
     */
    public function testSetAction(): void
    {
        $action = $this->messageActionEntity->getAction();

        $this->messageActionEntity->setAction(ActionValueObject::createSent());

        self::assertNotEquals($action, $this->messageActionEntity->getAction());
    }

    /**
     * @return void
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        self::assertJson(json_encode($this->messageActionEntity, JSON_THROW_ON_ERROR));
    }
}
