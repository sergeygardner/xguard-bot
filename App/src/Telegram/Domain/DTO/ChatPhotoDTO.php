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
 * This class represents a chat photo.
 */
final class ChatPhotoDTO implements JsonSerializable
{

    /**
     * @param string $small_file_id        File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
     * @param string $small_file_unique_id Unique file identifier of small (160x160) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param string $big_file_id          File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
     * @param string $big_file_unique_id   Unique file identifier of big (640x640) chat photo, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     */
    public function __construct(
        public readonly string $small_file_id,
        public readonly string $small_file_unique_id,
        public readonly string $big_file_id,
        public readonly string $big_file_unique_id
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'small_file_id'        => $this->small_file_id,
            'small_file_unique_id' => $this->small_file_unique_id,
            'big_file_id'          => $this->big_file_id,
            'big_file_unique_id'   => $this->big_file_unique_id,
        ];
    }
}
