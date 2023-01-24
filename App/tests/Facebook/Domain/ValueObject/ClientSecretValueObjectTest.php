<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientSecretValueObject;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;

/**
 *
 */
final class ClientSecretValueObjectTest extends TestCase
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
     * @param             $clientSecret
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($clientSecret, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientSecretValueObject = new ClientSecretValueObject($clientSecret);

        self::assertIsObject($clientSecretValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($clientSecret, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientSecretValueObject = new ClientSecretValueObject($clientSecret);

        self::assertEquals(
            $clientSecret,
            (string)$clientSecretValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($clientSecret, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientSecretValueObject = new ClientSecretValueObject($clientSecret);

        self::assertEquals(
            json_encode($clientSecret, JSON_THROW_ON_ERROR),
            json_encode($clientSecretValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($clientSecret, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientSecretValueObject       = new ClientSecretValueObject($clientSecret);
        $clientSecretValueObject2      = new ClientSecretValueObject($clientSecret.$clientSecret);
        $clientSecretValueObjectCloned = clone $clientSecretValueObject;

        self::assertTrue(
            $clientSecretValueObject->isEquals($clientSecretValueObjectCloned)
        );

        self::assertFalse(
            $clientSecretValueObject->isEquals($clientSecretValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($clientSecret, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientSecretValueObject  = new ClientSecretValueObject($clientSecret);
        $clientSecretValueObject2 = new ClientSecretValueObject($clientSecret.$clientSecret);

        self::assertTrue(
            $clientSecretValueObject->isComparable($clientSecretValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($clientSecret, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientSecretValueObject = new ClientSecretValueObject($clientSecret);

        self::assertEquals(
            $clientSecret,
            $clientSecretValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($clientSecret, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientSecretValueObject = new ClientSecretValueObject($clientSecret);

        self::assertEquals(
            $clientSecret,
            $clientSecretValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($clientSecret, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $clientSecretValueObject = new ClientSecretValueObject($clientSecret);

        self::assertEquals(
            strlen($clientSecret),
            $clientSecretValueObject->length()
        );
    }
}
