<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Service;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\Entity\MessageEntity;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TextValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Telegram\Domain\Entity\ChannelEntity;
use XGuard\Bot\Telegram\Domain\ValueObject\ChatIdValueObject;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestBodyService;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestBodyServiceInterface;

/**
 *
 */
final class RequestBodyServiceTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        $requestBodyService = new RequestBodyService();

        self::assertInstanceOf(
            RequestBodyServiceInterface::class,
            $requestBodyService
        );

        $channelEntity = new ChannelEntity(
            UuidValueObject::generate(),
            new ChatIdValueObject('channelId'),
            new ChannelNameValueObject('channelName'),
        );

        $messageEntity = new MessageEntity(
            UuidValueObject::generate(),
            new DateTimeImmutable,
            UuidValueObject::generate(),
            new TextValueObject('channelName'),
        );

        self::assertEquals(
            [
                'chat_id' => $channelEntity->getChatId(),
                'text'    => $messageEntity->getText(),
            ],
            $requestBodyService->sendMessage($channelEntity, $messageEntity)
        );
    }
}
