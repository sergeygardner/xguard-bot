<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class VideoNoteDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVideoNote(null));

        $file_id        = 'video_note_file_id';
        $file_unique_id = 'video_note_file_unique_id';
        $length         = 100;
        $duration       = 101;
        $thumb          = null;
        $file_size      = 102;
        $videoNoteDTO   = $DTOFactoryService->createDTOFromVideoNote(
            $videoNote = [
                'file_id'        => $file_id,
                'file_unique_id' => $file_unique_id,
                'length'         => $length,
                'duration'       => $duration,
                'thumb'          => $thumb,
                'file_size'      => $file_size,
            ]
        );
        self::assertIsObject($videoNoteDTO);
        self::assertEquals($file_id, $videoNoteDTO->file_id);
        self::assertEquals($file_unique_id, $videoNoteDTO->file_unique_id);
        self::assertEquals($length, $videoNoteDTO->length);
        self::assertEquals($duration, $videoNoteDTO->duration);
        self::assertEquals($thumb, $videoNoteDTO->thumb);
        self::assertEquals($file_size, $videoNoteDTO->file_size);
        self::assertEquals(
            json_encode($videoNote, JSON_THROW_ON_ERROR),
            json_encode($videoNoteDTO, JSON_THROW_ON_ERROR)
        );
    }
}
