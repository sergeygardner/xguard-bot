<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\Aggregate;

use DateTimeImmutable;
use XGuard\Bot\Facebook\Domain\Entity\BotEntity;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Facebook\Domain\Exception\BotAggregateBuildDomainException;
use XGuard\Bot\Facebook\Infrastructure\Repository\BotRepositoryInterface;
use XGuard\Bot\Facebook\Infrastructure\Repository\ChannelRepositoryInterface;
use XGuard\Bot\Facebook\Infrastructure\Service\CriteriaServiceInterface;
use XGuard\Bot\Facebook\Infrastructure\Service\RequestServiceInterface;
use XGuard\Bot\Shared\Domain\Entity\ChannelToBotEntity;
use XGuard\Bot\Shared\Domain\Entity\MessageActionEntity;
use XGuard\Bot\Shared\Domain\Entity\MessageEntity;
use XGuard\Bot\Shared\Domain\ValueObject\ActionValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\TextValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Repository\ChannelToBotRepositoryInterface;

/**
 *
 */
abstract class AbstractBotAggregate implements BotAggregateInterface
{

    /**
     * @var BotEntity
     */
    public BotEntity $botEntity;

    /**
     * @var ChannelEntity
     */
    public ChannelEntity $channelEntity;

    /**
     * @var ChannelToBotEntity
     */
    public ChannelToBotEntity $channelToBotEntity;

    /**
     *
     */
    public function __construct(
        public readonly BotRepositoryInterface $botRepository,
        public readonly ChannelRepositoryInterface $channelRepository,
        public readonly ChannelToBotRepositoryInterface $channelToBotRepository,
        public readonly RequestServiceInterface $requestService,
        public readonly CriteriaServiceInterface $criteriaService
    ) {
        $botEntity = $botRepository->findOne($criteriaService->getBotCriteria()->value);

        if (null === $botEntity) {
            throw new BotAggregateBuildDomainException('The bot entity is empty');
        }

        $channelEntity = $channelRepository->findOne($criteriaService->getChannelCriteria()->value);

        if (null === $channelEntity) {
            throw new BotAggregateBuildDomainException('The channel entity is empty');
        }

        $channelToBotEntity = $channelToBotRepository->findOneByChannelId($channelEntity->getId());

        if ($channelToBotEntity === null) {
            throw new BotAggregateBuildDomainException('The ChannelToBot entity is empty!');
        }

        $this->botEntity          = $botEntity;
        $this->channelEntity      = $channelEntity;
        $this->channelToBotEntity = $channelToBotEntity;
    }

    /**
     * @inheritDoc
     */
    public function launchGetPosts(): void
    {
        $channelId = (string)$this->channelEntity->getId()->getValue();

        foreach (
            $this->getPosts(
                $this->channelEntity
            ) as $post) {
            $this->entityManager->persist(
                $messageEntity = new MessageEntity(
                    UuidValueObject::generate(),
                    $post->created_time,
                    new UuidValueObject($channelId),
                    new TextValueObject($post->message)
                )
            );
            $this->save(
                new MessageActionEntity(
                    UuidValueObject::generate(),
                    $messageEntity->getId(),
                    $this->channelToBotEntity->getId(),
                    new DateTimeImmutable(),
                    ActionValueObject::createOpen()
                )
            );
        }

        $this->flush();
    }

    /**
     * @inheritDoc
     */
    public function getPosts(ChannelEntity $channelEntity): array
    {
        return $this->requestService->do($channelEntity);
    }

    /**
     * @return void
     */
    abstract protected function save(): void;

    /**
     * @return void
     */
    abstract protected function flush(): void;
}
