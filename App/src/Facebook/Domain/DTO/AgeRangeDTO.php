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
 * The class represents one of the following age ranges: 13–17, 18–20, or 21+
 * @see https://developers.facebook.com/docs/graph-api/reference/age-range/
 */
class AgeRangeDTO implements JsonSerializable
{

    /**
     * @param int $max [Default] The upper bounds of the range for this person's age. enum{17, 20, or empty}.
     * @param int $min [Default] The lower bounds of the range for this person's age. enum{13, 18, 21}
     */
    public function __construct(
        public readonly int $max,
        public readonly int $min
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'max' => $this->max,
            'min' => $this->min,
        ];
    }
}
