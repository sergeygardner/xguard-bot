<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ForumTopicEditedDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromForumTopicEdited(null));

        $name                 = 'name';
        $icon_custom_emoji_id = 'icon_custom_emoji_id';
        $forumTopicEditedDTO  = $DTOFactoryService->createDTOFromForumTopicEdited(
            $forumTopicEdited = [
                'name'                 => $name,
                'icon_custom_emoji_id' => $icon_custom_emoji_id,
            ]
        );

        self::assertIsObject($forumTopicEditedDTO);
        self::assertEquals($name, $forumTopicEditedDTO->name);
        self::assertEquals($icon_custom_emoji_id, $forumTopicEditedDTO->icon_custom_emoji_id);
        self::assertEquals(
            json_encode($forumTopicEdited, JSON_THROW_ON_ERROR),
            json_encode($forumTopicEditedDTO, JSON_THROW_ON_ERROR)
        );
    }
}
