<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;

/**
 *
 */
final class TokenValueObjectTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                'test',
                null,
            ],
            [
                '',
                InvalidObjectValueException::class,
            ],
            [
                123,
                TypeError::class,
            ],
            [
                123.01,
                TypeError::class,
            ],
            [
                new class() {

                },
                TypeError::class,
            ],
            [
                curl_init(),
                TypeError::class,
            ],
            [
                null,
                TypeError::class,
            ],
            [
                true,
                TypeError::class,
            ],
            [
                false,
                TypeError::class,
            ],
            [
                [],
                TypeError::class,
            ],
        ];
    }

    /**
     * @param             $token
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($token, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $tokenValueObject = new TokenValueObject($token);

        self::assertIsObject($tokenValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($token, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $tokenValueObject = new TokenValueObject($token);

        self::assertEquals(
            $token,
            (string)$tokenValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($token, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $tokenValueObject = new TokenValueObject($token);

        self::assertEquals(
            json_encode($token, JSON_THROW_ON_ERROR),
            json_encode($tokenValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($token, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $tokenValueObject       = new TokenValueObject($token);
        $tokenValueObject2      = new TokenValueObject($token.$token);
        $tokenValueObjectCloned = clone $tokenValueObject;

        self::assertTrue(
            $tokenValueObject->isEquals($tokenValueObjectCloned)
        );

        self::assertFalse(
            $tokenValueObject->isEquals($tokenValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($token, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $tokenValueObject  = new TokenValueObject($token);
        $tokenValueObject2 = new TokenValueObject($token.$token);

        self::assertTrue(
            $tokenValueObject->isComparable($tokenValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($token, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $tokenValueObject = new TokenValueObject($token);

        self::assertEquals(
            $token,
            $tokenValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($token, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $tokenValueObject = new TokenValueObject($token);

        self::assertEquals(
            $token,
            $tokenValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($token, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $tokenValueObject = new TokenValueObject($token);

        self::assertEquals(
            strlen($token),
            $tokenValueObject->length()
        );
    }
}
