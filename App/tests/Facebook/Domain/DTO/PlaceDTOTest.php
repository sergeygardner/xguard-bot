<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PlaceDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'             => null,
                    'location'       => [
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
                    'name'           => 'name',
                    'overall_rating' => null,
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

        self::assertNull($DTOFactoryService->createDTOFromPlace(null));

        $placeDTO = $DTOFactoryService->createDTOFromPlace($data);

        self::assertIsObject($placeDTO);
        self::assertEquals($data['id'], $placeDTO->id);
        self::assertEquals(
            json_encode($data['location'], JSON_THROW_ON_ERROR),
            json_encode($placeDTO->location, JSON_THROW_ON_ERROR)
        );
        self::assertEquals($data['name'], $placeDTO->name);
        self::assertEquals($data['overall_rating'], $placeDTO->overall_rating);
        self::assertNotEmpty(json_encode($placeDTO, JSON_THROW_ON_ERROR));
    }
}
