<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Facebook\Infrastructure\Repository\ChannelRepositoryInterface;

/**
 *
 */
class ChannelRepository extends EntityRepository implements ChannelRepositoryInterface
{

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(ChannelEntity::class));
    }

    /**
     * @inheritDoc
     */
    public function findOne(array $criteria = []): ?ChannelEntity
    {
        return $this->findOneBy($criteria);
    }
}
