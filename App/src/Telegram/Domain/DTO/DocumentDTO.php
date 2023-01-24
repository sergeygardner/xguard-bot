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
 * This class represents a general file (as opposed to photos, voice messages and audio files).
 */
final class DocumentDTO implements JsonSerializable
{

    /**
     * @param string            $file_id        Identifier for this file, which can be used to download or reuse the file
     * @param string            $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param PhotoSizeDTO|null $thumb          Optional. Document thumbnail as defined by sender
     * @param string|null       $file_name      Optional. Original filename as defined by sender
     * @param string|null       $mime_type      Optional. MIME type of the file as defined by sender
     * @param int|null          $file_size      Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this value.
     */
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly ?PhotoSizeDTO $thumb,
        public readonly ?string $file_name,
        public readonly ?string $mime_type,
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
            'thumb'          => $this->thumb,
            'file_name'      => $this->file_name,
            'mime_type'      => $this->mime_type,
            'file_size'      => $this->file_size,
        ];
    }
}
