<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\Exception;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Domain\Exception\BotAggregateBuildDomainException;

/**
 *
 */
final class BotAggregateBuildDomainExceptionTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        $this->expectException(BotAggregateBuildDomainException::class);

        throw new BotAggregateBuildDomainException('test');
    }
}
