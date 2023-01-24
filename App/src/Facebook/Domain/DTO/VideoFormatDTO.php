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
 * This class represents a Video Format
 * @see https://developers.facebook.com/docs/graph-api/reference/video-format/
 */
class VideoFormatDTO implements JsonSerializable
{

    /**
     * @param string $embed_html [Default] HTML to embed the video in this format.
     * @param string $filter     [Default] The filter applied to this video format.
     * @param int    $height     [Default] The height of the video in this format.
     * @param string $picture    [Default] The thumbnail for the video in this format.
     * @param int    $width      [Default] The width of the video in this format.
     */
    public function __construct(
        public readonly string $embed_html,
        public readonly string $filter,
        public readonly int $height,
        public readonly string $picture,
        public readonly int $width
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'embed_html' => $this->embed_html,
            'filter'     => $this->filter,
            'height'     => $this->height,
            'picture'    => $this->picture,
            'width'      => $this->width,
        ];
    }
}

