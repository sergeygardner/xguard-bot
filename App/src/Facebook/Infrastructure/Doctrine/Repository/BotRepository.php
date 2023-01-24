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
use XGuard\Bot\Facebook\Domain\Entity\BotEntity;
use XGuard\Bot\Facebook\Infrastructure\Repository\BotRepositoryInterface;

/**
 *
 */
class BotRepository extends EntityRepository implements BotRepositoryInterface
{

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(BotEntity::class));
    }

    /**
     * @inheritDoc
     */
    public function findOne(array $criteria = []): ?BotEntity
    {
        return $this->findOneBy($criteria);
    }
}
