<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid as PHPUuid;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
class UuidValueObjectTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                (string)UuidValueObject::generate(),
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
     *
     */
    public function testGenerate(): void
    {
        self::assertTrue(PHPUuid::isValid((string)UuidValueObject::generate()));
    }

    /**
     * @param             $uuid
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($uuid, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uuidValueObject = new UuidValueObject($uuid);

        self::assertIsObject($uuidValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($uuid, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uuidValueObject = new UuidValueObject($uuid);

        self::assertEquals(
            $uuid,
            (string)$uuidValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($uuid, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uuidValueObject = new UuidValueObject($uuid);

        self::assertEquals(
            json_encode($uuid, JSON_THROW_ON_ERROR),
            json_encode($uuidValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($uuid, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uuidValueObject       = new UuidValueObject($uuid);
        $uuidValueObject2      = UuidValueObject::generate();
        $uuidValueObjectCloned = clone $uuidValueObject;

        self::assertTrue(
            $uuidValueObject->isEquals($uuidValueObjectCloned)
        );

        self::assertFalse(
            $uuidValueObject->isEquals($uuidValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($uuid, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uuidValueObject  = new UuidValueObject($uuid);
        $uuidValueObject2 = clone $uuidValueObject;

        self::assertTrue(
            $uuidValueObject->isComparable($uuidValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($uuid, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uuidValueObject = new UuidValueObject($uuid);

        self::assertEquals(
            $uuid,
            $uuidValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($uuid, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uuidValueObject = new UuidValueObject($uuid);

        self::assertEquals(
            $uuid,
            $uuidValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($uuid, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $uuidValueObject = new UuidValueObject($uuid);

        self::assertEquals(
            strlen($uuid),
            $uuidValueObject->length()
        );
    }
}
