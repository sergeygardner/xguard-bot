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
 * This class represents information about an order.
 */
final class OrderInfoDTO implements JsonSerializable
{

    /**
     * @param string|null             $name             Optional. User's name
     * @param string|null             $phone_number     Optional. User's phone number
     * @param string|null             $email            Optional. User's email
     * @param ShippingAddressDTO|null $shipping_address Optional. User's shipping address
     */
    public function __construct(
        public readonly ?string $name,
        public readonly ?string $phone_number,
        public readonly ?string $email,
        public readonly ?ShippingAddressDTO $shipping_address
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'name'             => $this->name,
            'phone_number'     => $this->phone_number,
            'email'            => $this->email,
            'shipping_address' => $this->shipping_address,
        ];
    }
}
