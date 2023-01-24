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
 * The class represents a currency
 * deprecated This endpoint has been deprecated for the UserNode.
 */
class CurrencyDTO implements JsonSerializable
{

    /**
     * @param int    $currency_offset      [Default] Will return a number that describes the number of additional decimal places to include when displaying the person's currency. For example, the API will return 100 because USD is usually displayed with two decimal places. JPY does not use decimal places, so the API will return 1.
     * @param float  $usd_exchange         [Default] The exchange rate between the person's preferred currency and US Dollars
     * @param float  $usd_exchange_inverse [Default] The inverse of usd_exchange
     * @param string $user_currency        [Default] The ISO-4217-3 code for the person's preferred currency (defaulting to USD if the person hasn't set one)
     */
    public function __construct(
        public readonly int $currency_offset,
        public readonly float $usd_exchange,
        public readonly float $usd_exchange_inverse,
        public readonly string $user_currency
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'currency_offset'      => $this->currency_offset,
            'usd_exchange'         => $this->usd_exchange,
            'usd_exchange_inverse' => $this->usd_exchange_inverse,
            'user_currency'        => $this->user_currency,
        ];
    }
}
