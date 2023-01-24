<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Exception;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types\TokenType;

/**
 *
 */
final class TokenTypeTest extends TestCase
{

    /**
     * @return void
     * @throws Exception
     */
    public function testConstruct(): void
    {


        $databasePlatform = (new InMemoryEntityManager())->getConnection()->getDatabasePlatform();
        $tokenType        = new TokenType();
        self::assertIsObject($tokenType);
        self::assertNotEmpty($tokenType->getName());
        self::assertNotEmpty($tokenType->getBindingType());
        self::assertNotEmpty(
            $tokenType->convertToDatabaseValue(new TokenValueObject('token'), $databasePlatform)
        );
        self::assertInstanceOf(
            TokenValueObject::class,
            $tokenType->convertToPHPValue('token', $databasePlatform)
        );
        self::assertNotEmpty($tokenType->convertToDatabaseValueSQL('token="token"', $databasePlatform));
        self::assertNotEmpty($tokenType->convertToPHPValueSQL('token="token"', $databasePlatform));
        self::assertEmpty($tokenType->getMappedDatabaseTypes($databasePlatform));
        self::assertNotEmpty(
            $tokenType->getSQLDeclaration(
                [
                    'token' => ['columnName' => 'token', 'type' => 'TokenType'],
                ],
                $databasePlatform
            )
        );
        self::assertFalse($tokenType->canRequireSQLConversion());
        self::assertFalse($tokenType->requiresSQLCommentHint($databasePlatform));
    }
}
