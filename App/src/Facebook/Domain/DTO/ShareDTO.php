<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\DTO;

use JsonSerializable;

/**
 * This class represents a number of times the post has been shared
 */
class ShareDTO implements JsonSerializable
{

    /**
     * @param mixed $count [Default] TODO add a description and a type
     */
    public function __construct(public readonly mixed $count)
    {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'count' => $this->count,
        ];
    }
}
