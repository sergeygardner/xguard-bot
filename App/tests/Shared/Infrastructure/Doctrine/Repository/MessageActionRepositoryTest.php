<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Infrastructure\Doctrine\Repository;

use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\MessageActionRepository;

/**
 *
 */
final class MessageActionRepositoryTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject(new MessageActionRepository(new InMemoryEntityManager()));
    }
}
