<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PageCategoryDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'                 => 'id',
                    'api_enum'           => 'api_enum',
                    'fb_page_categories' => null,
                    'name'               => 'name',
                ],
            ],
            [
                [
                    'id'                 => 'id',
                    'api_enum'           => 'api_enum',
                    'fb_page_categories' => [
                        [
                            'id'                 => 'id2',
                            'api_enum'           => 'api_enum2',
                            'fb_page_categories' => null,
                            'name'               => 'name2',
                        ],
                    ],
                    'name'               => 'name',
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

        self::assertNull($DTOFactoryService->createDTOFromPageCategory(null));
        self::assertNull($DTOFactoryService->createDTOFromPageCategories(null));

        $pageCategoryDTO = $DTOFactoryService->createDTOFromPageCategory($data);

        self::assertIsObject($pageCategoryDTO);
        self::assertEquals($data['id'], $pageCategoryDTO->id);
        self::assertEquals($data['api_enum'], $pageCategoryDTO->api_enum);
        self::assertEquals(
            json_encode($data['fb_page_categories'], JSON_THROW_ON_ERROR),
            json_encode($pageCategoryDTO->fb_page_categories, JSON_THROW_ON_ERROR)
        );
        self::assertEquals($data['name'], $pageCategoryDTO->name);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($pageCategoryDTO, JSON_THROW_ON_ERROR)
        );
    }
}
