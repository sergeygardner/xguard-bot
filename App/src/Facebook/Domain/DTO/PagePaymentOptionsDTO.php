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
 * This class represents page payment options in the Graph API. Used for Facebook Pages.
 * @see https://developers.facebook.com/docs/graph-api/reference/page-payment-options/
 */
class PagePaymentOptionsDTO implements JsonSerializable
{

    /**
     * @param int $amex       [Default] Whether the business accepts American Express as a payment option
     * @param int $cash_only  [Default] Whether the business accepts cash only as a payment option
     * @param int $discover   [Default] Whether the business accepts Discover as a payment option
     * @param int $mastercard [Default] Whether the business accepts MasterCard as a payment option
     * @param int $visa       [Default] Whether the business accepts Visa as a payment option
     */
    public function __construct(
        public readonly int $amex,
        public readonly int $cash_only,
        public readonly int $discover,
        public readonly int $mastercard,
        public readonly int $visa
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'amex'       => $this->amex,
            'cash_only'  => $this->cash_only,
            'discover'   => $this->discover,
            'mastercard' => $this->mastercard,
            'visa'       => $this->visa,
        ];
    }
}
