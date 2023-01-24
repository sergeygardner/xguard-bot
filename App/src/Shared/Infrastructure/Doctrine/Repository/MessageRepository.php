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
use XGuard\Bot\Shared\Domain\Entity\MessageActionEntity;
use XGuard\Bot\Shared\Domain\Entity\MessageEntity;
use XGuard\Bot\Shared\Infrastructure\Repository\MessageRepositoryInterface;

/**
 *
 */
class MessageRepository extends EntityRepository implements MessageRepositoryInterface
{

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct($em, $em->getClassMetadata(MessageEntity::class));
    }

    /**
     * @inheritDoc
     */
    public function findOne(array $criteria = []): ?MessageEntity
    {
        return $this->findOneBy($criteria);
    }

    /**
     * @param array $messageActions
     *
     * @return MessageEntity[]
     */
    public function findAllByActions(array $messageActions): array
    {
        return array_reduce(
            $this->findBy([
                'id' => array_reduce(
                    $messageActions,
                    static function ($carry, MessageActionEntity $messageActionEntity): array {
                        $carry ??= [];

                        $carry[] = $messageActionEntity->getMessageId();

                        return $carry;
                    }
                ),
            ]),
            static function (array $carry, MessageEntity $messageEntity) {
                $carry[$messageEntity->getId()->getValue()] = $messageEntity;

                return $carry;
            },
            []
        );
    }
}
