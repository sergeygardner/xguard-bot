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
 * This class represents an extended credit invoice group object.
 * @see https://developers.facebook.com/docs/marketing-api/reference/extended-credit-invoice-group/
 */
class ExtendedCreditInvoiceGroupDTO implements JsonSerializable
{

    /**
     * @param string                      $id
     * @param bool|null                   $auto_enroll
     * @param string|null                 $customer_po_number
     * @param ExtendedCreditEmailDTO|null $email
     * @param string[]|null               $emails
     * @param string                      $name
     */
    public function __construct(
        public readonly string $id,
        public readonly ?bool $auto_enroll,
        public readonly ?string $customer_po_number,
        public readonly ?ExtendedCreditEmailDTO $email,
        public readonly ?array $emails,
        public readonly string $name
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                 => $this->id,
            'auto_enroll'        => $this->auto_enroll,
            'customer_po_number' => $this->customer_po_number,
            'email'              => $this->email,
            'emails'             => $this->emails,
            'name'               => $this->name,
        ];
    }
}
