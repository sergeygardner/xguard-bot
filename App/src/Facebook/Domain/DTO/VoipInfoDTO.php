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
 * This class represents information about a person's VOIP status
 * @see https://developers.facebook.com/docs/graph-api/reference/voip-info/
 */
class VoipInfoDTO implements JsonSerializable
{

    /**
     * @param bool   $has_mobile_app     [Default] Does this user have a pushable mobile app install?
     * @param bool   $has_permission     [Default] Does the viewer have permission to call?
     * @param bool   $is_callable        [Default] Is this user currently callable via mobile?
     * @param bool   $is_callable_webrtc [Default] Is this user currently callable via desktop?
     * @param bool   $is_pushable        [Default] Does this user have an unmuted push token?
     * @param int    $reason_code        [Default] Reason code if not callable
     * @param string $reason_description [Default] Reason description if not callable
     */
    public function __construct(
        public readonly bool $has_mobile_app,
        public readonly bool $has_permission,
        public readonly bool $is_callable,
        public readonly bool $is_callable_webrtc,
        public readonly bool $is_pushable,
        public readonly int $reason_code,
        public readonly string $reason_description
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'has_mobile_app'     => $this->has_mobile_app,
            'has_permission'     => $this->has_permission,
            'is_callable'        => $this->is_callable,
            'is_callable_webrtc' => $this->is_callable_webrtc,
            'is_pushable'        => $this->is_pushable,
            'reason_code'        => $this->reason_code,
            'reason_description' => $this->reason_description,
        ];
    }
}
