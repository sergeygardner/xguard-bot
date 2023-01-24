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
 * This class represents description the clients represented by an agency.
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account/agency-client-declaration/v17.0
 */
class AgencyClientDeclarationDTO implements JsonSerializable
{

    /**
     * @param int    $agency_representing_client          Whether this account is for an agency representing a client
     * @param int    $client_based_in_france              Whether the client is based in France
     * @param string $client_city                         Client's city
     * @param string $client_country_code                 Client's country code
     * @param string $client_email_address                Client's email address
     * @param string $client_name                         Name of the client
     * @param string $client_postal_code                  Client's postal code
     * @param string $client_province                     Client's province
     * @param string $client_street                       First line of client's street address
     * @param string $client_street2                      Second line of client's street address
     * @param int    $has_written_mandate_from_advertiser Whether the agency has a written mandate to advertise on behalf of this client
     * @param int    $is_client_paying_invoices           Whether the client is paying via invoice
     */
    public function __construct(
        public readonly int $agency_representing_client,
        public readonly int $client_based_in_france,
        public readonly string $client_city,
        public readonly string $client_country_code,
        public readonly string $client_email_address,
        public readonly string $client_name,
        public readonly string $client_postal_code,
        public readonly string $client_province,
        public readonly string $client_street,
        public readonly string $client_street2,
        public readonly int $has_written_mandate_from_advertiser,
        public readonly int $is_client_paying_invoices
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'agency_representing_client'          => $this->agency_representing_client,
            'client_based_in_france'              => $this->client_based_in_france,
            'client_city'                         => $this->client_city,
            'client_country_code'                 => $this->client_country_code,
            'client_email_address'                => $this->client_email_address,
            'client_name'                         => $this->client_name,
            'client_postal_code'                  => $this->client_postal_code,
            'client_province'                     => $this->client_province,
            'client_street'                       => $this->client_street,
            'client_street2'                      => $this->client_street2,
            'has_written_mandate_from_advertiser' => $this->has_written_mandate_from_advertiser,
            'is_client_paying_invoices'           => $this->is_client_paying_invoices,
        ];
    }
}

