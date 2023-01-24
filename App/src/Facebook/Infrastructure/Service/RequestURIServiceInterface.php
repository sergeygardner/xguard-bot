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

use Psr\Http\Message\UriInterface;
use XGuard\Bot\Facebook\Domain\Entity\ChannelEntity;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;

/**
 *
 */
interface RequestURIServiceInterface
{

    /**
     * @param TokenValueObject|null $token
     *
     * @return RequestURIServiceInterface
     */
    public function setToken(?TokenValueObject $token): RequestURIServiceInterface;

    /**
     * @param ChannelEntity $channelEntity
     *
     * @return UriInterface
     * @example https://graph.facebook.com/<what>?access_token=<token>
     */
    public function getMessage(ChannelEntity $channelEntity): UriInterface;

    /**
     * @param ChannelEntity $channelEntity
     *
     * @return UriInterface
     * @example https://graph.facebook.com/<what>?access_token=<token>
     */
    public function getMessages(ChannelEntity $channelEntity): UriInterface;

    /**
     * @param string $clientId
     * @param string $clientSecret
     *
     * @return UriInterface
     * @example https://graph.facebook.com/<what>?grant_type=client_credentials&client_id=<client_id>&client_secret=<client_secret>
     */
    public function getAccessToken(string $clientId, string $clientSecret): UriInterface;
}
