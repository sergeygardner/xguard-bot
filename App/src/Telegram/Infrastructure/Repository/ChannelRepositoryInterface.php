<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Infrastructure\Repository;

use XGuard\Bot\Telegram\Domain\Entity\ChannelEntity;

/**
 *
 */
interface ChannelRepositoryInterface
{

    /**
     * @param array $criteria
     *
     * @return ChannelEntity|null
     */
    public function findOne(array $criteria = []): ?ChannelEntity;
}
