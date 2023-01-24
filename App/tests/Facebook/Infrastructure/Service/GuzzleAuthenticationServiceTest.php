<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Infrastructure\Service\GuzzleAuthenticationService;
use XGuard\Bot\Facebook\Infrastructure\Service\RequestURIService;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;

/**
 *
 */
final class GuzzleAuthenticationServiceTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        $client = new Client(
            [
                'handler' => new MockHandler(
                    [
                        new Response(body: '{"access_token":"access_token","token_type":"Bearer"}'),
                    ]
                ),
            ]
        );

        $guzzleAuthenticationService = new GuzzleAuthenticationService(
            $client,
            new RequestURIService(new BaseURIValueObject('https://test.me/<what>')),
            new DTOFactoryService
        );
        $accessTokenDTO              = $guzzleAuthenticationService->getAccessToken('clientId', 'clientSecret');

        self::assertEquals('access_token', $accessTokenDTO->access_token);
        self::assertEquals('Bearer', $accessTokenDTO->token_type);
    }
}
