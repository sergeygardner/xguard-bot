<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Telegram\Domain\ValueObject\ChatIdValueObject;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types\ChatIdType;

/**
 *
 */
final class ChatIdTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {


        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $chatIdType       = new ChatIdType();
        self::assertIsObject($chatIdType);
        self::assertNotEmpty($chatIdType->getName());
        self::assertNotEmpty($chatIdType->getBindingType());
        self::assertNotEmpty(
            $chatIdType->convertToDatabaseValue(new ChatIdValueObject('chatId'), $databasePlatform)
        );
        self::assertInstanceOf(
            ChatIdValueObject::class,
            $chatIdType->convertToPHPValue('chatId', $databasePlatform)
        );
        self::assertNotEmpty($chatIdType->convertToDatabaseValueSQL('chat_id="chatId"', $databasePlatform));
        self::assertNotEmpty($chatIdType->convertToPHPValueSQL('chat_id="chatId"', $databasePlatform));
        self::assertEmpty($chatIdType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $chatIdType->getSQLDeclaration(
                [
                    'chat_id' => ['columnName' => 'chat_id', 'type' => 'ChatIdType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($chatIdType->canRequireSQLConversion());
        self::assertFalse($chatIdType->requiresSQLCommentHint($databasePlatform));
    }
}
