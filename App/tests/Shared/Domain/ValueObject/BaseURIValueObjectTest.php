<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;

/**
 *
 */
final class BaseURIValueObjectTest extends TestCase
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
     * @param             $baseURI
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($baseURI, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $baseURIValueObject = new BaseURIValueObject($baseURI);

        self::assertIsObject($baseURIValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($baseURI, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $baseURIValueObject = new BaseURIValueObject($baseURI);

        self::assertEquals(
            $baseURI,
            (string)$baseURIValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($baseURI, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $baseURIValueObject = new BaseURIValueObject($baseURI);

        self::assertEquals(
            json_encode($baseURI, JSON_THROW_ON_ERROR),
            json_encode($baseURIValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($baseURI, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $baseURIValueObject       = new BaseURIValueObject($baseURI);
        $baseURIValueObject2      = new BaseURIValueObject($baseURI.$baseURI);
        $baseURIValueObjectCloned = clone $baseURIValueObject;

        self::assertTrue(
            $baseURIValueObject->isEquals($baseURIValueObjectCloned)
        );

        self::assertFalse(
            $baseURIValueObject->isEquals($baseURIValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($baseURI, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $baseURIValueObject  = new BaseURIValueObject($baseURI);
        $baseURIValueObject2 = new BaseURIValueObject($baseURI.$baseURI);

        self::assertTrue(
            $baseURIValueObject->isComparable($baseURIValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($baseURI, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $baseURIValueObject = new BaseURIValueObject($baseURI);

        self::assertEquals(
            $baseURI,
            $baseURIValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($baseURI, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $baseURIValueObject = new BaseURIValueObject($baseURI);

        self::assertEquals(
            $baseURI,
            $baseURIValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($baseURI, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $baseURIValueObject = new BaseURIValueObject($baseURI);

        self::assertEquals(
            strlen($baseURI),
            $baseURIValueObject->length()
        );
    }
}
