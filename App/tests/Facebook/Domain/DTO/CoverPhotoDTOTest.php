<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class CoverPhotoDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'       => 'id',
                    'cover_id' => 'cover_id',
                    'offset_x' => 1.7,
                    'offset_y' => 0.00000009,
                    'source'   => 'source',
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

        self::assertNull($DTOFactoryService->createDTOFromCoverPhoto(null));

        $coverPhotoDTO = $DTOFactoryService->createDTOFromCoverPhoto($data);

        self::assertIsObject($coverPhotoDTO);
        self::assertEquals($data['id'], $coverPhotoDTO->id);
        self::assertEquals($data['cover_id'], $coverPhotoDTO->cover_id);
        self::assertEquals($data['offset_x'], $coverPhotoDTO->offset_x);
        self::assertEquals($data['offset_y'], $coverPhotoDTO->offset_y);
        self::assertEquals($data['source'], $coverPhotoDTO->source);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($coverPhotoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
