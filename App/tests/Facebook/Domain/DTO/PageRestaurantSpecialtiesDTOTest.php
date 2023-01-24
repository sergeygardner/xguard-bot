<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PageRestaurantSpecialtiesDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'breakfast' => 1,
                    'coffee'    => 2,
                    'dinner'    => 3,
                    'drinks'    => 4,
                    'lunch'     => 5,
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

        self::assertNull($DTOFactoryService->createDTOFromPageRestaurantSpecialties(null));

        $pageRestaurantSpecialtiesDTO = $DTOFactoryService->createDTOFromPageRestaurantSpecialties($data);

        self::assertIsObject($pageRestaurantSpecialtiesDTO);
        self::assertEquals($data['breakfast'], $pageRestaurantSpecialtiesDTO->breakfast);
        self::assertEquals($data['coffee'], $pageRestaurantSpecialtiesDTO->coffee);
        self::assertEquals($data['dinner'], $pageRestaurantSpecialtiesDTO->dinner);
        self::assertEquals($data['drinks'], $pageRestaurantSpecialtiesDTO->drinks);
        self::assertEquals($data['lunch'], $pageRestaurantSpecialtiesDTO->lunch);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($pageRestaurantSpecialtiesDTO, JSON_THROW_ON_ERROR)
        );
    }
}
