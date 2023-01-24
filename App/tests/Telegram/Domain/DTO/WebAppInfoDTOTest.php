<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class WebAppInfoDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromWebAppInfo(null));

        $url           = 'https://t.me/';
        $webAppInfoDTO = $DTOFactoryService->createDTOFromWebAppInfo(
            $webAppInfo = [
                'url' => $url,
            ]
        );
        self::assertIsObject($webAppInfoDTO);
        self::assertEquals($url, $webAppInfoDTO->url);
        self::assertEquals(
            json_encode($webAppInfo, JSON_THROW_ON_ERROR),
            json_encode($webAppInfoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
