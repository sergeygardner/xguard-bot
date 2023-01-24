<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class LocationDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'city'         => 'city',
                    'city_id'      => null,
                    'country'      => 'country',
                    'country_code' => null,
                    'latitude'     => 0.01,
                    'located_in'   => 'located_in',
                    'longitude'    => 0.02,
                    'name'         => 'name',
                    'region'       => null,
                    'region_id'    => null,
                    'state'        => 'state',
                    'street'       => 'street',
                    'zip'          => 'zip',
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

        self::assertNull($DTOFactoryService->createDTOFromLocation(null));

        $locationDTO = $DTOFactoryService->createDTOFromLocation($data);

        self::assertIsObject($locationDTO);
        self::assertEquals($data['city'], $locationDTO->city);
        self::assertEquals($data['city_id'], $locationDTO->city_id);
        self::assertEquals($data['country'], $locationDTO->country);
        self::assertEquals($data['country_code'], $locationDTO->country_code);
        self::assertEquals($data['latitude'], $locationDTO->latitude);
        self::assertEquals($data['located_in'], $locationDTO->located_in);
        self::assertEquals($data['longitude'], $locationDTO->longitude);
        self::assertEquals($data['name'], $locationDTO->name);
        self::assertEquals($data['region'], $locationDTO->region);
        self::assertEquals($data['region_id'], $locationDTO->region_id);
        self::assertEquals($data['state'], $locationDTO->state);
        self::assertEquals($data['street'], $locationDTO->street);
        self::assertEquals($data['zip'], $locationDTO->zip);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($locationDTO, JSON_THROW_ON_ERROR)
        );
    }
}
