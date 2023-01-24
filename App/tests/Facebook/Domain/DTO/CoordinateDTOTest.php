<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class CoordinateDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'checkin_id'  => null,
                    'author_uid'  => null,
                    'page_id'     => null,
                    'target_id'   => null,
                    'target_href' => null,
                    'coords'      => null,
                    'tagged_uids' => null,
                    'timestamp'   => null,
                    'message'     => null,
                    'target_type' => null,
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

        self::assertNull($DTOFactoryService->createDTOFromCoordinate(null));

        $coordinateDTO = $DTOFactoryService->createDTOFromCoordinate($data);

        self::assertIsObject($coordinateDTO);
        self::assertEquals($data['checkin_id'], $coordinateDTO->checkin_id);
        self::assertEquals($data['author_uid'], $coordinateDTO->author_uid);
        self::assertEquals($data['page_id'], $coordinateDTO->page_id);
        self::assertEquals($data['target_id'], $coordinateDTO->target_id);
        self::assertEquals($data['target_href'], $coordinateDTO->target_href);
        self::assertEquals($data['coords'], $coordinateDTO->coords);
        self::assertEquals($data['tagged_uids'], $coordinateDTO->tagged_uids);
        self::assertEquals($data['timestamp'], $coordinateDTO->timestamp);
        self::assertEquals($data['message'], $coordinateDTO->message);
        self::assertEquals($data['target_type'], $coordinateDTO->target_type);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($coordinateDTO, JSON_THROW_ON_ERROR)
        );
    }
}
