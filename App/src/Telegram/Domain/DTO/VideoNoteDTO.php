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
 * This class represents a video message (available in Telegram apps as of v.4.0).
 */
final class VideoNoteDTO implements JsonSerializable
{

    /**
     * @param string            $file_id        Identifier for this file, which can be used to download or reuse the file
     * @param string            $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int               $length         Video width and height (diameter of the video message) as defined by sender
     * @param int               $duration       Duration of the video in seconds as defined by sender
     * @param PhotoSizeDTO|null $thumb          Optional. Video thumbnail
     * @param int|null          $file_size      Optional. File size in bytes
     */
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $length,
        public readonly int $duration,
        public readonly ?PhotoSizeDTO $thumb,
        public readonly ?int $file_size
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'file_id'        => $this->file_id,
            'file_unique_id' => $this->file_unique_id,
            'length'         => $this->length,
            'duration'       => $this->duration,
            'thumb'          => $this->thumb,
            'file_size'      => $this->file_size,
        ];
    }
}
