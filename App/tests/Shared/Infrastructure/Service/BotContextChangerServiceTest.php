<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Infrastructure\Service;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use XGuard\Bot\Shared\Infrastructure\Service\BotContextChangerService;

/**
 *
 */
final class BotContextChangerServiceTest extends TestCase
{

    /**
     * @return void
     * @throws RuntimeException
     */
    public function testConstruct(): void
    {
        $botContextChangerService = new BotContextChangerService(['shared:index:list']);

        self::assertIsObject($botContextChangerService);

        ob_start();

        $botContextChangerService->switch();

        $contents = ob_get_contents();

        if (false !== stripos($contents, 'error')) {
            throw new RuntimeException($contents);
        }

        ob_end_clean();
    }
}
