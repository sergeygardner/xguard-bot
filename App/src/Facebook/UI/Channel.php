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
use Doctrine\DBAL\Types\DateTimeImmutableType;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use Error;
use Exception;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Facebook\Domain\ValueObject\ChannelIdValueObject;
use XGuard\Bot\Facebook\Domain\ValueObject\TypeValueObject;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ChannelIdType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\TypeType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\ChannelRepository;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ChannelNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;
use XGuard\Bot\Shared\UI\AbstractCommand;

/**
 *
 */
final class Channel extends AbstractCommand
{

    /**
     * @throws \Doctrine\DBAL\Exception
     * @throws MissingMappingDriverImplementation
     * @throws ORMException
     */
    public function __construct(array $options)
    {
        Type::addType('UuidType', UuidType::class);
        Type::addType('ChannelNameType', ChannelNameType::class);
        Type::addType('ChannelIdType', ChannelIdType::class);
        Type::addType('TypeType', TypeType::class);
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
                    'channel_id' => new ChannelIdValueObject($this->consoleOptionService->getChannelId()),
                    'name'       => new ChannelNameValueObject($this->consoleOptionService->getChannelName()),
                    'type'       => new TypeValueObject($this->consoleOptionService->getChannelType()),
                ]
            );

            if (null === $channel) {
                $this->entityManager->persist(
                    new ChannelEntity(
                        UuidValueObject::generate(),
                        new ChannelIdValueObject($this->consoleOptionService->getChannelId()),
                        new ChannelNameValueObject($this->consoleOptionService->getChannelName()),
                        new TypeValueObject($this->consoleOptionService->getChannelType())
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

            $consoleTable->setHeaders(['id', 'channel_id', 'channel_name', 'channel_type']);

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
                    'id'         => new UuidValueObject($this->consoleOptionService->getId()),
                    'channel_id' => new ChannelIdValueObject($this->consoleOptionService->getChannelId()),
                    'name'       => new ChannelNameValueObject($this->consoleOptionService->getChannelName()),
                    'type'       => new TypeValueObject($this->consoleOptionService->getChannelType()),
                ]
            );

            if (null !== $channel) {
                $channel->setChannelId(new ChannelIdValueObject($this->consoleOptionService->getNewChannelId()));
                $channel->setName(new ChannelNameValueObject($this->consoleOptionService->getNewChannelName()));
                $channel->setType(new TypeValueObject($this->consoleOptionService->getNewChannelType()));

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
                    'id'         => new UuidValueObject($this->consoleOptionService->getId()),
                    'channel_id' => new ChannelIdValueObject($this->consoleOptionService->getChannelId()),
                    'name'       => new ChannelNameValueObject($this->consoleOptionService->getChannelName()),
                    'type'       => new TypeValueObject($this->consoleOptionService->getChannelType()),
                ]
            );

            if (null !== $channel) {
                $this->entityManager->remove($channel);
                $this->entityManager->flush();
            }

            $this->read();

        } catch (Error|Exception $e) {
            echo PHP_EOL, $e->getMessage(), PHP_EOL, $e->getTraceAsString(), PHP_EOL, UuidValueObject::generate(
            ), PHP_EOL;
        }
    }
}
