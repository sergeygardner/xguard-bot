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
use XGuard\Bot\Facebook\Domain\Enum\AdCampaignFrequencyControlSpecsEnum;

/**
 * This class represents a frequency control spec specifies settings for frequency capping.
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-campaign-frequency-control-specs/
 */
class AdCampaignFrequencyControlSpecsDTO implements JsonSerializable
{

    /**
     * @param AdCampaignFrequencyControlSpecsEnum $event         [Default] Event name, only IMPRESSIONS currently.
     * @param int                                 $interval_days [Default] Interval period in days, between 1 and 90 (inclusive)
     * @param int                                 $max_frequency [Default] The maximum frequency, between 1 and 90 (inclusive)
     */
    public function __construct(
        public readonly AdCampaignFrequencyControlSpecsEnum $event,
        public readonly int $interval_days,
        public readonly int $max_frequency
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'event'         => $this->event,
            'interval_days' => $this->interval_days,
            'max_frequency' => $this->max_frequency,
        ];
    }
}
