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
 * This class represents a mailing address
 * @see https://developers.facebook.com/docs/graph-api/reference/mailing-address/
 */
class MailingAddressDTO implements JsonSerializable
{

    /**
     * @param string|null  $id          The mailing address ID
     * @param string       $city        [Default] Address city name
     * @param PageDTO|null $city_page   Page representing the address city
     * @param string       $country     [Default] Country of the address
     * @param string       $postal_code [Default] Postal code of the address
     * @param string       $region      [Default] Region or state of the address
     * @param string       $street1     [Default] Street address
     * @param string       $street2     [Default] Second part of the street address - apt, suite, etc
     */
    public function __construct(
        public readonly ?string $id,
        public readonly string $city,
        public readonly ?PageDTO $city_page,
        public readonly string $country,
        public readonly string $postal_code,
        public readonly string $region,
        public readonly string $street1,
        public readonly string $street2
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'          => $this->id,
            'city'        => $this->city,
            'city_page'   => $this->city_page,
            'country'     => $this->country,
            'postal_code' => $this->postal_code,
            'region'      => $this->region,
            'street1'     => $this->street1,
            'street2'     => $this->street2,
        ];
    }
}
