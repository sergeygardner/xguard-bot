<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\Entity;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Telegram\Domain\Entity\BotEntity;

/**
 *
 */
final class BotEntityTest extends TestCase
{

    /**
     * @var BotEntity|null
     */
    private ?BotEntity $botEntity;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        $this->botEntity = new BotEntity(
            UuidValueObject::generate(),
            new TokenValueObject('token'),
            new BotNameValueObject('bot_name'),
        );
    }

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject($this->botEntity);
    }

    /**
     * @return void
     */
    public function testGetId(): void
    {
        self::assertInstanceOf(UuidValueObject::class, $this->botEntity->getId());
    }

    /**
     * @return void
     */
    public function testGetToken(): void
    {
        self::assertInstanceOf(TokenValueObject::class, $this->botEntity->getToken());
    }

    /**
     * @return void
     */
    public function testSetToken(): void
    {
        $token = $this->botEntity->getToken();

        $this->botEntity->setToken(new TokenValueObject('token2'));

        self::assertNotEquals($token, $this->botEntity->getToken());
    }

    /**
     * @return void
     */
    public function testSetName(): void
    {
        $name = $this->botEntity->getName();

        $this->botEntity->setName(new BotNameValueObject('bot_name2'));

        self::assertNotEquals($name, $this->botEntity->getName());
    }

    /**
     * @return void
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        self::assertJson(json_encode($this->botEntity, JSON_THROW_ON_ERROR));
    }
}
