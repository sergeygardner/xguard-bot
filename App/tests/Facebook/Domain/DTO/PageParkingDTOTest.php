<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PageParkingDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'lot'    => 1,
                    'street' => 2,
                    'valet'  => 3,
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

        self::assertNull($DTOFactoryService->createDTOFromPageParking(null));

        $pageParkingDTO = $DTOFactoryService->createDTOFromPageParking($data);

        self::assertIsObject($pageParkingDTO);
        self::assertEquals($data['lot'], $pageParkingDTO->lot);
        self::assertEquals($data['street'], $pageParkingDTO->street);
        self::assertEquals($data['valet'], $pageParkingDTO->valet);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($pageParkingDTO, JSON_THROW_ON_ERROR)
        );
    }
}
