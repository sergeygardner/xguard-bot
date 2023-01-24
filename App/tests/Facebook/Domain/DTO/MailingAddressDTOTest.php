<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class MailingAddressDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'          => null,
                    'city'        => 'city',
                    'city_page'   => null,
                    'country'     => 'country',
                    'postal_code' => 'postal_code',
                    'region'      => 'region',
                    'street1'     => 'street1',
                    'street2'     => 'street2',
                ],
            ],
        ];
    }

    /**
     *
     * @param array $data
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromMailingAddress(null));

        $mailingAddressDTO = $DTOFactoryService->createDTOFromMailingAddress($data);

        self::assertIsObject($mailingAddressDTO);
        self::assertEquals($data['id'], $mailingAddressDTO->id);
        self::assertEquals($data['city'], $mailingAddressDTO->city);
        self::assertEquals($data['city_page'], $mailingAddressDTO->city_page);
        self::assertEquals($data['country'], $mailingAddressDTO->country);
        self::assertEquals($data['postal_code'], $mailingAddressDTO->postal_code);
        self::assertEquals($data['region'], $mailingAddressDTO->region);
        self::assertEquals($data['street1'], $mailingAddressDTO->street1);
        self::assertEquals($data['street2'], $mailingAddressDTO->street2);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($mailingAddressDTO, JSON_THROW_ON_ERROR)
        );
    }
}
