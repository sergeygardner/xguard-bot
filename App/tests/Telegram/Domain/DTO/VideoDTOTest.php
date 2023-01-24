<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class VideoDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVideo(null));

        $file_id        = 'test';
        $file_unique_id = 'test';
        $width          = 100;
        $height         = 200;
        $duration       = 10;
        $thumb          = null;
        $file_name      = 'test';
        $mime_type      = 'video/mp4';
        $file_size      = 100;
        $videoDTO       = $DTOFactoryService->createDTOFromVideo(
            $video = [
                'file_id'        => $file_id,
                'file_unique_id' => $file_unique_id,
                'width'          => $width,
                'height'         => $height,
                'duration'       => $duration,
                'thumb'          => $thumb,
                'file_name'      => $file_name,
                'mime_type'      => $mime_type,
                'file_size'      => $file_size,
            ]
        );

        self::assertIsObject($videoDTO);
        self::assertEquals($file_id, $videoDTO->file_id);
        self::assertEquals($file_unique_id, $videoDTO->file_unique_id);
        self::assertEquals($width, $videoDTO->width);
        self::assertEquals($height, $videoDTO->height);
        self::assertEquals($duration, $videoDTO->duration);
        self::assertEquals(null, $videoDTO->thumb);
        self::assertEquals($file_name, $videoDTO->file_name);
        self::assertEquals($mime_type, $videoDTO->mime_type);
        self::assertEquals($file_size, $videoDTO->file_size);
        self::assertEquals(
            json_encode($video, JSON_THROW_ON_ERROR),
            json_encode($videoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
