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
 * This class describes the position on faces where a mask should be placed by default.
 */
final class MaskPositionDTO implements JsonSerializable
{

    /**
     * @param string $point   The part of the face relative to which the mask should be placed. One of "forehead", "eyes", "mouth", or "chin".
     * @param float  $x_shift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing -1.0 will place mask just to the left of the default mask position.
     * @param float  $y_shift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will place the mask just below the default mask position.
     * @param float  $scale   Mask scaling coefficient. For example, 2.0 means double size.
     */
    public function __construct(
        public readonly string $point,
        public readonly float $x_shift,
        public readonly float $y_shift,
        public readonly float $scale
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'point'   => $this->point,
            'x_shift' => $this->x_shift,
            'y_shift' => $this->y_shift,
            'scale'   => $this->scale,
        ];
    }
}
