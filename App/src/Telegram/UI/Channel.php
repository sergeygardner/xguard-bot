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
use Doctrine\DBAL\Types\DateTimeImmutableType;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use Error;
use Exception;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ChannelNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\TextType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;
use XGuard\Bot\Shared\UI\AbstractCommand;
use XGuard\Bot\Telegram\Domain\Entity\ChannelEntity;
use XGuard\Bot\Telegram\Domain\ValueObject\ChatIdValueObject;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types\ChatIdType;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\ChannelRepository;

/**
 *
 */
final class Channel extends AbstractCommand
{

    /**
     * @throws \Doctrine\DBAL\Exception
     * @throws MissingMappingDriverImplementation|ORMException
     */
    public function __construct(array $options)
    {
        Type::addType('UuidType', UuidType::class);
        Type::addType('ChannelNameType', ChannelNameType::class);
        Type::addType('ChatIdType', ChatIdType::class);
        Type::addType('TextType', TextType::class);
        Type::addType('DateType', DateTimeImmutableType::class);

        parent::__construct($options);
    }

    /**
     * @return void
     */
    public function create(): void
    {
        try {
            $channelRepository = new ChannelRepository($this->entityManager);
            $channel           = $channelRepository->findOne(
                [
                    'chat_id' => new ChatIdValueObject($this->consoleOptionService->getChatId()),
                    'name'    => new ChannelNameValueObject($this->consoleOptionService->getChannelName()),
                ]
            );

            if (null === $channel) {
                $this->entityManager->persist(
                    new ChannelEntity(
                        UuidValueObject::generate(),
                        new ChatIdValueObject($this->consoleOptionService->getChatId()),
                        new ChannelNameValueObject($this->consoleOptionService->getChannelName())
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
            $channelRepository = new ChannelRepository($this->entityManager);
            $consoleTable      = new Console_Table();

            $consoleTable->setHeaders(['channel_id', 'chat_id', 'channel_name']);

            foreach ($channelRepository->findAll() as $channel) {
                /**
                 * @var ChannelEntity $channel
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
            $channelRepository = new ChannelRepository($this->entityManager);
            $channel           = $channelRepository->findOne(
                [
                    'id'      => new UuidValueObject($this->consoleOptionService->getId()),
                    'chat_id' => new ChatIdValueObject($this->consoleOptionService->getChatId()),
                    'name'    => new ChannelNameValueObject($this->consoleOptionService->getChannelName()),
                ]
            );

            if (null !== $channel) {
                $channel->setChatId(new ChatIdValueObject($this->consoleOptionService->getNewChatId()));
                $channel->setName(new ChannelNameValueObject($this->consoleOptionService->getNewChannelName()));

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
            $channelRepository = new ChannelRepository($this->entityManager);
            $channel           = $channelRepository->findOne(
                [
                    'id'      => new UuidValueObject($this->consoleOptionService->getId()),
                    'chat_id' => new ChatIdValueObject($this->consoleOptionService->getChatId()),
                    'name'    => new ChannelNameValueObject($this->consoleOptionService->getChannelName()),
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
