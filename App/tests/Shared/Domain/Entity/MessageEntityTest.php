<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\Entity\MessageEntity;
use XGuard\Bot\Shared\Domain\ValueObject\TextValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
class MessageEntityTest extends TestCase
{

    /**
     * @var MessageEntity|null
     */
    private ?MessageEntity $messageEntity;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->messageEntity = new MessageEntity(
            UuidValueObject::generate(),
            new DateTimeImmutable,
            UuidValueObject::generate(),
            new TextValueObject('text')
        );
    }

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject($this->messageEntity);
    }

    /**
     * @return void
     */
    public function testGetId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->messageEntity->getId());
    }

    /**
     * @return void
     */
    public function testGetDateCreate(): void
    {
        self::assertInstanceOf(DateTimeInterface::class, $this->messageEntity->getDateCreate());
    }

    /**
     * @return void
     */
    public function testGetChannel(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->messageEntity->getChannel());
    }

    /**
     * @return void
     */
    public function testGetText(): void
    {
        self::assertInstanceOf(TextValueObject::class, $this->messageEntity->getText());
    }

    /**
     * @return void
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        self::assertJson(json_encode($this->messageEntity, JSON_THROW_ON_ERROR));
    }
}
