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
 * This class represents a shipping address.
 */
final class ShippingAddressDTO implements JsonSerializable
{

    /**
     * @param string $country_code Two-letter ISO 3166-1 alpha-2 country code
     * @param string $state        State, if applicable
     * @param string $city         City
     * @param string $street_line1 First line for the address
     * @param string $street_line2 Second line for the address
     * @param string $post_code    Address post code
     */
    public function __construct(
        public readonly string $country_code,
        public readonly string $state,
        public readonly string $city,
        public readonly string $street_line1,
        public readonly string $street_line2,
        public readonly string $post_code
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'country_code' => $this->country_code,
            'state'        => $this->state,
            'city'         => $this->city,
            'street_line1' => $this->street_line1,
            'street_line2' => $this->street_line2,
            'post_code'    => $this->post_code,
        ];
    }
}
