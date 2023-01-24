<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Domain\Aggregate;

use DateTimeImmutable;
use XGuard\Bot\Shared\Domain\Entity\ChannelToBotEntity;
use XGuard\Bot\Shared\Domain\Entity\MessageActionEntity;
use XGuard\Bot\Shared\Domain\Entity\MessageEntity;
use XGuard\Bot\Shared\Domain\ValueObject\ActionValueObject;
use XGuard\Bot\Shared\Infrastructure\Repository\ChannelToBotRepositoryInterface;
use XGuard\Bot\Shared\Infrastructure\Repository\MessageActionRepositoryInterface;
use XGuard\Bot\Shared\Infrastructure\Repository\MessageRepositoryInterface;
use XGuard\Bot\Telegram\Domain\DTO\MessageDTO;
use XGuard\Bot\Telegram\Domain\Entity\BotEntity;
use XGuard\Bot\Telegram\Domain\Entity\ChannelEntity;
use XGuard\Bot\Telegram\Domain\Exception\BotAggregateBuildDomainException;
use XGuard\Bot\Telegram\Domain\Exception\BotAggregatePostMessagesRuntimeException;
use XGuard\Bot\Telegram\Infrastructure\Repository\BotRepositoryInterface;
use XGuard\Bot\Telegram\Infrastructure\Repository\ChannelRepositoryInterface;
use XGuard\Bot\Telegram\Infrastructure\Service\CriteriaServiceInterface;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestServiceInterface;

/**
 *
 */
abstract class AbstractBotAggregate implements BotAggregateInterface
{

    /**
     * @var BotEntity
     */
    public readonly BotEntity $botEntity;

    /**
     * @var ChannelEntity
     */
    public readonly ChannelEntity $channelEntity;

    /**
     * @var ChannelToBotEntity
     */
    public readonly ChannelToBotEntity $channelToBotEntity;

    /**
     * @var MessageEntity[]
     */
    public readonly array $messageEntities;

    /**
     * @var MessageActionEntity[]
     */
    public readonly array $messageActionEntities;

    /**
     * @var RequestServiceInterface
     */
    public readonly RequestServiceInterface $requestService;

    /**
     * @param BotRepositoryInterface           $botRepository
     * @param ChannelRepositoryInterface       $channelRepository
     * @param ChannelToBotRepositoryInterface  $channelToBotRepository
     * @param MessageRepositoryInterface       $messageRepository
     * @param MessageActionRepositoryInterface $messageActionRepository
     * @param CriteriaServiceInterface         $criteriaService
     * @param RequestServiceInterface          $requestService
     */
    public function __construct(
        BotRepositoryInterface $botRepository,
        ChannelRepositoryInterface $channelRepository,
        ChannelToBotRepositoryInterface $channelToBotRepository,
        MessageRepositoryInterface $messageRepository,
        MessageActionRepositoryInterface $messageActionRepository,
        CriteriaServiceInterface $criteriaService,
        RequestServiceInterface $requestService
    ) {
        $botEntity = $botRepository->findOne($criteriaService->getBotCriteria()->value);

        if ($botEntity === null) {
            throw new BotAggregateBuildDomainException('The bot entity is empty!');
        }

        $channelToBotEntity = $channelToBotRepository->findOneByBotId($botEntity->getId());

        if ($channelToBotEntity === null) {
            throw new BotAggregateBuildDomainException('The ChannelToBot entity is empty!');
        }

        $messageActionEntities = $messageActionRepository->findAllByChannelToBotByAction(
            $channelToBotEntity,
            ActionValueObject::createOpen()
        );

        $messageEntities = $messageRepository->findAllByActions($messageActionEntities);

        if (empty($messageEntities)) {
            throw new BotAggregateBuildDomainException('The message entities are empty!');
        }

        $channelEntity = $channelRepository->findOne($criteriaService->getChannelCriteria()->value);

        if ($channelEntity === null) {
            throw new BotAggregateBuildDomainException('The channel entity is empty!');
        }

        $this->botEntity             = $botEntity;
        $this->channelEntity         = $channelEntity;
        $this->channelToBotEntity    = $channelToBotEntity;
        $this->messageEntities       = $messageEntities;
        $this->messageActionEntities = $messageActionEntities;
        $this->requestService        = $requestService;
    }

    /**
     * @inheritDoc
     */
    public function launchPostMessages(): void
    {
        foreach ($this->messageActionEntities as $messageAction) {
            $messageEntity = $this->messageEntities[$messageAction->getMessageId()->getValue()] ?? null;

            if (null === $messageEntity) {
                throw new BotAggregatePostMessagesRuntimeException('The message entity is empty!');
            }

            $this->postMessage(
                $this->channelEntity,
                $messageEntity
            );

            $messageAction->setActionDate(new DateTimeImmutable());
            $messageAction->setAction(ActionValueObject::createSent());

            $this->save($messageAction);
        }

        $this->flush();
    }

    /**
     * @inheritDoc
     */
    public function postMessage(ChannelEntity $channelEntity, MessageEntity $messageEntity): MessageDTO
    {
        return $this->requestService->sendMessage($channelEntity, $messageEntity);
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
