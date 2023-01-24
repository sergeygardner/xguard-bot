<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Facebook\Domain\ValueObject\TypeValueObject;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\TypeType;

/**
 *
 */
final class TypeTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {


        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $typeType         = new TypeType();
        self::assertIsObject($typeType);
        self::assertNotEmpty($typeType->getName());
        self::assertNotEmpty($typeType->getBindingType());
        self::assertNotEmpty(
            $typeType->convertToDatabaseValue(new TypeValueObject('user'), $databasePlatform)
        );
        self::assertInstanceOf(
            TypeValueObject::class,
            $typeType->convertToPHPValue('group', $databasePlatform)
        );
        self::assertNotEmpty($typeType->convertToDatabaseValueSQL('type="page"', $databasePlatform));
        self::assertNotEmpty($typeType->convertToPHPValueSQL('type="user"', $databasePlatform));
        self::assertEmpty($typeType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $typeType->getSQLDeclaration(
                [
                    'type' => ['columnName' => 'type', 'type' => 'TypeType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($typeType->canRequireSQLConversion());
        self::assertFalse($typeType->requiresSQLCommentHint($databasePlatform));
    }
}
