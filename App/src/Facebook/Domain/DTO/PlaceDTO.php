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
 * The class represents a place
 * @see https://developers.facebook.com/docs/graph-api/reference/place/
 */
class PlaceDTO implements JsonSerializable
{

    /**
     * @param string|null $id             ID
     * @param LocationDTO $location       [Default] Location of Place
     * @param string      $name           [Default] Name
     * @param float|null  $overall_rating Overall Rating of Place, on a 5-star scale. 0 means not enough data to get a combined rating.
     */
    public function __construct(
        public readonly ?string $id,
        public readonly LocationDTO $location,
        public readonly string $name,
        public readonly ?float $overall_rating
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'             => $this->id,
            'location'       => $this->location,
            'name'           => $this->name,
            'overall_rating' => $this->overall_rating,
        ];
    }
}
