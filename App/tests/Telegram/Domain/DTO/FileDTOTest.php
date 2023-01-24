<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class FileDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromFile(null));

        $file_id        = 'test';
        $file_unique_id = 'test';
        $file_size      = 100;
        $file_path      = 'file/path';
        $fileDTO        = $DTOFactoryService->createDTOFromFile(
            $file = [
                'file_id'        => $file_id,
                'file_unique_id' => $file_unique_id,
                'file_size'      => $file_size,
                'file_path'      => $file_path,
            ]
        );

        self::assertIsObject($fileDTO);
        self::assertEquals($file_id, $fileDTO->file_id);
        self::assertEquals($file_unique_id, $fileDTO->file_unique_id);
        self::assertEquals($file_size, $fileDTO->file_size);
        self::assertEquals($file_path, $fileDTO->file_path);
        self::assertEquals(
            json_encode($file, JSON_THROW_ON_ERROR),
            json_encode($fileDTO, JSON_THROW_ON_ERROR)
        );
    }
}
