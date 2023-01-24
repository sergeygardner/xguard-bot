<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class VoiceDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVoice(null));

        $file_id        = 'voice_file_id';
        $file_unique_id = 'voice_file_unique_id';
        $duration       = 10;
        $mime_type      = 'audio/mp3';
        $file_size      = 100;
        $voiceDTO       = $DTOFactoryService->createDTOFromVoice(
            $voice = [
                'file_id'        => $file_id,
                'file_unique_id' => $file_unique_id,
                'duration'       => $duration,
                'mime_type'      => $mime_type,
                'file_size'      => $file_size,
            ]
        );

        self::assertIsObject($voiceDTO);
        self::assertEquals($file_id, $voiceDTO->file_id);
        self::assertEquals($file_unique_id, $voiceDTO->file_unique_id);
        self::assertEquals($duration, $voiceDTO->duration);
        self::assertEquals($mime_type, $voiceDTO->mime_type);
        self::assertEquals($file_size, $voiceDTO->file_size);
        self::assertEquals(
            json_encode($voice, JSON_THROW_ON_ERROR),
            json_encode($voiceDTO, JSON_THROW_ON_ERROR)
        );
    }
}
