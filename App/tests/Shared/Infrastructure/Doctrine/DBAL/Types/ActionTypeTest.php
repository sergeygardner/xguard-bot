<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Shared\Domain\ValueObject\ActionValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ActionType;

/**
 *
 */
final class ActionTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {

        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $actionTypeType   = new ActionType();
        self::assertIsObject($actionTypeType);
        self::assertNotEmpty($actionTypeType->getName());
        self::assertNotEmpty($actionTypeType->getBindingType());
        self::assertNotEmpty(
            $actionTypeType->convertToDatabaseValue(new ActionValueObject('sent'), $databasePlatform)
        );
        self::assertInstanceOf(
            ActionValueObject::class,
            $actionTypeType->convertToPHPValue('close', $databasePlatform)
        );
        self::assertNotEmpty($actionTypeType->convertToDatabaseValueSQL('action="open"', $databasePlatform));
        self::assertNotEmpty($actionTypeType->convertToPHPValueSQL('action="error"', $databasePlatform));
        self::assertEmpty($actionTypeType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $actionTypeType->getSQLDeclaration(
                [
                    'action' => ['columnName' => 'action', 'type' => 'ActionType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($actionTypeType->canRequireSQLConversion());
        self::assertFalse($actionTypeType->requiresSQLCommentHint($databasePlatform));
    }
}
