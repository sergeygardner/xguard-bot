<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Infrastructure\Service;

use XGuard\Bot\Facebook\Domain\DTO\PostDTO;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Facebook\Infrastructure\Exception\RequestServiceException;

/**
 *
 */
interface RequestServiceInterface
{

    /**
     * @param ChannelEntity $channelEntity
     *
     * @return PostDTO[]
     *
     * @throws RequestServiceException
     */
    public function do(ChannelEntity $channelEntity): array;
}
