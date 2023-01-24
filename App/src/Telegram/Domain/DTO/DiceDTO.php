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
 * This class represents an animated emoji that displays a random value.
 */
final class DiceDTO implements JsonSerializable
{

    /**
     * @param string $emoji Emoji on which the dice throw animation is based
     * @param int    $value Value of the dice, 1-6 for "🎲", "🎯" and "🎳" base emoji, 1-5 for "🏀" and "⚽" base emoji, 1-64 for "🎰" base emoji
     */
    public function __construct(
        public readonly string $emoji,
        public readonly int $value
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'emoji' => $this->emoji,
            'value' => $this->value,
        ];
    }
}
