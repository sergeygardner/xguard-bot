<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Infrastructure\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryServiceInterface;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Facebook\Infrastructure\Exception\RequestServiceException;

/**
 *
 */
final class GuzzleRequestService implements RequestServiceInterface
{

    /**
     * @param Client                         $client
     * @param RequestURIServiceInterface     $requestURIService
     * @param DTOFactoryServiceInterface     $DTOFactoryService
     * @param AuthenticationServiceInterface $authenticationService
     */
    public function __construct(
        public readonly Client $client,
        public readonly RequestURIServiceInterface $requestURIService,
        public readonly DTOFactoryServiceInterface $DTOFactoryService,
        public readonly AuthenticationServiceInterface $authenticationService
    ) {

    }

    /**
     * @inheritDoc
     */
    public function do(ChannelEntity $channelEntity): array
    {
        try {
            return array_reduce(

                json_decode(
                    $this->client->get(
                        (string)$this->requestURIService->getMessages($channelEntity)
                    )
                        ->getBody()->getContents(),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                )['data'] ?? [],
                function (array $carry, array $item): array {
                    $post = $this->DTOFactoryService->createDTOFromPost($item);

                    if (null !== $post) {
                        $carry[] = $post;
                    }

                    return $carry;
                },
                []
            );
        } catch (GuzzleException|JsonException $e) {
            throw new RequestServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
