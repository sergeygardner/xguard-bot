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

use Console_Table;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use Error;
use Exception;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\BotNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;
use XGuard\Bot\Shared\UI\AbstractCommand;
use XGuard\Bot\Telegram\Domain\Entity\BotEntity;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types\TokenType;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\BotRepository;

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
        Type::addType('BotNameType', BotNameType::class);
        Type::addType('TokenType', TokenType::class);

        parent::__construct($options);
    }

    /**
     * @return void
     */
    public function create(): void
    {
        try {
            $channelRepository = new BotRepository($this->entityManager);
            $channel           = $channelRepository->findOne(
                [
                    'token' => new TokenValueObject($this->consoleOptionService->getToken()),
                    'name'  => new BotNameValueObject($this->consoleOptionService->getBotName()),
                ]
            );

            if (null === $channel) {
                $this->entityManager->persist(
                    new BotEntity(
                        UuidValueObject::generate(),
                        new TokenValueObject($this->consoleOptionService->getToken()),
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
            $channelRepository = new BotRepository($this->entityManager);
            $consoleTable      = new Console_Table();

            $consoleTable->setHeaders(['bot_id', 'bot_token', 'bot_name']);

            foreach ($channelRepository->findAll() as $channel) {
                /**
                 * @var BotEntity $channel
                 */
                $consoleTable->addRow($channel->jsonSerialize());
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
            $channelRepository = new BotRepository($this->entityManager);
            $channel           = $channelRepository->findOne(
                [
                    'id'    => new UuidValueObject($this->consoleOptionService->getId()),
                    'token' => new TokenValueObject($this->consoleOptionService->getToken()),
                    'name'  => new BotNameValueObject($this->consoleOptionService->getBotName()),
                ]
            );

            if (null !== $channel) {
                $channel->setToken(new TokenValueObject($this->consoleOptionService->getNewToken()));
                $channel->setName(new BotNameValueObject($this->consoleOptionService->getNewBotName()));

                $this->entityManager->persist($channel);
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
            $channelRepository = new BotRepository($this->entityManager);
            $channel           = $channelRepository->findOne(
                [
                    'id'    => new UuidValueObject($this->consoleOptionService->getId()),
                    'token' => new TokenValueObject($this->consoleOptionService->getToken()),
                    'name'  => new BotNameValueObject($this->consoleOptionService->getBotName()),
                ]
            );

            if (null !== $channel) {
                $this->entityManager->remove($channel);
                $this->entityManager->flush();
            }

            $this->read();

        } catch (Error|Exception $e) {
            echo PHP_EOL, $e->getMessage(), PHP_EOL, UuidValueObject::generate(), PHP_EOL;
        }
    }
}
