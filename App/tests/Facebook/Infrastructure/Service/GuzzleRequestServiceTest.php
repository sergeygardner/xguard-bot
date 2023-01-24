<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Facebook\Domain\ValueObject\ChannelIdValueObject;
use XGuard\Bot\Facebook\Domain\ValueObject\TypeValueObject;
use XGuard\Bot\Facebook\Infrastructure\Service\GuzzleAuthenticationService;
use XGuard\Bot\Facebook\Infrastructure\Service\GuzzleRequestService;
use XGuard\Bot\Facebook\Infrastructure\Service\RequestURIService;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

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
                    'data' => [
                        [
                            'id'           => 'ZmVlZGJhY2s6NjQwODk0NzA3NTgzODI0Nl83OTE2OTg0NTI2NzM3NTk=',
                            'created_time' => 1689027418,
                            'message'      => 'Незлобивый текст, адресованный домашним животным – «Когда уже вы, паскуды, нажретесь?» - в современных российских условиях на наших глазах превращается в жесткий политический манифест.',
                            'story'        => 'story',
                        ],
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
            new RequestURIService(new BaseURIValueObject('https://test.me')),
            new DTOFactoryService,
            new GuzzleAuthenticationService(
                new Client(
                    [
                        'handler' => new MockHandler(
                            [
                                new Response(body: '{"access_token":"access_token","token_type":"Bearer"}'),
                            ]
                        ),
                    ]
                ),
                new RequestURIService(new BaseURIValueObject('https://test.me/<what>')),
                new DTOFactoryService
            )
        );
        $guzzleRequestService->requestURIService->setToken(
            new TokenValueObject(
                $guzzleRequestService->authenticationService->getAccessToken(
                    'clientId',
                    'clientSecret'
                )->access_token
            )
        );
        $postDTOs = $guzzleRequestService->do(
            new ChannelEntity(
                UuidValueObject::generate(),
                new ChannelIdValueObject('channelId'),
                new ChannelNameValueObject('channelName'),
                new TypeValueObject('user')
            )
        );

        foreach ($postDTOs as $key => $postDTO) {
            self::assertEquals($data['data'][$key]['id'], $postDTO->id);
            self::assertEquals($data['data'][$key]['created_time'], $postDTO->created_time->getTimestamp());
            self::assertEquals($data['data'][$key]['message'], $postDTO->message);
            self::assertEquals($data['data'][$key]['story'], $postDTO->story);
        }
    }
}
