<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\Exception;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\Exception\BotAggregateBuildDomainException;

/**
 *
 */
final class BotAggregateBuildDomainExceptionTest extends TestCase
{

    /**
     * @return void
     * @throws BotAggregateBuildDomainException
     */
    public function testConstruct(): void
    {
        $this->expectException(BotAggregateBuildDomainException::class);

        throw new BotAggregateBuildDomainException();
    }
}
