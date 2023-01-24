<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientIdValueObject;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ClientIdType;

/**
 *
 */
final class ClientIdTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {
        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $clientIdType     = new ClientIdType();
        self::assertIsObject($clientIdType);
        self::assertNotEmpty($clientIdType->getName());
        self::assertNotEmpty($clientIdType->getBindingType());
        self::assertNotEmpty(
            $clientIdType->convertToDatabaseValue(new ClientIdValueObject('clientId'), $databasePlatform)
        );
        self::assertInstanceOf(
            ClientIdValueObject::class,
            $clientIdType->convertToPHPValue('clientId', $databasePlatform)
        );
        self::assertNotEmpty($clientIdType->convertToDatabaseValueSQL('client_id="CLIENT_ID"', $databasePlatform));
        self::assertNotEmpty($clientIdType->convertToPHPValueSQL('client_id="CLIENT_ID"', $databasePlatform));
        self::assertEmpty($clientIdType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $clientIdType->getSQLDeclaration(
                [
                    'client_id' => ['columnName' => 'client_id', 'type' => 'ClientIdType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($clientIdType->canRequireSQLConversion());
        self::assertFalse($clientIdType->requiresSQLCommentHint($databasePlatform));
    }
}
