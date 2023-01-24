<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class ShareDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'count' => 1,
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

        self::assertNull($DTOFactoryService->createDTOFromShare(null));

        $shareDTO = $DTOFactoryService->createDTOFromShare($data);

        self::assertIsObject($shareDTO);
        self::assertEquals($data['count'], $shareDTO->count);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($shareDTO, JSON_THROW_ON_ERROR)
        );
    }
}
