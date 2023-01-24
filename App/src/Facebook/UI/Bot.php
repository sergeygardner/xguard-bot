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

use Console_Table;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use Error;
use Exception;
use XGuard\Bot\Facebook\Domain\Entity\BotEntity;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientIdValueObject;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientSecretValueObject;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ClientIdType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ClientSecretType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\BotRepository;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\BotNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;
use XGuard\Bot\Shared\UI\AbstractCommand;

/**
 *
 */
final class Bot extends AbstractCommand
{

    /**
     * @throws \Doctrine\DBAL\Exception
     * @throws MissingMappingDriverImplementation|ORMException
     */
    public function __construct(array $options)
    {
        Type::addType('UuidType', UuidType::class);
        Type::addType('ClientIdType', ClientIdType::class);
        Type::addType('ClientSecretType', ClientSecretType::class);
        Type::addType('BotNameType', BotNameType::class);

        parent::__construct($options);
    }

    /**
     * @return void
     */
    public function create(): void
    {
        try {
            $botRepository = new BotRepository($this->entityManager);
            $bot           = $botRepository->findOne(
                [
                    'client_id'     => new ClientIdValueObject($this->consoleOptionService->getClientId()),
                    'client_secret' => new ClientSecretValueObject($this->consoleOptionService->getClientSecret()),
                    'name'          => new BotNameValueObject($this->consoleOptionService->getBotName()),
                ]
            );

            if (null === $bot) {
                $this->entityManager->persist(
                    new BotEntity(
                        UuidValueObject::generate(),
                        new ClientIdValueObject($this->consoleOptionService->getClientId()),
                        new ClientSecretValueObject($this->consoleOptionService->getClientSecret()),
                        new BotNameValueObject($this->consoleOptionService->getBotName())
                    )
                );
                $this->entityManager->flush();
            }

            $this->read();
        } catch (Error|Exception $e) {
            echo PHP_EOL, $e->getMessage(), PHP_EOL, UuidValueObject::generate(), PHP_EOL;
        }
    }

    /**
     * @return void
     */
    public function read(): void
    {
        try {
            $botRepository = new BotRepository($this->entityManager);
            $consoleTable  = new Console_Table();

            $consoleTable->setHeaders(['bot_id', 'bot_client_id', 'bot_client_secret', 'bot_name']);

            foreach ($botRepository->findAll() as $bot) {
                /**
                 * @var BotEntity $bot
                 */
                $consoleTable->addRow($bot->jsonSerialize());
            }

            echo $consoleTable->getTable();
        } catch (Error|Exception $e) {
            echo PHP_EOL, $e->getMessage(), PHP_EOL, UuidValueObject::generate(), PHP_EOL;
        }
    }

    /**
     * @return void
     */
    public function update(): void
    {
        try {
            $botRepository = new BotRepository($this->entityManager);
            $bot           = $botRepository->findOne(
                [
                    'id'            => new UuidValueObject($this->consoleOptionService->getId()),
                    'client_id'     => new ClientIdValueObject($this->consoleOptionService->getClientId()),
                    'client_secret' => new ClientSecretValueObject($this->consoleOptionService->getClientSecret()),
                    'name'          => new BotNameValueObject($this->consoleOptionService->getBotName()),
                ]
            );

            if (null !== $bot) {
                $bot->setClientId(new ClientIdValueObject($this->consoleOptionService->getNewClientId()));
                $bot->setClientSecret(
                    new ClientSecretValueObject($this->consoleOptionService->getNewClientSecret())
                );
                $bot->setName(new BotNameValueObject($this->consoleOptionService->getNewBotName()));

                $this->entityManager->persist($bot);
                $this->entityManager->flush();
            }

            $this->read();

        } catch (Error|Exception $e) {
            echo PHP_EOL, $e->getMessage(), PHP_EOL, UuidValueObject::generate(), PHP_EOL;
        }
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        try {
            $botRepository = new BotRepository($this->entityManager);
            $bot           = $botRepository->findOne(
                [
                    'id'            => new UuidValueObject($this->consoleOptionService->getId()),
                    'client_id'     => new ClientIdValueObject($this->consoleOptionService->getClientId()),
                    'client_secret' => new ClientSecretValueObject($this->consoleOptionService->getClientSecret()),
                    'name'          => new BotNameValueObject($this->consoleOptionService->getBotName()),
                ]
            );

            if (null !== $bot) {
                $this->entityManager->remove($bot);
                $this->entityManager->flush();
            }

            $this->read();

        } catch (Error|Exception $e) {
            echo PHP_EOL, $e->getMessage(), PHP_EOL, UuidValueObject::generate(), PHP_EOL;
        }
    }
}
