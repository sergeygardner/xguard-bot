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

use Psr\Http\Message\UriInterface;
use XGuard\Bot\Shared\Domain\ValueObject\TokenValueObject;

/**
 *
 */
interface RequestURIServiceInterface
{

    /**
     * @return UriInterface
     * @example https://api.telegram.org/bot<token>/<method>
     */
    public function sendMessage(): UriInterface;

    /**
     * @param TokenValueObject $token
     *
     * @return RequestURIServiceInterface
     */
    public function setToken(TokenValueObject $token): RequestURIServiceInterface;
}
