<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Infrastructure\Doctrine\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use XGuard\Bot\Shared\Domain\Entity\ChannelToBotEntity;
use XGuard\Bot\Shared\Domain\Entity\MessageActionEntity;
use XGuard\Bot\Shared\Domain\ValueObject\ActionValueObject;
use XGuard\Bot\Shared\Infrastructure\Repository\MessageActionRepositoryInterface;

/**
 *
 */
class MessageActionRepository extends EntityRepository implements MessageActionRepositoryInterface
{

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(MessageActionEntity::class));
    }

    /**
     * @inheritDoc
     */
    public function findOne(array $criteria = []): ?MessageActionEntity
    {
        return $this->findOneBy($criteria);
    }

    /**
     * @param ChannelToBotEntity $channelToBotEntity
     * @param ActionValueObject  $action
     *
     * @return MessageActionEntity[]
     */
    public function findAllByChannelToBotByAction(
        ChannelToBotEntity $channelToBotEntity,
        ActionValueObject $action
    ): array {
        return $this->findBy(
            [
                'channel_to_bot_id' => $channelToBotEntity->getId(),
                'action'            => $action,
            ]
        );
    }
}
