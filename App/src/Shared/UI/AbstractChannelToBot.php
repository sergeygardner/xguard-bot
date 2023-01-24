<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\UI;

use Console_Table;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use Error;
use Exception;
use XGuard\Bot\Facebook\Infrastructure\Repository\ChannelToBotRepositoryInterface as FacebookChannelToBotRepositoryInterface;
use XGuard\Bot\Shared\Domain\Entity\ChannelToBotEntity;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;
use XGuard\Bot\Shared\Infrastructure\Repository\ChannelToBotRepositoryInterface as SharedChannelToBotRepositoryInterface;
use XGuard\Bot\Telegram\Infrastructure\Repository\ChannelToBotRepositoryInterface as TelegramChannelToBotRepositoryInterface;

/**
 *
 */
abstract class AbstractChannelToBot extends AbstractCommand
{

    /**
     * @var SharedChannelToBotRepositoryInterface|TelegramChannelToBotRepositoryInterface|FacebookChannelToBotRepositoryInterface
     */
    protected mixed $channelToBotRepository;

    /**
     * @throws \Doctrine\DBAL\Exception
     * @throws MissingMappingDriverImplementation
     * @throws ORMException
     */
    public function __construct(array $options)
    {
        Type::addType('UuidType', UuidType::class);

        parent::__construct($options);
    }

    /**
     * @return void
     */
    public function create(): void
    {
        try {
            $channel = $this->channelToBotRepository->findOne(
                [
                    'channel_id' => new UuidValueObject($this->consoleOptionService->getChannelId()),
                    'bot_id'     => new UuidValueObject($this->consoleOptionService->getBotId()),
                ]
            );

            if (null === $channel) {
                $this->entityManager->persist(
                    new (static::ENTITY_CLASS_NAME)(
                        UuidValueObject::generate(),
                        new UuidValueObject($this->consoleOptionService->getChannelId()),
                        new UuidValueObject($this->consoleOptionService->getBotId())
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
            $consoleTable = new Console_Table();

            $consoleTable->setHeaders(['channel_bot_id', 'channel_id', 'bot_id']);

            foreach ($this->channelToBotRepository->findAll() as $channel) {
                /**
                 * @var ChannelToBotEntity $channel
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
            $channel = $this->channelToBotRepository->findOne(
                [
                    'id'         => new UuidValueObject($this->consoleOptionService->getId()),
                    'channel_id' => new UuidValueObject($this->consoleOptionService->getChannelId()),
                    'bot_id'     => new UuidValueObject($this->consoleOptionService->getBotId()),
                ]
            );

            if (null !== $channel) {
                $channel->setChannelId(new UuidValueObject($this->consoleOptionService->getNewChannelId()));
                $channel->setBotId(new UuidValueObject($this->consoleOptionService->getNewBotId()));

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
            $channel = $this->channelToBotRepository->findOne(
                [
                    'id'         => new UuidValueObject($this->consoleOptionService->getId()),
                    'channel_id' => new UuidValueObject($this->consoleOptionService->getChannelId()),
                    'bot_id'     => new UuidValueObject($this->consoleOptionService->getBotId()),
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
