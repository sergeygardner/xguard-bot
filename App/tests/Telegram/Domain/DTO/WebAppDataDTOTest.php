<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class WebAppDataDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromWebAppData(null));

        $data          = 'data';
        $button_text   = 'button_text';
        $webAppDataDTO = $DTOFactoryService->createDTOFromWebAppData(
            $webAppData = [
                'data'        => $data,
                'button_text' => $button_text,
            ]
        );
        self::assertIsObject($webAppDataDTO);
        self::assertEquals($data, $webAppDataDTO->data);
        self::assertEquals($button_text, $webAppDataDTO->button_text);
        self::assertEquals(
            json_encode($webAppData, JSON_THROW_ON_ERROR),
            json_encode($webAppDataDTO, JSON_THROW_ON_ERROR)
        );
    }
}
