<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\Exception;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class ModifyReadOnlyPropertyInDTOExceptionTest extends TestCase
{

    /**
     * @return void
     * @throws ModifyReadOnlyPropertyInDTOException
     */
    public function testConstruct(): void
    {
        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        throw new ModifyReadOnlyPropertyInDTOException(self::class, 'name', '');
    }
}
