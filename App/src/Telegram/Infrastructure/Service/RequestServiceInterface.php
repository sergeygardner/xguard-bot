<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Infrastructure\Service;

use XGuard\Bot\Shared\Domain\Entity\MessageEntity;
use XGuard\Bot\Telegram\Domain\DTO\MessageDTO;
use XGuard\Bot\Telegram\Domain\Entity\ChannelEntity;
use XGuard\Bot\Telegram\Infrastructure\Exception\RequestServiceException;

/**
 *
 */
interface RequestServiceInterface
{

    /**
     * @param ChannelEntity $channelEntity
     * @param MessageEntity $messageEntity
     *
     * @return MessageDTO
     *
     * @throws RequestServiceException
     */
    public function sendMessage(ChannelEntity $channelEntity, MessageEntity $messageEntity): MessageDTO;
}
