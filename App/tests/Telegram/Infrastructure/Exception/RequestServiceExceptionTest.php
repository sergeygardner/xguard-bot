<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Exception;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Infrastructure\Exception\RequestServiceException;

/**
 *
 */
final class RequestServiceExceptionTest extends TestCase
{

    /**
     * @return void
     * @throws RequestServiceException
     */
    public function testConstruct(): void
    {
        $this->expectException(RequestServiceException::class);

        throw new RequestServiceException();
    }
}
