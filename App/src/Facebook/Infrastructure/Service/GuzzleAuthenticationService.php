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
use XGuard\Bot\Facebook\Domain\DTO\Authentication\AccessTokenDTO;
use XGuard\Bot\Facebook\Infrastructure\Exception\RequestServiceException;

/**
 *
 */
final class GuzzleAuthenticationService implements AuthenticationServiceInterface
{

    /**
     * @param Client                     $client
     * @param RequestURIServiceInterface $requestURIService
     * @param DTOFactoryServiceInterface $DTOFactoryService
     */
    public function __construct(
        private readonly Client $client,
        private readonly RequestURIServiceInterface $requestURIService,
        private readonly DTOFactoryServiceInterface $DTOFactoryService
    ) {

    }

    /**
     * @inheritDoc
     */
    public function getAccessToken(string $clientId, string $clientSecret): AccessTokenDTO
    {
        try {
            return $this->DTOFactoryService->createDTOFromAccessToken(
                json_decode(
                    $this->client->get(
                        (string)$this->requestURIService->getAccessToken($clientId, $clientSecret)
                    )
                        ->getBody()->getContents(),
                    true,
                    512,
                    JSON_THROW_ON_ERROR
                ) ?? []
            );
        } catch (GuzzleException|JsonException $e) {
            print_r($e);
            throw new RequestServiceException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
