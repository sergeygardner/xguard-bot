<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Telegram\Domain\ValueObject\ChatIdValueObject;

/**
 *
 */
final class ChatIdValueObjectTest extends TestCase
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
     * @param             $chatId
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($chatId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $chatIdValueObject = new ChatIdValueObject($chatId);

        self::assertIsObject($chatIdValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($chatId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $chatIdValueObject = new ChatIdValueObject($chatId);

        self::assertEquals(
            $chatId,
            (string)$chatIdValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($chatId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $chatIdValueObject = new ChatIdValueObject($chatId);

        self::assertEquals(
            json_encode($chatId, JSON_THROW_ON_ERROR),
            json_encode($chatIdValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($chatId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $chatIdValueObject       = new ChatIdValueObject($chatId);
        $chatIdValueObject2      = new ChatIdValueObject($chatId.$chatId);
        $chatIdValueObjectCloned = clone $chatIdValueObject;

        self::assertTrue(
            $chatIdValueObject->isEquals($chatIdValueObjectCloned)
        );

        self::assertFalse(
            $chatIdValueObject->isEquals($chatIdValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($chatId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $chatIdValueObject  = new ChatIdValueObject($chatId);
        $chatIdValueObject2 = new ChatIdValueObject($chatId.$chatId);

        self::assertTrue(
            $chatIdValueObject->isComparable($chatIdValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($chatId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $chatIdValueObject = new ChatIdValueObject($chatId);

        self::assertEquals(
            $chatId,
            $chatIdValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($chatId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $chatIdValueObject = new ChatIdValueObject($chatId);

        self::assertEquals(
            $chatId,
            $chatIdValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($chatId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $chatIdValueObject = new ChatIdValueObject($chatId);

        self::assertEquals(
            strlen($chatId),
            $chatIdValueObject->length()
        );
    }
}
