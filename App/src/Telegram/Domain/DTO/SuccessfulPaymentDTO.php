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
 * This class contains basic information about a successful payment.
 */
final class SuccessfulPaymentDTO implements JsonSerializable
{

    /**
     * @param string            $currency                   Three-letter ISO 4217 currency code
     * @param int               $total_amount               Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     * @param string            $invoice_payload            Bot specified invoice payload
     * @param string|null       $shipping_option_id         Optional. Identifier of the shipping option chosen by the user
     * @param OrderInfoDTO|null $order_info                 Optional. Order information provided by the user
     * @param string            $telegram_payment_charge_id Telegram payment identifier
     * @param string            $provider_payment_charge_id Provider payment identifier
     */
    public function __construct(
        public readonly string $currency,
        public readonly int $total_amount,
        public readonly string $invoice_payload,
        public readonly ?string $shipping_option_id,
        public readonly ?OrderInfoDTO $order_info,
        public readonly string $telegram_payment_charge_id,
        public readonly string $provider_payment_charge_id
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'currency'                   => $this->currency,
            'total_amount'               => $this->total_amount,
            'invoice_payload'            => $this->invoice_payload,
            'shipping_option_id'         => $this->shipping_option_id,
            'order_info'                 => $this->order_info,
            'telegram_payment_charge_id' => $this->telegram_payment_charge_id,
            'provider_payment_charge_id' => $this->provider_payment_charge_id,
        ];
    }
}
