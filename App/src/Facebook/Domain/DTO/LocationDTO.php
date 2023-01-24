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
 * The class represents a location.
 * @see https://developers.facebook.com/docs/graph-api/reference/location/
 */
class LocationDTO implements JsonSerializable
{

    /**
     * @param string      $city         [Default] City
     * @param int|null    $city_id      City ID. Any city identified is also a city you can use for targeting ads.
     * @param string      $country      [Default] Country
     * @param string|null $country_code Country code
     * @param float       $latitude     [Default] Latitude
     * @param string      $located_in   [Default] The parent location if this location is located within another location
     * @param float       $longitude    [Default] Longitude
     * @param string      $name         [Default] Name
     * @param string|null $region       Region
     * @param int|null    $region_id    Region ID. Specifies a geographic region, such as California. An identified region is the same as one you can use to target ads.
     * @param string      $state        [Default] State
     * @param string      $street       [Default] Street
     * @param string      $zip          [Default] Zip code
     */
    public function __construct(
        public readonly string $city,
        public readonly ?int $city_id,
        public readonly string $country,
        public readonly ?string $country_code,
        public readonly float $latitude,
        public readonly string $located_in,
        public readonly float $longitude,
        public readonly string $name,
        public readonly ?string $region,
        public readonly ?int $region_id,
        public readonly string $state,
        public readonly string $street,
        public readonly string $zip
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'city'         => $this->city,
            'city_id'      => $this->city_id,
            'country'      => $this->country,
            'country_code' => $this->country_code,
            'latitude'     => $this->latitude,
            'located_in'   => $this->located_in,
            'longitude'    => $this->longitude,
            'name'         => $this->name,
            'region'       => $this->region,
            'region_id'    => $this->region_id,
            'state'        => $this->state,
            'street'       => $this->street,
            'zip'          => $this->zip,
        ];
    }
}
