<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class ApplicationObjectStoreURLsDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'amazon_app_store' => 'https://amazon.app/',
                    'fb_canvas'        => 'https://fb.canvas/',
                    'fb_gameroom'      => 'https://fb.gameroom/',
                    'google_play'      => 'https://google.play/',
                    'instant_game'     => 'https://instant.game/',
                    'itunes'           => 'https://itunes.com/',
                    'itunes_ipad'      => 'https://itunes.ipad/',
                    'windows_10_store' => 'https://windows_10.store/',
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

        self::assertNull($DTOFactoryService->createDTOFromApplicationObjectStoreURLs(null));

        $applicationObjectStoreURLsDTO = $DTOFactoryService->createDTOFromApplicationObjectStoreURLs($data);

        self::assertIsObject($applicationObjectStoreURLsDTO);
        self::assertEquals($data['amazon_app_store'], $applicationObjectStoreURLsDTO->amazon_app_store);
        self::assertEquals($data['fb_canvas'], $applicationObjectStoreURLsDTO->fb_canvas);
        self::assertEquals($data['fb_gameroom'], $applicationObjectStoreURLsDTO->fb_gameroom);
        self::assertEquals($data['google_play'], $applicationObjectStoreURLsDTO->google_play);
        self::assertEquals($data['instant_game'], $applicationObjectStoreURLsDTO->instant_game);
        self::assertEquals($data['itunes'], $applicationObjectStoreURLsDTO->itunes);
        self::assertEquals($data['itunes_ipad'], $applicationObjectStoreURLsDTO->itunes_ipad);
        self::assertEquals($data['windows_10_store'], $applicationObjectStoreURLsDTO->windows_10_store);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($applicationObjectStoreURLsDTO, JSON_THROW_ON_ERROR)
        );
    }
}
