<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\TextValueObject;

/**
 *
 */
final class TextValueObjectTest extends TestCase
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
     * @param             $text
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($text, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $textValueObject = new TextValueObject($text);

        self::assertIsObject($textValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($text, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $textValueObject = new TextValueObject($text);

        self::assertEquals(
            $text,
            (string)$textValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($text, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $textValueObject = new TextValueObject($text);

        self::assertEquals(
            json_encode($text, JSON_THROW_ON_ERROR),
            json_encode($textValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($text, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $textValueObject       = new TextValueObject($text);
        $textValueObject2      = new TextValueObject($text.$text);
        $textValueObjectCloned = clone $textValueObject;

        self::assertTrue(
            $textValueObject->isEquals($textValueObjectCloned)
        );

        self::assertFalse(
            $textValueObject->isEquals($textValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($text, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $textValueObject  = new TextValueObject($text);
        $textValueObject2 = new TextValueObject($text.$text);

        self::assertTrue(
            $textValueObject->isComparable($textValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($text, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $textValueObject = new TextValueObject($text);

        self::assertEquals(
            $text,
            $textValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($text, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $textValueObject = new TextValueObject($text);

        self::assertEquals(
            $text,
            $textValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($text, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $textValueObject = new TextValueObject($text);

        self::assertEquals(
            strlen($text),
            $textValueObject->length()
        );
    }
}
