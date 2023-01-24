<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class AgeRangeDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'max' => 10,
                    'min' => 1,
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

        self::assertNull($DTOFactoryService->createDTOFromAgeRange(null));

        $ageRangeDTO = $DTOFactoryService->createDTOFromAgeRange($data);

        self::assertIsObject($ageRangeDTO);
        self::assertEquals($data['max'], $ageRangeDTO->max);
        self::assertEquals($data['min'], $ageRangeDTO->min);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($ageRangeDTO, JSON_THROW_ON_ERROR)
        );
    }
}
