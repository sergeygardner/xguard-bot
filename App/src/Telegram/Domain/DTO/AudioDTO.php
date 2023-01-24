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
 * This class represents an audio file to be treated as music by the Telegram clients.
 */
final class AudioDTO implements JsonSerializable
{

    /**
     * @param string            $file_id        Identifier for this file, which can be used to download or reuse the file
     * @param string            $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int               $duration       Duration of the audio in seconds as defined by sender
     * @param string|null       $performer      Optional. Performer of the audio as defined by sender or by audio tags
     * @param string|null       $title          Optional. Title of the audio as defined by sender or by audio tags
     * @param string|null       $file_name      Optional. Original filename as defined by sender
     * @param string|null       $mime_type      Optional. MIME type of the file as defined by sender
     * @param int|null          $file_size      Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
     * @param PhotoSizeDTO|null $thumb          Optional. Thumbnail of the album cover to which the music file belongs
     */
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $duration,
        public readonly ?string $performer,
        public readonly ?string $title,
        public readonly ?string $file_name,
        public readonly ?string $mime_type,
        public readonly ?int $file_size,
        public readonly ?PhotoSizeDTO $thumb
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
            'duration'       => $this->duration,
            'performer'      => $this->performer,
            'title'          => $this->title,
            'file_name'      => $this->file_name,
            'mime_type'      => $this->mime_type,
            'file_size'      => $this->file_size,
            'thumb'          => $this->thumb,
        ];
    }
}
