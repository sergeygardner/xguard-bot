<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class VideoChatEndedDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVideoChatEnded(null));

        $duration          = 1000;
        $videoChatEndedDTO = $DTOFactoryService->createDTOFromVideoChatEnded(
            ['duration' => $duration]
        );
        self::assertIsObject($videoChatEndedDTO);
        self::assertEquals($duration, $videoChatEndedDTO->duration);
        self::assertEquals(
            json_encode(['duration' => $duration,], JSON_THROW_ON_ERROR),
            json_encode($videoChatEndedDTO, JSON_THROW_ON_ERROR)
        );
    }
}
