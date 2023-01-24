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
 * This class represents a file uploaded to Telegram Passport. Currently, all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
 */
final class PassportFileDTO implements JsonSerializable
{

    /**
     * @param string $file_id        Identifier for this file, which can be used to download or reuse the file
     * @param string $file_unique_id Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int    $file_size      File size in bytes
     * @param int    $file_date      Unix time when the file was uploaded
     */
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly int $file_size,
        public readonly int $file_date,
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
            'file_size'      => $this->file_size,
            'file_date'      => $this->file_date,
        ];
    }
}
