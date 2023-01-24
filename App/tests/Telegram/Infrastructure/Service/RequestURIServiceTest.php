<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Service;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestURIService;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestURIServiceInterface;

/**
 *
 */
final class RequestURIServiceTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        $requestURIService = new RequestURIService(new BaseURIValueObject('https://test.me/<token>/<method>'));

        self::assertInstanceOf(
            RequestURIServiceInterface::class,
            $requestURIService->setToken(new TokenValueObject('token'))
        );

        self::assertEquals(
            'https://test.me/token/sendMessage',
            $requestURIService->sendMessage()->getPath()
        );
    }
}
