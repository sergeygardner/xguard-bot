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
 * This class represents AdCampaignIssuesInfo
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-campaign-issues-info/
 */
class AdCampaignIssuesInfoDTO implements JsonSerializable
{

    /**
     * @param int    $error_code    [Default] Error code for the issue
     * @param string $error_message [Default] Error message for this ad set with issue
     * @param string $error_summary [Default] Error summary for this ad set with issue
     * @param string $error_type    [Default] error_type
     * @param string $level         [Default] Indicate level of issue, could be ad set or campaign
     */
    public function __construct(
        public readonly int $error_code,
        public readonly string $error_message,
        public readonly string $error_summary,
        public readonly string $error_type,
        public readonly string $level
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'error_code'    => $this->error_code,
            'error_message' => $this->error_message,
            'error_summary' => $this->error_summary,
            'error_type'    => $this->error_type,
            'level'         => $this->level,
        ];
    }
}
