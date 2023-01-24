<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PageStartDateDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'day'   => 1,
                    'month' => 1,
                    'year'  => 2023,
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

        self::assertNull($DTOFactoryService->createDTOFromPageStartDate(null));

        $pageStartDateDTO = $DTOFactoryService->createDTOFromPageStartDate($data);

        self::assertIsObject($pageStartDateDTO);
        self::assertEquals($data['day'], $pageStartDateDTO->day);
        self::assertEquals($data['month'], $pageStartDateDTO->month);
        self::assertEquals($data['year'], $pageStartDateDTO->year);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($pageStartDateDTO, JSON_THROW_ON_ERROR)
        );
    }
}
