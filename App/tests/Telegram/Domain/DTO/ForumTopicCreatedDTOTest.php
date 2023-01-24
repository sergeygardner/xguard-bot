<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ForumTopicCreatedDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromForumTopicCreated(null));

        $name                 = 'name';
        $icon_color           = 1;
        $icon_custom_emoji_id = 'icon_custom_emoji_id';
        $forumTopicCreatedDTO = $DTOFactoryService->createDTOFromForumTopicCreated(
            $forumTopicCreated = [
                'name'                 => $name,
                'icon_color'           => $icon_color,
                'icon_custom_emoji_id' => $icon_custom_emoji_id,
            ]
        );

        self::assertIsObject($forumTopicCreatedDTO);
        self::assertEquals($name, $forumTopicCreatedDTO->name);
        self::assertEquals($icon_color, $forumTopicCreatedDTO->icon_color);
        self::assertEquals($icon_custom_emoji_id, $forumTopicCreatedDTO->icon_custom_emoji_id);
        self::assertEquals(
            json_encode($forumTopicCreated, JSON_THROW_ON_ERROR),
            json_encode($forumTopicCreatedDTO, JSON_THROW_ON_ERROR)
        );
    }
}
