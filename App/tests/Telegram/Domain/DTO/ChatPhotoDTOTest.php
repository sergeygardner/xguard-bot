<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ChatPhotoDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromChatPhoto(null));

        $small_file_id        = 'small-qggre4243ter';
        $small_file_unique_id = 'small-qggre4243ter1543';
        $big_file_id          = 'big-qggre4243ter';
        $big_file_unique_id   = 'big-qggre4243ter1543';
        $chatPhotoDTO         = $DTOFactoryService->createDTOFromChatPhoto(
            $chatPhoto = [
                'small_file_id'        => $small_file_id,
                'small_file_unique_id' => $small_file_unique_id,
                'big_file_id'          => $big_file_id,
                'big_file_unique_id'   => $big_file_unique_id,
            ]
        );
        self::assertIsObject($chatPhotoDTO);
        self::assertEquals($small_file_id, $chatPhotoDTO->small_file_id);
        self::assertEquals($small_file_unique_id, $chatPhotoDTO->small_file_unique_id);
        self::assertEquals($big_file_id, $chatPhotoDTO->big_file_id);
        self::assertEquals($big_file_unique_id, $chatPhotoDTO->big_file_unique_id);
        self::assertEquals(
            json_encode($chatPhoto, JSON_THROW_ON_ERROR),
            json_encode($chatPhotoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
