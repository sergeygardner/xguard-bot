<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ForumTopicClosedDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromForumTopicClosed(null));

        $values = ['test', 'test2', 0, null, 0.1];

        $callbackGameDTO = $DTOFactoryService->createDTOFromForumTopicClosed(
            $values
        );

        self::assertIsObject($callbackGameDTO);
        self::assertEquals($values, $callbackGameDTO->values);
        self::assertEquals(
            json_encode($values, JSON_THROW_ON_ERROR),
            json_encode($callbackGameDTO, JSON_THROW_ON_ERROR)
        );
    }
}
