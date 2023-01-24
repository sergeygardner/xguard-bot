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
enum DayPartEnum implements JsonSerializable
{

    case standard;   // Default pacing mechanism
    case day_parting;// Used for an ad set that has delivery schedule (Ad Scheduling)
    case no_pacing;  // No pacing - accelerated delivery

    case disabled;// Pacing is disabled by default for impressions-paced bid type (Reach & Frequency) ad sets

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
