<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\ValueObject;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;

/**
 *
 */
final class ChannelNameValueObjectTest extends TestCase
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
     * @param             $channelName
     * @param string|null $exception
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testConstruct($channelName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelNameValueObject = new ChannelNameValueObject($channelName);

        self::assertIsObject($channelNameValueObject);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testToString($channelName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelNameValueObject = new ChannelNameValueObject($channelName);

        self::assertEquals(
            $channelName,
            (string)$channelNameValueObject
        );
    }

    /**
     * @dataProvider dataProvider
     *
     * @throws JsonException
     */
    public function testJsonSerialize($channelName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelNameValueObject = new ChannelNameValueObject($channelName);

        self::assertEquals(
            json_encode($channelName, JSON_THROW_ON_ERROR),
            json_encode($channelNameValueObject, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsEquals($channelName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelNameValueObject       = new ChannelNameValueObject($channelName);
        $channelNameValueObject2      = new ChannelNameValueObject($channelName.$channelName);
        $channelNameValueObjectCloned = clone $channelNameValueObject;

        self::assertTrue(
            $channelNameValueObject->isEquals($channelNameValueObjectCloned)
        );

        self::assertFalse(
            $channelNameValueObject->isEquals($channelNameValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testIsComparable($channelName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelNameValueObject  = new ChannelNameValueObject($channelName);
        $channelNameValueObject2 = new ChannelNameValueObject($channelName.$channelName);

        self::assertTrue(
            $channelNameValueObject->isComparable($channelNameValueObject2)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testHash($channelName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelNameValueObject = new ChannelNameValueObject($channelName);

        self::assertEquals(
            $channelName,
            $channelNameValueObject->hash()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testGetValue($channelName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelNameValueObject = new ChannelNameValueObject($channelName);

        self::assertEquals(
            $channelName,
            $channelNameValueObject->getValue()
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testLength($channelName, ?string $exception): void
    {
        if (null !== $exception) {
            $this->expectException($exception);
        }

        $channelNameValueObject = new ChannelNameValueObject($channelName);

        self::assertEquals(
            strlen($channelName),
            $channelNameValueObject->length()
        );
    }
}
