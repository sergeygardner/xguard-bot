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
 * This class represents an inline keyboard that appears right next to the message it belongs to.
 */
final class InlineKeyboardMarkupDTO implements JsonSerializable
{

    /**
     * @param InlineKeyboardButtonDTO[][] $inline_keyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
     */
    public function __construct(public readonly array $inline_keyboard)
    {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'inline_keyboard' => $this->inline_keyboard,
        ];
    }
}
