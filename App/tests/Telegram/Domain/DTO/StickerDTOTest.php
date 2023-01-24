<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class StickerDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromSticker(null));

        $file_id           = 'sticker_id';
        $file_unique_id    = 'sticker_unique_id';
        $type              = 'regular';
        $width             = 100;
        $height            = 100;
        $is_animated       = false;
        $is_video          = false;
        $thumb             = null;
        $emoji             = 'emoji';
        $set_name          = 'set_name';
        $premium_animation = null;
        $mask_position     = null;
        $custom_emoji_id   = 'custom_emoji_id';
        $file_size         = 1000;
        $stickerDTO        = $DTOFactoryService->createDTOFromSticker(
            $sticker = [
                'file_id'           => $file_id,
                'file_unique_id'    => $file_unique_id,
                'type'              => $type,
                'width'             => $width,
                'height'            => $height,
                'is_animated'       => $is_animated,
                'is_video'          => $is_video,
                'thumb'             => $thumb,
                'emoji'             => $emoji,
                'set_name'          => $set_name,
                'premium_animation' => $premium_animation,
                'mask_position'     => $mask_position,
                'custom_emoji_id'   => $custom_emoji_id,
                'file_size'         => $file_size,
            ]
        );
        self::assertIsObject($stickerDTO);
        self::assertEquals($file_id, $stickerDTO->file_id);
        self::assertEquals($file_unique_id, $stickerDTO->file_unique_id);
        self::assertEquals($type, $stickerDTO->type);
        self::assertEquals($width, $stickerDTO->width);
        self::assertEquals($height, $stickerDTO->height);
        self::assertEquals($is_animated, $stickerDTO->is_animated);
        self::assertEquals($is_video, $stickerDTO->is_video);
        self::assertEquals($thumb, $stickerDTO->thumb);
        self::assertEquals($emoji, $stickerDTO->emoji);
        self::assertEquals($set_name, $stickerDTO->set_name);
        self::assertEquals($premium_animation, $stickerDTO->premium_animation);
        self::assertEquals($mask_position, $stickerDTO->mask_position);
        self::assertEquals($custom_emoji_id, $stickerDTO->custom_emoji_id);
        self::assertEquals($file_size, $stickerDTO->file_size);
        self::assertEquals(
            json_encode($sticker, JSON_THROW_ON_ERROR),
            json_encode($stickerDTO, JSON_THROW_ON_ERROR)
        );
    }
}
