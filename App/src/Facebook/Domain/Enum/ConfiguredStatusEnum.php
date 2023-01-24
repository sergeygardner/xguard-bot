<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\Enum;

use JsonSerializable;

/**
 *
 */
enum ConfiguredStatusEnum implements JsonSerializable
{

    case ACTIVE;
    case PAUSED;
    case DELETED;
    case ARCHIVED;

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
