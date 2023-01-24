<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\UI;

use Doctrine\DBAL\Types\DateTimeImmutableType;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use Error;
use Exception;
use GuzzleHttp\Client;
use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ActionType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\BotNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ChannelNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\TextType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\ChannelToBotRepository;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\MessageActionRepository;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\MessageRepository;
use XGuard\Bot\Shared\UI\AbstractCommand;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Aggregate\BotAggregate;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types\ChatIdType;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types\TokenType;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\BotRepository;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\ChannelRepository;
use XGuard\Bot\Telegram\Infrastructure\Service\CriteriaService;
use XGuard\Bot\Telegram\Infrastructure\Service\GuzzleRequestService;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestBodyService;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestURIService;

/**
 *
 */
final class Message extends AbstractCommand
{

    /**
     *
     * @throws \Doctrine\DBAL\Exception|MissingMappingDriverImplementation|ORMException
     */
    public function __construct(public readonly array $options)
    {
        Type::addType('UuidType', UuidType::class);
        Type::addType('ChannelNameType', ChannelNameType::class);
        Type::addType('BotNameType', BotNameType::class);
        Type::addType('ChatIdType', ChatIdType::class);
        Type::addType('TokenType', TokenType::class);
        Type::addType('TextType', TextType::class);
        Type::addType('DateType', DateTimeImmutableType::class);
        Type::addType('ActionType', ActionType::class);

        parent::__construct($options);
    }

    /**
     * @return void
     */
    public function post(): void
    {
        try {
            $botAggregate = new BotAggregate(
                new BotRepository($this->entityManager),
                new ChannelRepository($this->entityManager),
                new ChannelToBotRepository($this->entityManager),
                new MessageRepository($this->entityManager),
                new MessageActionRepository($this->entityManager),
                new CriteriaService(
                    new CriteriaDTO(
                        BotRepository::class,
                        [
                            'name' => new BotNameValueObject($this->consoleOptionService->getBotName()),
                        ]
                    ),
                    new CriteriaDTO(
                        ChannelRepository::class,
                        [
                            'name' => new ChannelNameValueObject($this->consoleOptionService->getChannelName()),
                        ]
                    )
                ),
                new GuzzleRequestService(
                    new Client(),
                    new RequestURIService(
                        new BaseURIValueObject($this->consoleOptionService->getBaseURI())
                    ),
                    new RequestBodyService(),
                    new DTOFactoryService()
                ),
                $this->entityManager
            );

            $botAggregate
                ->requestService
                ->requestURIService
                ->setToken(
                    new TokenValueObject($botAggregate->botEntity->getToken()->getValue())
                );

            $botAggregate->launchPostMessages();
        } catch (Error|Exception $e) {
            echo PHP_EOL,
            $e->getMessage(),
            PHP_EOL,
            $e->getTraceAsString(),
            PHP_EOL,
            UuidValueObject::generate(),
            PHP_EOL;
        }
    }
}
