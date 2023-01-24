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

use XGuard\Bot\Facebook\Domain\DTO\Authentication\AccessTokenDTO;

/**
 *
 */
interface AuthenticationServiceInterface
{

    /**
     * @param string $clientId
     * @param string $clientSecret
     *
     * @return AccessTokenDTO
     */
    public function getAccessToken(string $clientId, string $clientSecret): AccessTokenDTO;
}
