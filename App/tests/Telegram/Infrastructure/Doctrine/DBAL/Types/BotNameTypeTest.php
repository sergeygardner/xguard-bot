<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\BotNameType;

/**
 *
 */
final class BotNameTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {

        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $botNameType      = new BotNameType();
        self::assertIsObject($botNameType);
        self::assertNotEmpty($botNameType->getName());
        self::assertNotEmpty($botNameType->getBindingType());
        self::assertNotEmpty(
            $botNameType->convertToDatabaseValue(new BotNameValueObject('botName'), $databasePlatform)
        );
        self::assertInstanceOf(
            BotNameValueObject::class,
            $botNameType->convertToPHPValue('botName', $databasePlatform)
        );
        self::assertNotEmpty($botNameType->convertToDatabaseValueSQL('bot_name="BOT_NAME"', $databasePlatform));
        self::assertNotEmpty($botNameType->convertToPHPValueSQL('bot_name="BOT_NAME"', $databasePlatform));
        self::assertEmpty($botNameType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $botNameType->getSQLDeclaration(
                [
                    'name' => ['columnName' => 'name', 'type' => 'BotNameType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($botNameType->canRequireSQLConversion());
        self::assertFalse($botNameType->requiresSQLCommentHint($databasePlatform));
    }
}
