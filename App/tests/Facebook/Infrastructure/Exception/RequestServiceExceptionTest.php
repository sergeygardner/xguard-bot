<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Exception;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Infrastructure\Exception\RequestServiceException;

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
