<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class GameDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromGame(null));

        $title         = 'title';
        $description   = 'description';
        $photo         = [];
        $text          = 'text';
        $text_entities = null;
        $animation     = null;
        $gameDTO       = $DTOFactoryService->createDTOFromGame(
            $game = [
                'title'         => $title,
                'description'   => $description,
                'photo'         => $photo,
                'text'          => $text,
                'text_entities' => $text_entities,
                'animation'     => $animation,
            ]
        );

        self::assertIsObject($gameDTO);
        self::assertEquals($title, $gameDTO->title);
        self::assertEquals($description, $gameDTO->description);
        self::assertEquals($photo, $gameDTO->photo);
        self::assertEquals($text, $gameDTO->text);
        self::assertEquals($text_entities, $gameDTO->text_entities);
        self::assertEquals($animation, $gameDTO->animation);
        self::assertEquals(
            json_encode($game, JSON_THROW_ON_ERROR),
            json_encode($gameDTO, JSON_THROW_ON_ERROR)
        );
    }
}
