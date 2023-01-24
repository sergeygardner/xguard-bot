<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ChannelNameType;

/**
 *
 */
final class ChannelNameTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {
        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $channelNameType  = new ChannelNameType();
        self::assertIsObject($channelNameType);
        self::assertNotEmpty($channelNameType->getName());
        self::assertNotEmpty($channelNameType->getBindingType());
        self::assertNotEmpty(
            $channelNameType->convertToDatabaseValue(new ChannelNameValueObject('channelName'), $databasePlatform)
        );
        self::assertInstanceOf(
            ChannelNameValueObject::class,
            $channelNameType->convertToPHPValue('channelName', $databasePlatform)
        );
        self::assertNotEmpty(
            $channelNameType->convertToDatabaseValueSQL('channel_name="CHANNEL_NAME"', $databasePlatform)
        );
        self::assertNotEmpty($channelNameType->convertToPHPValueSQL('channel_name="CHANNEL_NAME"', $databasePlatform));
        self::assertEmpty($channelNameType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $channelNameType->getSQLDeclaration(
                [
                    'name' => ['columnName' => 'name', 'type' => 'ChannelNameType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($channelNameType->canRequireSQLConversion());
        self::assertFalse($channelNameType->requiresSQLCommentHint($databasePlatform));
    }
}
