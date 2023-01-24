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
use XGuard\Bot\Facebook\Domain\Enum\VideoStatusEnum;

/**
 * This class represents status attributes of video
 * @see https://developers.facebook.com/docs/graph-api/reference/video-status/
 */
class VideoStatusDTO implements JsonSerializable
{

    /**
     * @param int             $processing_progress [Default] Video processing progress in percent [int 0 to 100].
     * @param VideoStatusEnum $video_status        [Default] Status of a video, either "ready" (uploaded, encoded, thumbnails extracted), "processing" (not ready yet) or "error" (processing failed).
     */
    public function __construct(
        public readonly int $processing_progress,
        public readonly VideoStatusEnum $video_status
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'processing_progress' => $this->processing_progress,
            'video_status'        => $this->video_status,
        ];
    }
}

