<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Infrastructure\Repository;

use XGuard\Bot\Facebook\Domain\Entity\BotEntity;

/**
 *
 */
interface BotRepositoryInterface
{

    /**
     * @param array $criteria
     *
     * @return BotEntity|null
     */
    public function findOne(array $criteria = []): ?BotEntity;
}
