<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class MessageAutoDeleteTimerChangedDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromMessageAutoDeleteTimerChanged(null));

        $message_auto_delete_time_changed = 404;
        $messageAutoDeleteTimerChangedDTO = $DTOFactoryService->createDTOFromMessageAutoDeleteTimerChanged(
            404
        );
        self::assertIsObject($messageAutoDeleteTimerChangedDTO);
        self::assertEquals(
            $message_auto_delete_time_changed,
            $messageAutoDeleteTimerChangedDTO->message_auto_delete_time
        );
        self::assertEquals(
            json_encode($message_auto_delete_time_changed, JSON_THROW_ON_ERROR),
            json_encode($messageAutoDeleteTimerChangedDTO, JSON_THROW_ON_ERROR)
        );
    }
}
