<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ForumTopicReopenedDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromForumTopicReopened(null));

        $values = ['test', 'test2', 0, null, 0.1];

        $forumTopicReopenedDTO = $DTOFactoryService->createDTOFromForumTopicReopened(
            $values
        );

        self::assertIsObject($forumTopicReopenedDTO);
        self::assertEquals($values, $forumTopicReopenedDTO->values);
        self::assertEquals(
            json_encode($values, JSON_THROW_ON_ERROR),
            json_encode($forumTopicReopenedDTO, JSON_THROW_ON_ERROR)
        );
    }
}
