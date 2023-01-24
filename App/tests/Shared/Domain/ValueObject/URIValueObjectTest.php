<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\URIValueObject;

/**
 *
 */
final class URIValueObjectTest extends TestCase
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
     * @param             $uri
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($uri, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uriValueObject = new URIValueObject($uri);

        self::assertIsObject($uriValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($uri, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uriValueObject = new URIValueObject($uri);

        self::assertEquals(
            $uri,
            (string)$uriValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($uri, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uriValueObject = new URIValueObject($uri);

        self::assertEquals(
            json_encode($uri, JSON_THROW_ON_ERROR),
            json_encode($uriValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($uri, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uriValueObject       = new URIValueObject($uri);
        $uriValueObject2      = new URIValueObject($uri.$uri);
        $uriValueObjectCloned = clone $uriValueObject;

        self::assertTrue(
            $uriValueObject->isEquals($uriValueObjectCloned)
        );

        self::assertFalse(
            $uriValueObject->isEquals($uriValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($uri, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uriValueObject  = new URIValueObject($uri);
        $uriValueObject2 = new URIValueObject($uri.$uri);

        self::assertTrue(
            $uriValueObject->isComparable($uriValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($uri, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uriValueObject = new URIValueObject($uri);

        self::assertEquals(
            $uri,
            $uriValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($uri, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uriValueObject = new URIValueObject($uri);

        self::assertEquals(
            $uri,
            $uriValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($uri, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uriValueObject = new URIValueObject($uri);

        self::assertEquals(
            strlen($uri),
            $uriValueObject->length()
        );
    }
}
