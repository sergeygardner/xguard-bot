<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class VideoChatScheduledDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVideoChatScheduled(null));

        $start_date            = time() + 100;
        $videoChatScheduledDTO = $DTOFactoryService->createDTOFromVideoChatScheduled(
            ['start_date' => $start_date]
        );
        self::assertIsObject($videoChatScheduledDTO);
        self::assertEquals($start_date, $videoChatScheduledDTO->start_date);
        self::assertEquals(
            json_encode(['start_date' => $start_date,], JSON_THROW_ON_ERROR),
            json_encode($videoChatScheduledDTO, JSON_THROW_ON_ERROR)
        );
    }
}
