<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\Enum;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\Enum\InstagramEligibilityEnum;

/**
 *
 */
final class InstagramEligibilityEnumTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testJsonSerialize(): void
    {
        foreach (InstagramEligibilityEnum::cases() as $case) {
            self::assertEquals(json_encode($case->name, JSON_THROW_ON_ERROR), json_encode($case, JSON_THROW_ON_ERROR));
        }
    }
}
