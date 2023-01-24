<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\Exception;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Domain\Exception\BotAggregatePostMessagesRuntimeException;

/**
 *
 */
final class BotAggregatePostMessagesRuntimeExceptionTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        $this->expectException(BotAggregatePostMessagesRuntimeException::class);

        throw new BotAggregatePostMessagesRuntimeException('test');
    }
}
