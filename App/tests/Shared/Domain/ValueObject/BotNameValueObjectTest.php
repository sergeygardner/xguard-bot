<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;

/**
 *
 */
final class BotNameValueObjectTest extends TestCase
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
     * @param             $botName
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($botName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $botNameValueObject = new BotNameValueObject($botName);

        self::assertIsObject($botNameValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($botName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $botNameValueObject = new BotNameValueObject($botName);

        self::assertEquals(
            $botName,
            (string)$botNameValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($botName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $botNameValueObject = new BotNameValueObject($botName);

        self::assertEquals(
            json_encode($botName, JSON_THROW_ON_ERROR),
            json_encode($botNameValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($botName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $botNameValueObject       = new BotNameValueObject($botName);
        $botNameValueObject2      = new BotNameValueObject($botName.$botName);
        $botNameValueObjectCloned = clone $botNameValueObject;

        self::assertTrue(
            $botNameValueObject->isEquals($botNameValueObjectCloned)
        );

        self::assertFalse(
            $botNameValueObject->isEquals($botNameValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($botName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $botNameValueObject  = new BotNameValueObject($botName);
        $botNameValueObject2 = new BotNameValueObject($botName.$botName);

        self::assertTrue(
            $botNameValueObject->isComparable($botNameValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($botName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $botNameValueObject = new BotNameValueObject($botName);

        self::assertEquals(
            $botName,
            $botNameValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($botName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $botNameValueObject = new BotNameValueObject($botName);

        self::assertEquals(
            $botName,
            $botNameValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($botName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $botNameValueObject = new BotNameValueObject($botName);

        self::assertEquals(
            strlen($botName),
            $botNameValueObject->length()
        );
    }
}
