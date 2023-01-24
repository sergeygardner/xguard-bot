<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Infrastructure\Repository;

use XGuard\Bot\Shared\Domain\Entity\MessageActionEntity;

/**
 *
 */
interface MessageActionRepositoryInterface
{

    /**
     * @param array $criteria
     *
     * @return MessageActionEntity|null
     */
    public function findOne(array $criteria = []): ?MessageActionEntity;
}
