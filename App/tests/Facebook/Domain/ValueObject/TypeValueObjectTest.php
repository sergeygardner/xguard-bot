<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Domain\ValueObject\TypeValueObject;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;

/**
 *
 */
final class TypeValueObjectTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                'user',
                null,
            ],
            [
                'page',
                null,
            ],
            [
                'group',
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
     * @param             $type
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($type, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $typeValueObject = new TypeValueObject($type);

        self::assertIsObject($typeValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($type, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $typeValueObject = new TypeValueObject($type);

        self::assertEquals(
            $type,
            (string)$typeValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($type, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $typeValueObject = new TypeValueObject($type);

        self::assertEquals(
            json_encode($type, JSON_THROW_ON_ERROR),
            json_encode($typeValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($type, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $typeValueObject       = new TypeValueObject($type);
        $typeValueObjectCloned = clone $typeValueObject;

        self::assertTrue(
            $typeValueObject->isEquals($typeValueObjectCloned)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($type, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $typeValueObject  = new TypeValueObject($type);
        $typeValueObject2 = clone $typeValueObject;

        self::assertTrue(
            $typeValueObject->isComparable($typeValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($type, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $typeValueObject = new TypeValueObject($type);

        self::assertEquals(
            $type,
            $typeValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($type, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $typeValueObject = new TypeValueObject($type);

        self::assertEquals(
            $type,
            $typeValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($type, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $typeValueObject = new TypeValueObject($type);

        self::assertEquals(
            strlen($type),
            $typeValueObject->length()
        );
    }
}
