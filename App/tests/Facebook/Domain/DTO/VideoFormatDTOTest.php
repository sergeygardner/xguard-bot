<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class VideoFormatDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'embed_html' => 'embed_html',
                    'filter'     => 'filter',
                    'height'     => 100,
                    'picture'    => 'picture',
                    'width'      => 200,
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

        self::assertNull($DTOFactoryService->createDTOFromVideoFormat(null));

        $videoFormatDTO = $DTOFactoryService->createDTOFromVideoFormat($data);

        self::assertIsObject($videoFormatDTO);
        self::assertEquals($data['embed_html'], $videoFormatDTO->embed_html);
        self::assertEquals($data['filter'], $videoFormatDTO->filter);
        self::assertEquals($data['height'], $videoFormatDTO->height);
        self::assertEquals($data['picture'], $videoFormatDTO->picture);
        self::assertEquals($data['width'], $videoFormatDTO->width);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($videoFormatDTO, JSON_THROW_ON_ERROR)
        );
    }
}
