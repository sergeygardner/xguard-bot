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
 * This class represents a venue.
 */
final class VenueDTO implements JsonSerializable
{

    /**
     * @param LocationDTO $location          Venue location. Can't be a live location
     * @param string      $title             Name of the venue
     * @param string      $address           Address of the venue
     * @param string|null $foursquare_id     Optional. Foursquare identifier of the venue
     * @param string|null $foursquare_type   Optional. Foursquare type of the venue. (For example, "arts_entertainment/default", "arts_entertainment/aquarium" or "food/icecream".)
     * @param string|null $google_place_id   Optional. Google Places identifier of the venue
     * @param string|null $google_place_type Optional. Google Places type of the venue. (See supported types.)
     */
    public function __construct(
        public readonly LocationDTO $location,
        public readonly string $title,
        public readonly string $address,
        public readonly ?string $foursquare_id,
        public readonly ?string $foursquare_type,
        public readonly ?string $google_place_id,
        public readonly ?string $google_place_type
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'location'          => $this->location,
            'title'             => $this->title,
            'address'           => $this->address,
            'foursquare_id'     => $this->foursquare_id,
            'foursquare_type'   => $this->foursquare_type,
            'google_place_id'   => $this->google_place_id,
            'google_place_type' => $this->google_place_type,
        ];
    }
}
