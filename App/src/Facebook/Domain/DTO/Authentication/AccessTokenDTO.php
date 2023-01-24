<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\DTO\Authentication;

use JsonSerializable;

/**
 *
 */
class AccessTokenDTO implements JsonSerializable
{

    /**
     * @param string $access_token
     * @param string $token_type
     */
    public function __construct(public readonly string $access_token, public readonly string $token_type)
    {
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'access_token' => $this->access_token,
            'token_type'   => $this->token_type,
        ];
    }
}
