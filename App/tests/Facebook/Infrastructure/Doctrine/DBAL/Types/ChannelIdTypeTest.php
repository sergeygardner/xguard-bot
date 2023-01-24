<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Facebook\Domain\ValueObject\ChannelIdValueObject;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ChannelIdType;

/**
 *
 */
final class ChannelIdTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {


        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $channelIdType    = new ChannelIdType();
        self::assertIsObject($channelIdType);
        self::assertNotEmpty($channelIdType->getName());
        self::assertNotEmpty($channelIdType->getBindingType());
        self::assertNotEmpty(
            $channelIdType->convertToDatabaseValue(new ChannelIdValueObject('channelId'), $databasePlatform)
        );
        self::assertInstanceOf(
            ChannelIdValueObject::class,
            $channelIdType->convertToPHPValue('channelId', $databasePlatform)
        );
        self::assertNotEmpty($channelIdType->convertToDatabaseValueSQL('channel_id="channelId"', $databasePlatform));
        self::assertNotEmpty($channelIdType->convertToPHPValueSQL('channel_id="channelId"', $databasePlatform));
        self::assertEmpty($channelIdType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $channelIdType->getSQLDeclaration(
                [
                    'channel_id' => ['columnName' => 'channel_id', 'type' => 'ChannelIdType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($channelIdType->canRequireSQLConversion());
        self::assertFalse($channelIdType->requiresSQLCommentHint($databasePlatform));
    }
}
