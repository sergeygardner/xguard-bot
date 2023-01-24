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
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Repository\ChannelToBotRepositoryInterface;

/**
 *
 */
class ChannelToBotRepository extends EntityRepository implements ChannelToBotRepositoryInterface
{

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(ChannelToBotEntity::class));
    }

    /**
     * @inheritDoc
     */
    public function findOne(array $criteria = []): ?ChannelToBotEntity
    {
        return $this->findOneBy($criteria);
    }

    /**
     * @inheritDoc
     */
    public function findOneByBotId(UuidValueObject $uuid): ?ChannelToBotEntity
    {
        return $this->findOneBy(['bot_id' => $uuid]);
    }

    /**
     * @inheritDoc
     */
    public function findOneByChannelId(UuidValueObject $uuid): ?ChannelToBotEntity
    {
        return $this->findOneBy(['channel_id' => $uuid]);
    }
}
