<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Domain\DTO;

use JsonSerializable;

/**
 * This class represents a service message about a user allowing a bot added to the attachment menu to write messages. Currently, it holds no information.
 */
final class WriteAccessAllowedDTO implements JsonSerializable
{

    /**
     * @var array
     */
    public readonly array $values;

    /**
     *
     */
    public function __construct($values)
    {
        $this->values = $values;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return $this->values;
    }
}