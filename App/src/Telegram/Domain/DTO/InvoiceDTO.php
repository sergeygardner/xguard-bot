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
 * This class contains basic information about an invoice.
 */
final class InvoiceDTO implements JsonSerializable
{

    /**
     * @param string $title           Product name
     * @param string $description     Product description
     * @param string $start_parameter Unique bot deep-linking parameter that can be used to generate this invoice
     * @param string $currency        Three-letter ISO 4217 currency code
     * @param int    $total_amount    Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly string $start_parameter,
        public readonly string $currency,
        public readonly int $total_amount
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'title'           => $this->title,
            'description'     => $this->description,
            'start_parameter' => $this->start_parameter,
            'currency'        => $this->currency,
            'total_amount'    => $this->total_amount,

        ];
    }
}
