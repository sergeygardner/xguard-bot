<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PageRestaurantServicesDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'catering' => true,
                    'delivery' => true,
                    'groups'   => true,
                    'kids'     => true,
                    'outdoor'  => true,
                    'pickup'   => true,
                    'reserve'  => true,
                    'takeout'  => true,
                    'waiter'   => true,
                    'walkins'  => true,
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

        self::assertNull($DTOFactoryService->createDTOFromPageRestaurantServices(null));

        $pageRestaurantServicesDTO = $DTOFactoryService->createDTOFromPageRestaurantServices($data);

        self::assertIsObject($pageRestaurantServicesDTO);
        self::assertEquals($data['catering'], $pageRestaurantServicesDTO->catering);
        self::assertEquals($data['delivery'], $pageRestaurantServicesDTO->delivery);
        self::assertEquals($data['groups'], $pageRestaurantServicesDTO->groups);
        self::assertEquals($data['kids'], $pageRestaurantServicesDTO->kids);
        self::assertEquals($data['outdoor'], $pageRestaurantServicesDTO->outdoor);
        self::assertEquals($data['pickup'], $pageRestaurantServicesDTO->pickup);
        self::assertEquals($data['reserve'], $pageRestaurantServicesDTO->reserve);
        self::assertEquals($data['takeout'], $pageRestaurantServicesDTO->takeout);
        self::assertEquals($data['waiter'], $pageRestaurantServicesDTO->waiter);
        self::assertEquals($data['walkins'], $pageRestaurantServicesDTO->walkins);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($pageRestaurantServicesDTO, JSON_THROW_ON_ERROR)
        );
    }
}
