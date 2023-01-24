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
use XGuard\Bot\Facebook\Domain\Enum\AdCampaignLearningStageInfoStatusEnum;

/**
 * This class represents learning stage information for an ad set
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-campaign-learning-stage-info/
 */
class AdCampaignLearningStageInfoDTO implements JsonSerializable
{

    /**
     * @param string[]                              $attribution_windows [Default] Number of days between when a person viewed or clicked your ad and subsequently took action. By default, the attribution window is set to 1-day view and 28-day click.TODO transfer to enum
     * @param int                                   $conversions         [Default] Number of conversions the ad set generated since the time of its last significant edit during the learning phase. Significant edits cause ad sets to reenter the learning phase.
     *                                                                   If the ad set has exited the learning phase successfully, this number will return zero.
     * @param int                                   $last_sig_edit_ts    [Default] Timestamp of the last significant edit that caused ad set to reenter the learning phase.
     * @param AdCampaignLearningStageInfoStatusEnum $status              [Default] Learning Phase progress for the ad set.
     *                                                                   Values:
     *                                                                   LEARNING — The ad set is still learning.
     *                                                                   SUCCESS — The ad set exited the learning phase.
     *                                                                   FAIL — The ad set isn’t generating enough results to exit the learning phase.
     */
    public function __construct(
        public readonly array $attribution_windows,
        public readonly int $conversions,
        public readonly int $last_sig_edit_ts,
        public readonly AdCampaignLearningStageInfoStatusEnum $status
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'attribution_windows' => $this->attribution_windows,
            'conversions'         => $this->conversions,
            'last_sig_edit_ts'    => $this->last_sig_edit_ts,
            'status'              => $this->status,
        ];
    }
}
