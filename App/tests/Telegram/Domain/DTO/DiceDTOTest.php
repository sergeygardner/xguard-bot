<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class DiceDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromDice(null));

        $emoji   = ';)';
        $value   = 1;
        $diceDTO = $DTOFactoryService->createDTOFromDice(
            $dice = [
                'emoji' => $emoji,
                'value' => $value,
            ]
        );
        self::assertIsObject($diceDTO);
        self::assertEquals($emoji, $diceDTO->emoji);
        self::assertEquals($value, $diceDTO->value);
        self::assertEquals(
            json_encode($dice, JSON_THROW_ON_ERROR),
            json_encode($diceDTO, JSON_THROW_ON_ERROR)
        );
    }
}
