<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class PhotoSizeDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromPhotoSizes(null));
        self::assertNull($DTOFactoryService->createDTOFromPhotoSize(null));

        $file_id              = 'test';
        $file_unique_id       = 'test';
        $width                = 100;
        $height               = 200;
        $file_size_photo_size = 10;
        $photoSizeDTO         = $DTOFactoryService->createDTOFromPhotoSize(
            $photoSize = [
                'file_id'        => $file_id,
                'file_unique_id' => $file_unique_id,
                'width'          => $width,
                'height'         => $height,
                'file_size'      => $file_size_photo_size,
            ]
        );

        self::assertIsObject($photoSizeDTO);
        self::assertEquals($file_id, $photoSizeDTO->file_id);
        self::assertEquals($file_unique_id, $photoSizeDTO->file_unique_id);
        self::assertEquals($width, $photoSizeDTO->width);
        self::assertEquals($height, $photoSizeDTO->height);
        self::assertEquals($file_size_photo_size, $photoSizeDTO->file_size);
        self::assertEquals(
            json_encode($photoSize, JSON_THROW_ON_ERROR),
            json_encode($photoSizeDTO, JSON_THROW_ON_ERROR)
        );
    }
}
