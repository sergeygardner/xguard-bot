<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class AnimationDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromAnimation(null));

        $file_id        = 'test';
        $file_unique_id = 'test';
        $width          = 100;
        $height         = 200;
        $duration       = 10;
        $thumb          = null;
        $file_name      = 'test';
        $mime_type      = 'video/mp4';
        $file_size      = 100;
        $animationDTO   = $DTOFactoryService->createDTOFromAnimation(
            $animation = [
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

        self::assertIsObject($animationDTO);
        self::assertEquals($file_id, $animationDTO->file_id);
        self::assertEquals($file_unique_id, $animationDTO->file_unique_id);
        self::assertEquals($width, $animationDTO->width);
        self::assertEquals($height, $animationDTO->height);
        self::assertEquals($duration, $animationDTO->duration);
        self::assertEquals(null, $animationDTO->thumb);
        self::assertEquals($file_name, $animationDTO->file_name);
        self::assertEquals($mime_type, $animationDTO->mime_type);
        self::assertEquals($file_size, $animationDTO->file_size);
        self::assertEquals(
            json_encode($animation, JSON_THROW_ON_ERROR),
            json_encode($animationDTO, JSON_THROW_ON_ERROR)
        );
    }
}
