<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\Aggregate;

use XGuard\Bot\Facebook\Domain\DTO\PostDTO;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;

/**
 *
 */
interface BotAggregateInterface
{

    /**
     * @return void
     */
    public function launchGetPosts(): void;

    /**
     * @param ChannelEntity $channelEntity
     *
     * @return PostDTO[]
     */
    public function getPosts(ChannelEntity $channelEntity): array;
}
