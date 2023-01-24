<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Domain\ValueObject\ChannelIdValueObject;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;

/**
 *
 */
final class ChannelIdValueObjectTest extends TestCase
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
     * @param             $channelId
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($channelId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelIdValueObject = new ChannelIdValueObject($channelId);

        self::assertIsObject($channelIdValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($channelId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelIdValueObject = new ChannelIdValueObject($channelId);

        self::assertEquals(
            $channelId,
            (string)$channelIdValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($channelId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelIdValueObject = new ChannelIdValueObject($channelId);

        self::assertEquals(
            json_encode($channelId, JSON_THROW_ON_ERROR),
            json_encode($channelIdValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($channelId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelIdValueObject       = new ChannelIdValueObject($channelId);
        $channelIdValueObject2      = new ChannelIdValueObject($channelId.$channelId);
        $channelIdValueObjectCloned = clone $channelIdValueObject;

        self::assertTrue(
            $channelIdValueObject->isEquals($channelIdValueObjectCloned)
        );

        self::assertFalse(
            $channelIdValueObject->isEquals($channelIdValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($channelId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelIdValueObject  = new ChannelIdValueObject($channelId);
        $channelIdValueObject2 = new ChannelIdValueObject($channelId.$channelId);

        self::assertTrue(
            $channelIdValueObject->isComparable($channelIdValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($channelId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelIdValueObject = new ChannelIdValueObject($channelId);

        self::assertEquals(
            $channelId,
            $channelIdValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($channelId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelIdValueObject = new ChannelIdValueObject($channelId);

        self::assertEquals(
            $channelId,
            $channelIdValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($channelId, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelIdValueObject = new ChannelIdValueObject($channelId);

        self::assertEquals(
            strlen($channelId),
            $channelIdValueObject->length()
        );
    }
}
