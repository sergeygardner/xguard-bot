<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class VideoChatStartedDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVideoChatStarted(null));

        $values = ['test', 'test2', 0, null, 0.1];

        $fromVideoChatStartedDTO = $DTOFactoryService->createDTOFromVideoChatStarted(
            $values
        );

        self::assertIsObject($fromVideoChatStartedDTO);
        self::assertEquals($values, $fromVideoChatStartedDTO->values);
        self::assertEquals(
            json_encode($values, JSON_THROW_ON_ERROR),
            json_encode($fromVideoChatStartedDTO, JSON_THROW_ON_ERROR)
        );
    }
}
