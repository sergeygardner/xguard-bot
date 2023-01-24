<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Infrastructure\Doctrine\Repository;

use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\MessageRepository;

/**
 *
 */
final class MessageRepositoryTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject(new MessageRepository(new InMemoryEntityManager()));
    }
}
