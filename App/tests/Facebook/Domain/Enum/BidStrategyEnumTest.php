<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\Enum;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\Enum\BidStrategyEnum;

/**
 *
 */
final class BidStrategyEnumTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        foreach (BidStrategyEnum::cases() as $case) {
            self::assertEquals(json_encode($case->name, JSON_THROW_ON_ERROR), json_encode($case, JSON_THROW_ON_ERROR));
        }
    }
}
