<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class AudioDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromAudio(null));

        $file_id        = 'test';
        $file_unique_id = 'test';
        $duration       = 10;
        $performer      = 'tester';
        $title          = 'Testy';
        $file_name      = 'test';
        $mime_type      = 'audio/mp3';
        $file_size      = 100;
        $thumb          = null;
        $audioDTO       = $DTOFactoryService->createDTOFromAudio(
            $audio = [
                'file_id'        => $file_id,
                'file_unique_id' => $file_unique_id,
                'duration'       => $duration,
                'performer'      => $performer,
                'title'          => $title,
                'file_name'      => $file_name,
                'mime_type'      => $mime_type,
                'file_size'      => $file_size,
                'thumb'          => $thumb,
            ]
        );

        self::assertIsObject($audioDTO);
        self::assertEquals($file_id, $audioDTO->file_id);
        self::assertEquals($file_unique_id, $audioDTO->file_unique_id);
        self::assertEquals($duration, $audioDTO->duration);
        self::assertEquals(null, $audioDTO->thumb);
        self::assertEquals($performer, $audioDTO->performer);
        self::assertEquals($title, $audioDTO->title);
        self::assertEquals($file_name, $audioDTO->file_name);
        self::assertEquals($mime_type, $audioDTO->mime_type);
        self::assertEquals($file_size, $audioDTO->file_size);
        self::assertEquals(
            json_encode($audio, JSON_THROW_ON_ERROR),
            json_encode($audioDTO, JSON_THROW_ON_ERROR)
        );
    }
}
