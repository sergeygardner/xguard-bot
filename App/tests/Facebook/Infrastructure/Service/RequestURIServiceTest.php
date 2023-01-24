<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Service;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Facebook\Domain\ValueObject\ChannelIdValueObject;
use XGuard\Bot\Facebook\Domain\ValueObject\TypeValueObject;
use XGuard\Bot\Facebook\Infrastructure\Service\RequestURIService;
use XGuard\Bot\Facebook\Infrastructure\Service\RequestURIServiceInterface;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

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
        $requestURIService = new RequestURIService(new BaseURIValueObject('https://test.me/<what>'));

        self::assertInstanceOf(
            RequestURIServiceInterface::class,
            $requestURIService->setToken(new TokenValueObject('token'))
        );

        self::assertEquals(
            'https://test.me/oauth/access_token?grant_type=client_credentials&scope=user_posts&client_id=clientId&client_secret=clientSecret',
            $requestURIService->getAccessToken('clientId', 'clientSecret')->getPath()
        );

        $channelEntity = new ChannelEntity(
            UuidValueObject::generate(),
            new ChannelIdValueObject('channelId'),
            new ChannelNameValueObject('channelName'),
            new TypeValueObject('user')
        );
        self::assertEquals(
            'https://test.me/channelId/posts?access_token=token',
            $requestURIService->getMessage(
                $channelEntity
            )->getPath()
        );
        self::assertEquals(
            'https://test.me/channelId/posts?access_token=token',
            $requestURIService->getMessages(
                $channelEntity
            )->getPath()
        );
    }
}
