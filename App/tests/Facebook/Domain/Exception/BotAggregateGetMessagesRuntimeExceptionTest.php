<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\Exception;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\Exception\BotAggregateGetMessagesRuntimeException;

/**
 *
 */
final class BotAggregateGetMessagesRuntimeExceptionTest extends TestCase
{

    /**
     * @return void
     * @throws BotAggregateGetMessagesRuntimeException
     */
    public function testConstruct(): void
    {
        $this->expectException(BotAggregateGetMessagesRuntimeException::class);

        throw new BotAggregateGetMessagesRuntimeException();
    }
}
