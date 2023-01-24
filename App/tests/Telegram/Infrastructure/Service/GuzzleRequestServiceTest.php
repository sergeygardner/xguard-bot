<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Service;

use DateTimeImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\Entity\MessageEntity;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TextValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;
use XGuard\Bot\Telegram\Domain\Entity\ChannelEntity;
use XGuard\Bot\Telegram\Domain\ValueObject\ChatIdValueObject;
use XGuard\Bot\Telegram\Infrastructure\Service\GuzzleRequestService;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestBodyService;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestURIService;

/**
 *
 */
final class GuzzleRequestServiceTest extends TestCase
{

    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'result' => [
                        'message_id' => 1,
                        'date'       => 1689027418,
                        'chat'       => [
                            'id'   => 12345,
                            'type' => 'channel',
                        ],
                        'text'       => 'text',
                    ],
                ],
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $guzzleRequestService = new GuzzleRequestService(
            new Client(
                [
                    'handler' => new MockHandler(
                        [
                            new Response(
                                body: json_encode($data, JSON_THROW_ON_ERROR)
                            ),
                        ]
                    ),
                ]
            ),
            new RequestURIService(new BaseURIValueObject('https://test.me'), new TokenValueObject('token')),
            new RequestBodyService(),
            new DTOFactoryService
        );

        $channelEntity = new ChannelEntity(
            UuidValueObject::generate(),
            new ChatIdValueObject('12345'),
            new ChannelNameValueObject('channelName'),
        );

        $messageEntity = new MessageEntity(
            UuidValueObject::generate(),
            new DateTimeImmutable,
            UuidValueObject::generate(),
            new TextValueObject('channelName'),
        );

        $messageDTO = $guzzleRequestService->sendMessage($channelEntity, $messageEntity);

        self::assertEquals($data['result']['message_id'], $messageDTO->message_id);
        self::assertEquals($data['result']['date'], $messageDTO->date);
        self::assertEquals($data['result']['chat']['id'], $messageDTO->chat->id);
        self::assertEquals($data['result']['text'], $messageDTO->text);
    }
}
