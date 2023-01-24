<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;

/**
 *
 */
final class UuidTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {

        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $uuidTypeType     = new UuidType();
        self::assertIsObject($uuidTypeType);
        self::assertNotEmpty($uuidTypeType->getName());
        self::assertNotEmpty($uuidTypeType->getBindingType());
        self::assertNotEmpty(
            $uuidTypeType->convertToDatabaseValue(UuidValueObject::generate(), $databasePlatform)
        );
        self::assertInstanceOf(
            UuidValueObject::class,
            $uuidTypeType->convertToPHPValue((string)UuidValueObject::generate(), $databasePlatform)
        );
        self::assertNotEmpty(
            $uuidTypeType->convertToDatabaseValueSQL('uuid="'.UuidValueObject::generate().'"', $databasePlatform)
        );
        self::assertNotEmpty(
            $uuidTypeType->convertToPHPValueSQL('uuid="'.UuidValueObject::generate().'"', $databasePlatform)
        );
        self::assertEmpty($uuidTypeType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $uuidTypeType->getSQLDeclaration(
                [
                    'uuid' => ['columnName' => 'uuid', 'type' => 'UuidType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($uuidTypeType->canRequireSQLConversion());
        self::assertTrue($uuidTypeType->requiresSQLCommentHint($databasePlatform));
    }
}
