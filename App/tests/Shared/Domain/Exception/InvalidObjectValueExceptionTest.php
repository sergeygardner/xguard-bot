<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\Exception;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\Exception\InvalidObjectValueException;

/**
 *
 */
final class InvalidObjectValueExceptionTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        $this->expectException(InvalidObjectValueException::class);

        throw new InvalidObjectValueException('test');
    }
}
