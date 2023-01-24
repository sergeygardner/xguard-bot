<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Infrastructure\Doctrine\Aggregate;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Exception;
use XGuard\Bot\Shared\Infrastructure\Repository\ChannelToBotRepositoryInterface;
use XGuard\Bot\Shared\Infrastructure\Repository\MessageActionRepositoryInterface;
use XGuard\Bot\Shared\Infrastructure\Repository\MessageRepositoryInterface;
use XGuard\Bot\Telegram\Domain\Aggregate\AbstractBotAggregate;
use XGuard\Bot\Telegram\Infrastructure\Repository\BotRepositoryInterface;
use XGuard\Bot\Telegram\Infrastructure\Repository\ChannelRepositoryInterface;
use XGuard\Bot\Telegram\Infrastructure\Service\CriteriaServiceInterface;
use XGuard\Bot\Telegram\Infrastructure\Service\RequestServiceInterface;

/**
 *
 */
class BotAggregate extends AbstractBotAggregate implements BotAggregateInterface
{

    /**
     * @var EntityManager
     */
    protected readonly EntityManager $entityManager;

    /**
     * @param BotRepositoryInterface           $botRepository
     * @param ChannelRepositoryInterface       $channelRepository
     * @param ChannelToBotRepositoryInterface  $channelToBotRepository
     * @param MessageRepositoryInterface       $messageRepository
     * @param MessageActionRepositoryInterface $messageActionRepository
     * @param CriteriaServiceInterface         $criteriaService
     * @param RequestServiceInterface          $requestService
     * @param EntityManager|null               $entityManager
     */
    public function __construct(
        BotRepositoryInterface $botRepository,
        ChannelRepositoryInterface $channelRepository,
        ChannelToBotRepositoryInterface $channelToBotRepository,
        MessageRepositoryInterface $messageRepository,
        MessageActionRepositoryInterface $messageActionRepository,
        CriteriaServiceInterface $criteriaService,
        RequestServiceInterface $requestService,
        ?EntityManager $entityManager = null
    ) {
        parent::__construct(
            $botRepository,
            $channelRepository,
            $channelToBotRepository,
            $messageRepository,
            $messageActionRepository,
            $criteriaService,
            $requestService
        );

        $this->entityManager = $entityManager;
    }

    /**
     * @inheritDoc
     * @throws ORMException
     */
    protected function save(mixed $entity = null): void
    {
        $this->entityManager->persist($entity);
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function flush(): void
    {
        $this->entityManager->flush();
    }
}
