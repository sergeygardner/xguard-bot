<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class AgencyClientDeclarationDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'agency_representing_client'          => 1,
                    'client_based_in_france'              => 2,
                    'client_city'                         => 'London',
                    'client_country_code'                 => 'UK',
                    'client_email_address'                => 'test@test.co.uk',
                    'client_name'                         => 'client_name',
                    'client_postal_code'                  => 'C1 1AA',
                    'client_province'                     => 'London',
                    'client_street'                       => 'client_street',
                    'client_street2'                      => 'client_street2',
                    'has_written_mandate_from_advertiser' => 3,
                    'is_client_paying_invoices'           => 4,
                ],
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromAgencyClientDeclaration(null));

        $agencyClientDeclarationDTO = $DTOFactoryService->createDTOFromAgencyClientDeclaration($data);

        self::assertIsObject($agencyClientDeclarationDTO);
        self::assertEquals(
            $data['agency_representing_client'],
            $agencyClientDeclarationDTO->agency_representing_client
        );
        self::assertEquals($data['client_based_in_france'], $agencyClientDeclarationDTO->client_based_in_france);
        self::assertEquals($data['client_city'], $agencyClientDeclarationDTO->client_city);
        self::assertEquals($data['client_country_code'], $agencyClientDeclarationDTO->client_country_code);
        self::assertEquals($data['client_email_address'], $agencyClientDeclarationDTO->client_email_address);
        self::assertEquals($data['client_name'], $agencyClientDeclarationDTO->client_name);
        self::assertEquals($data['client_postal_code'], $agencyClientDeclarationDTO->client_postal_code);
        self::assertEquals($data['client_province'], $agencyClientDeclarationDTO->client_province);
        self::assertEquals($data['client_street'], $agencyClientDeclarationDTO->client_street);
        self::assertEquals($data['client_street2'], $agencyClientDeclarationDTO->client_street2);
        self::assertEquals(
            $data['has_written_mandate_from_advertiser'],
            $agencyClientDeclarationDTO->has_written_mandate_from_advertiser
        );
        self::assertEquals($data['is_client_paying_invoices'], $agencyClientDeclarationDTO->is_client_paying_invoices);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($agencyClientDeclarationDTO, JSON_THROW_ON_ERROR)
        );
    }
}
