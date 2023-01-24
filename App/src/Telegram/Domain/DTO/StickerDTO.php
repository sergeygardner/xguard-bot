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
 * This class represents a sticker.
 */
final class StickerDTO implements JsonSerializable
{

    /**
     * @param string               $file_id           Identifier for this file, which can be used to download or reuse the file
     * @param string               $file_unique_id    Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param string               $type              Type of the sticker, currently one of "regular", "mask", "custom_emoji". The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
     * @param int                  $width             Sticker width
     * @param int                  $height            Sticker height
     * @param bool                 $is_animated       True, if the sticker is animated
     * @param bool                 $is_video          True, if the sticker is a video sticker
     * @param PhotoSizeDTO|null    $thumb             Optional. Sticker thumbnail in the .WEBP or .JPG format
     * @param string|null          $emoji             Optional. Emoji associated with the sticker
     * @param string|null          $set_name          Optional. Name of the sticker set to which the sticker belongs
     * @param FileDTO|null         $premium_animation Optional. For premium regular stickers, premium animation for the sticker
     * @param MaskPositionDTO|null $mask_position     Optional. For mask stickers, the position where the mask should be placed
     * @param string|null          $custom_emoji_id   Optional. For custom emoji stickers, unique identifier of the custom emoji
     * @param int|null             $file_size         Optional. File size in bytes
     */
    public function __construct(
        public readonly string $file_id,
        public readonly string $file_unique_id,
        public readonly string $type,
        public readonly int $width,
        public readonly int $height,
        public readonly bool $is_animated,
        public readonly bool $is_video,
        public readonly ?PhotoSizeDTO $thumb,
        public readonly ?string $emoji,
        public readonly ?string $set_name,
        public readonly ?FileDTO $premium_animation,
        public readonly ?MaskPositionDTO $mask_position,
        public readonly ?string $custom_emoji_id,
        public readonly ?int $file_size
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'file_id'           => $this->file_id,
            'file_unique_id'    => $this->file_unique_id,
            'type'              => $this->type,
            'width'             => $this->width,
            'height'            => $this->height,
            'is_animated'       => $this->is_animated,
            'is_video'          => $this->is_video,
            'thumb'             => $this->thumb,
            'emoji'             => $this->emoji,
            'set_name'          => $this->set_name,
            'premium_animation' => $this->premium_animation,
            'mask_position'     => $this->mask_position,
            'custom_emoji_id'   => $this->custom_emoji_id,
            'file_size'         => $this->file_size,
        ];
    }
}
