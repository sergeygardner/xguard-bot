<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientSecretValueObject;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ClientSecretType;

/**
 *
 */
final class ClientSecretTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {

        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $clientSecretType = new ClientSecretType();
        self::assertIsObject($clientSecretType);
        self::assertNotEmpty($clientSecretType->getName());
        self::assertNotEmpty($clientSecretType->getBindingType());
        self::assertNotEmpty(
            $clientSecretType->convertToDatabaseValue(new ClientSecretValueObject('clientSecret'), $databasePlatform)
        );
        self::assertInstanceOf(
            ClientSecretValueObject::class,
            $clientSecretType->convertToPHPValue('clientSecret', $databasePlatform)
        );
        self::assertNotEmpty(
            $clientSecretType->convertToDatabaseValueSQL('client_secret="CLIENT_SECRET"', $databasePlatform)
        );
        self::assertNotEmpty(
            $clientSecretType->convertToPHPValueSQL('client_secret="CLIENT_SECRET"', $databasePlatform)
        );
        self::assertEmpty($clientSecretType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $clientSecretType->getSQLDeclaration(
                [
                    'client_secret' => ['columnName' => 'client_secret', 'type' => 'ClientSecretType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($clientSecretType->canRequireSQLConversion());
        self::assertFalse($clientSecretType->requiresSQLCommentHint($databasePlatform));
    }
}
