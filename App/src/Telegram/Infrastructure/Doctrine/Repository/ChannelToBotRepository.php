<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use XGuard\Bot\Telegram\Domain\Entity\ChannelToBotEntity;
use XGuard\Bot\Telegram\Infrastructure\Repository\ChannelToBotRepositoryInterface;

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
}
