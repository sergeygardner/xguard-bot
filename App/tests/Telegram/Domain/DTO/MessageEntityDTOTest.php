<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class MessageEntityDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromMessageEntities(null));
        self::assertNull($DTOFactoryService->createDTOFromMessageEntity(null));

        $type               = 'mention';
        $offset             = 1;
        $length             = 8;
        $url                = 'https://t.me/';
        $user               = null;
        $language           = 'php';
        $custom_emoji_id    = 'custom_emoji_id';
        $messageEntityDTO   = $DTOFactoryService->createDTOFromMessageEntity(
            $messageEntity = [
                'type'            => $type,
                'offset'          => $offset,
                'length'          => $length,
                'url'             => $url,
                'user'            => $user,
                'language'        => $language,
                'custom_emoji_id' => $custom_emoji_id,
            ]
        );
        $messageEntitiesDTO = $DTOFactoryService->createDTOFromMessageEntities([$messageEntity]);

        foreach ([$messageEntityDTO, ...$messageEntitiesDTO] as $messageEntityDTOItem) {
            self::assertIsObject($messageEntityDTOItem);
            self::assertEquals($type, $messageEntityDTOItem->type);
            self::assertEquals($offset, $messageEntityDTOItem->offset);
            self::assertEquals($length, $messageEntityDTOItem->length);
            self::assertEquals($url, $messageEntityDTOItem->url);
            self::assertEquals($user, $messageEntityDTOItem->user);
            self::assertEquals($language, $messageEntityDTOItem->language);
            self::assertEquals($custom_emoji_id, $messageEntityDTOItem->custom_emoji_id);
            self::assertEquals(
                json_encode($messageEntity, JSON_THROW_ON_ERROR),
                json_encode($messageEntityDTOItem, JSON_THROW_ON_ERROR)
            );
        }

    }
}
