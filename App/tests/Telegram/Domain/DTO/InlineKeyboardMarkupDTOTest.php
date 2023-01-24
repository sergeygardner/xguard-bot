<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class InlineKeyboardMarkupDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromInlineKeyboardMarkup(null));

        $inlineKeyboardMarkupDTO = $DTOFactoryService->createDTOFromInlineKeyboardMarkup(
            []
        );

        self::assertIsObject($inlineKeyboardMarkupDTO);
        self::assertEquals([], $inlineKeyboardMarkupDTO->inline_keyboard);
        self::assertEquals(
            json_encode(['inline_keyboard' => [],], JSON_THROW_ON_ERROR),
            json_encode($inlineKeyboardMarkupDTO, JSON_THROW_ON_ERROR)
        );
    }
}
