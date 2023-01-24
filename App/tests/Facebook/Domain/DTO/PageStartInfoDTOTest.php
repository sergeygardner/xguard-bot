<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PageStartInfoDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'date' => [
                        'day'   => 1,
                        'month' => 1,
                        'year'  => 2023,
                    ],
                    'type' => 'type',
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

        self::assertNull($DTOFactoryService->createDTOFromPageStartInfo(null));

        $pageStartInfoDTO = $DTOFactoryService->createDTOFromPageStartInfo($data);

        self::assertIsObject($pageStartInfoDTO);
        self::assertEquals(
            json_encode($data['date'], JSON_THROW_ON_ERROR),
            json_encode($pageStartInfoDTO->date, JSON_THROW_ON_ERROR)
        );
        self::assertEquals($data['type'], $pageStartInfoDTO->type);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($pageStartInfoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
