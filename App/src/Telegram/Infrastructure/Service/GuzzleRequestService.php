<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Infrastructure\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use XGuard\Bot\Shared\Domain\Entity\MessageEntity;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryServiceInterface;
use XGuard\Bot\Telegram\Domain\DTO\MessageDTO;
use XGuard\Bot\Telegram\Domain\Entity\ChannelEntity;
use XGuard\Bot\Telegram\Infrastructure\Exception\RequestServiceException;

/**
 *
 */
final class GuzzleRequestService implements RequestServiceInterface
{

    /**
     * @param Client                      $client
     * @param RequestURIServiceInterface  $requestURIService
     * @param RequestBodyServiceInterface $requestBodyService
     * @param DTOFactoryServiceInterface  $DTOFactoryService
     */
    public function __construct(
        public readonly Client $client,
        public readonly RequestURIServiceInterface $requestURIService,
        public readonly RequestBodyServiceInterface $requestBodyService,
        public readonly DTOFactoryServiceInterface $DTOFactoryService
    ) {

    }

    /**
     * @inheritDoc
     */
    public function sendMessage(ChannelEntity $channelEntity, MessageEntity $messageEntity): MessageDTO
    {
        try {
            return $this->DTOFactoryService->createDTOFromMessage(
                json_decode(
                    $this->client->post(
                        (string)$this->requestURIService->sendMessage(),
                        [
                            'json' => $this->requestBodyService->sendMessage($channelEntity, $messageEntity),
                        ]
                    )
                        ->getBody()->getContents(),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                )['result'] ?? []
            );
        } catch (GuzzleException|JsonException $e) {
            throw new RequestServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
