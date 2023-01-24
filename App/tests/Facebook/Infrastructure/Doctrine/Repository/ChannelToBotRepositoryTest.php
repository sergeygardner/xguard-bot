<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository;

use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\ChannelToBotRepository;

/**
 *
 */
final class ChannelToBotRepositoryTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject(new ChannelToBotRepository(new InMemoryEntityManager()));
    }
}
