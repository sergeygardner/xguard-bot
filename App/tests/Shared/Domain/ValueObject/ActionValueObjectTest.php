<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\ActionValueObject;

/**
 *
 */
final class ActionValueObjectTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                ActionValueObject::createOpen()->getValue(),
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
     * @param             $actionValue
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($actionValue, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $actionValueObject = new ActionValueObject($actionValue);

        self::assertIsObject($actionValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($actionValue, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $actionValueObject = new ActionValueObject($actionValue);

        self::assertEquals(
            $actionValue,
            (string)$actionValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($actionValue, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $actionValueObject = new ActionValueObject($actionValue);

        self::assertEquals(
            json_encode($actionValue, JSON_THROW_ON_ERROR),
            json_encode($actionValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($actionValue, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $actionValueObject       = new ActionValueObject($actionValue);
        $actionValueObjectCloned = clone $actionValueObject;

        self::assertTrue(
            $actionValueObject->isEquals($actionValueObjectCloned)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($actionValue, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $actionValueObject  = new ActionValueObject($actionValue);
        $actionValueObject2 = clone $actionValueObject;

        self::assertTrue(
            $actionValueObject->isComparable($actionValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($actionValue, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $actionValueObject = new ActionValueObject($actionValue);

        self::assertEquals(
            $actionValue,
            $actionValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($actionValue, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $actionValueObject = new ActionValueObject($actionValue);

        self::assertEquals(
            $actionValue,
            $actionValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($actionValue, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $actionValueObject = new ActionValueObject($actionValue);

        self::assertEquals(
            strlen($actionValue),
            $actionValueObject->length()
        );
    }
}
