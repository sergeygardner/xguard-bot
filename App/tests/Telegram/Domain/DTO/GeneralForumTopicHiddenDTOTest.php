<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class GeneralForumTopicHiddenDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromGeneralForumTopicHidden(null));

        $values = ['test', 'test2', 0, null, 0.1];

        $generalForumTopicHiddenDTO = $DTOFactoryService->createDTOFromGeneralForumTopicHidden(
            $values
        );

        self::assertIsObject($generalForumTopicHiddenDTO);
        self::assertEquals($values, $generalForumTopicHiddenDTO->values);
        self::assertEquals(
            json_encode($values, JSON_THROW_ON_ERROR),
            json_encode($generalForumTopicHiddenDTO, JSON_THROW_ON_ERROR)
        );
    }
}
