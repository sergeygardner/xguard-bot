<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\Entity;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\Entity\BotEntity;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientIdValueObject;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientSecretValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

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
            new ClientIdValueObject('client_id'),
            new ClientSecretValueObject('client_secret'),
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
    public function testGetClientId(): void
    {
        self::assertInstanceOf(ClientIdValueObject::class, $this->botEntity->getClientId());
    }

    /**
     * @return void
     */
    public function testSetClientId(): void
    {
        $clientId = $this->botEntity->getClientId();

        $this->botEntity->setClientId(new ClientIdValueObject('client_id2'));

        self::assertNotEquals($clientId, $this->botEntity->getClientId());
    }

    /**
     * @return void
     */
    public function testGetClientSecret(): void
    {
        self::assertInstanceOf(ClientSecretValueObject::class, $this->botEntity->getClientSecret());
    }

    /**
     * @return void
     */
    public function testSetClientSecret(): void
    {
        $clientSecret = $this->botEntity->getClientSecret();

        $this->botEntity->setClientSecret(new ClientSecretValueObject('client_secret2'));

        self::assertNotEquals($clientSecret, $this->botEntity->getClientSecret());
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
