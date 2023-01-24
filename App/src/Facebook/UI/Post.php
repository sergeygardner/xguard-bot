<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\UI;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Types\DateTimeImmutableType;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use GuzzleHttp\Client;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Aggregate\BotAggregate;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ChannelIdType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ClientIdType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ClientSecretType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\TypeType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\BotRepository;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\ChannelRepository;
use XGuard\Bot\Facebook\Infrastructure\Service\CriteriaService;
use XGuard\Bot\Facebook\Infrastructure\Service\GuzzleAuthenticationService;
use XGuard\Bot\Facebook\Infrastructure\Service\GuzzleRequestService;
use XGuard\Bot\Facebook\Infrastructure\Service\RequestURIService;
use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ActionType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\BotNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ChannelNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\TextType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\ChannelToBotRepository;
use XGuard\Bot\Shared\UI\AbstractCommand;

/**
 *
 */
final class Post extends AbstractCommand
{

    /**
     *
     * @param array $options
     *
     * @throws Exception
     * @throws ORMException
     * @throws MissingMappingDriverImplementation
     */
    public function __construct(public readonly array $options)
    {
        Type::addType('UuidType', UuidType::class);
        Type::addType('BotNameType', BotNameType::class);
        Type::addType('ClientIdType', ClientIdType::class);
        Type::addType('ClientSecretType', ClientSecretType::class);
        Type::addType('ChannelNameType', ChannelNameType::class);
        Type::addType('ChannelIdType', ChannelIdType::class);
        Type::addType('TypeType', TypeType::class);
        Type::addType('DateType', DateTimeImmutableType::class);
        Type::addType('TextType', TextType::class);
        Type::addType('ActionType', ActionType::class);

        parent::__construct($options);
    }

    /**
     * @return void
     */
    public function get(): void
    {
        $guzzleClient      = new Client();
        $requestURIService = new RequestURIService(
            new BaseURIValueObject($this->consoleOptionService->getBaseURI())
        );
        $DTOFactoryService = new DTOFactoryService();
        $botAggregate      = new BotAggregate(
            new BotRepository($this->entityManager),
            new ChannelRepository($this->entityManager),
            new ChannelToBotRepository($this->entityManager),
            new GuzzleRequestService(
                $guzzleClient,
                $requestURIService,
                $DTOFactoryService,
                new GuzzleAuthenticationService(
                    $guzzleClient,
                    $requestURIService,
                    $DTOFactoryService
                )
            ),
            new CriteriaService(
                new CriteriaDTO(
                    BotRepository::class,
                    [
                        'name' => new BotNameValueObject(
                            $this->consoleOptionService->getBotName()
                        ),
                    ]
                ),
                new CriteriaDTO(
                    ChannelRepository::class,
                    [
                        'name' => new ChannelNameValueObject(
                            $this->consoleOptionService->getChannelName()
                        ),
                    ]
                ),
            ),
            $this->entityManager
        );
        $botAggregate->requestService->requestURIService->setToken(
            new TokenValueObject(
                $botAggregate->requestService->authenticationService->getAccessToken(
                    $botAggregate->botEntity->getClientId()->getValue(),
                    $botAggregate->botEntity->getClientSecret()->getValue()
                )->access_token
            )
        );

        $botAggregate->launchGetPosts();
    }
}
