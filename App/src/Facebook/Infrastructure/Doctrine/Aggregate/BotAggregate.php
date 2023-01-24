<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Infrastructure\Doctrine\Aggregate;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use XGuard\Bot\Facebook\Domain\Aggregate\AbstractBotAggregate;
use XGuard\Bot\Facebook\Infrastructure\Repository\BotRepositoryInterface;
use XGuard\Bot\Facebook\Infrastructure\Repository\ChannelRepositoryInterface;
use XGuard\Bot\Facebook\Infrastructure\Service\CriteriaServiceInterface;
use XGuard\Bot\Facebook\Infrastructure\Service\RequestServiceInterface;
use XGuard\Bot\Shared\Infrastructure\Repository\ChannelToBotRepositoryInterface;

/**
 *
 */
class BotAggregate extends AbstractBotAggregate
{

    /**
     * @var EntityManagerInterface
     */
    protected readonly EntityManagerInterface $entityManager;

    public function __construct(
        BotRepositoryInterface $botRepository,
        ChannelRepositoryInterface $channelRepository,
        ChannelToBotRepositoryInterface $channelToBotRepository,
        RequestServiceInterface $requestService,
        CriteriaServiceInterface $criteriaService,
        EntityManagerInterface $entityManager
    ) {
        parent::__construct(
            $botRepository,
            $channelRepository,
            $channelToBotRepository,
            $requestService,
            $criteriaService
        );

        $this->entityManager = $entityManager;
    }

    /**
     * @inheritDoc
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
