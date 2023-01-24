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

use XGuard\Bot\Shared\Domain\Entity\ChannelToBotEntity;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
interface ChannelToBotRepositoryInterface
{

    /**
     * @param array $criteria
     *
     * @return ChannelToBotEntity|null
     */
    public function findOne(array $criteria = []): ?ChannelToBotEntity;

    /**
     * @param UuidValueObject $uuid
     *
     * @return ChannelToBotEntity|null
     */
    public function findOneByBotId(UuidValueObject $uuid): ?ChannelToBotEntity;

    /**
     * @param UuidValueObject $uuid
     *
     * @return ChannelToBotEntity|null
     */
    public function findOneByChannelId(UuidValueObject $uuid): ?ChannelToBotEntity;
}
