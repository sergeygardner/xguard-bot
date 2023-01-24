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
 * The class represents a cover photo for a Facebook Event, Group, or Page.
 * @see https://developers.facebook.com/docs/graph-api/reference/cover-photo/
 */
class CoverPhotoDTO implements JsonSerializable
{

    /**
     * @param string $id       [Default] The ID of the cover photo
     * @param string $cover_id [Default] Deprecated. Please use the id field instead
     * @param float  $offset_x [Default] When greater than 0% but less than 100%, the cover photo overflows horizontally. The value represents the horizontal manual offset (the amount the user dragged the photo horizontally to show the part of interest) as a percentage of the offset necessary to make the photo fit the space.
     * @param float  $offset_y [Default] When greater than 0% but less than 100%, the cover photo overflows vertically. The value represents the vertical manual offset (the amount the user dragged the photo vertically to show the part of interest) as a percentage of the offset necessary to make the photo fit the space.
     * @param string $source   [Default] Direct URL for the person's cover photo image
     */
    public function __construct(
        public readonly string $id,
        public readonly string $cover_id,
        public readonly float $offset_x,
        public readonly float $offset_y,
        public readonly string $source
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'       => $this->id,
            'cover_id' => $this->cover_id,
            'offset_x' => $this->offset_x,
            'offset_y' => $this->offset_y,
            'source'   => $this->source,
        ];
    }
}
