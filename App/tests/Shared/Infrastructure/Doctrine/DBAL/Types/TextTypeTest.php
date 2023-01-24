<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Shared\Domain\ValueObject\TextValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\TextType;

/**
 *
 */
final class TextTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {

        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $textTypeType     = new TextType();
        self::assertIsObject($textTypeType);
        self::assertNotEmpty($textTypeType->getName());
        self::assertNotEmpty($textTypeType->getBindingType());
        self::assertNotEmpty(
            $textTypeType->convertToDatabaseValue(new TextValueObject('text'), $databasePlatform)
        );
        self::assertInstanceOf(
            TextValueObject::class,
            $textTypeType->convertToPHPValue('text2', $databasePlatform)
        );
        self::assertNotEmpty($textTypeType->convertToDatabaseValueSQL('text="text3"', $databasePlatform));
        self::assertNotEmpty($textTypeType->convertToPHPValueSQL('text="text4"', $databasePlatform));
        self::assertEmpty($textTypeType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $textTypeType->getSQLDeclaration(
                [
                    'text' => ['columnName' => 'text', 'type' => 'TextType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($textTypeType->canRequireSQLConversion());
        self::assertFalse($textTypeType->requiresSQLCommentHint($databasePlatform));
    }
}
