<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientIdValueObject;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;

/**
 *
 */
final class ClientIdValueObjectTest extends TestCase
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
     * @param             $clientId
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($clientId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientIdValueObject = new ClientIdValueObject($clientId);

        self::assertIsObject($clientIdValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($clientId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientIdValueObject = new ClientIdValueObject($clientId);

        self::assertEquals(
            $clientId,
            (string)$clientIdValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($clientId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientIdValueObject = new ClientIdValueObject($clientId);

        self::assertEquals(
            json_encode($clientId, JSON_THROW_ON_ERROR),
            json_encode($clientIdValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($clientId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientIdValueObject       = new ClientIdValueObject($clientId);
        $clientIdValueObject2      = new ClientIdValueObject($clientId.$clientId);
        $clientIdValueObjectCloned = clone $clientIdValueObject;

        self::assertTrue(
            $clientIdValueObject->isEquals($clientIdValueObjectCloned)
        );

        self::assertFalse(
            $clientIdValueObject->isEquals($clientIdValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($clientId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientIdValueObject  = new ClientIdValueObject($clientId);
        $clientIdValueObject2 = new ClientIdValueObject($clientId.$clientId);

        self::assertTrue(
            $clientIdValueObject->isComparable($clientIdValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($clientId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientIdValueObject = new ClientIdValueObject($clientId);

        self::assertEquals(
            $clientId,
            $clientIdValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($clientId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientIdValueObject = new ClientIdValueObject($clientId);

        self::assertEquals(
            $clientId,
            $clientIdValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($clientId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientIdValueObject = new ClientIdValueObject($clientId);

        self::assertEquals(
            strlen($clientId),
            $clientIdValueObject->length()
        );
    }
}
