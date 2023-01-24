<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class DocumentDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromDocument(null));

        $file_id        = 'test';
        $file_unique_id = 'test';
        $file_name      = 'test';
        $mime_type      = 'application/pdf';
        $file_size      = 100;
        $thumb          = null;
        $documentDTO    = $DTOFactoryService->createDTOFromDocument(
            $document = [
                'file_id'        => $file_id,
                'file_unique_id' => $file_unique_id,
                'thumb'          => $thumb,
                'file_name'      => $file_name,
                'mime_type'      => $mime_type,
                'file_size'      => $file_size,
            ]
        );

        self::assertIsObject($documentDTO);
        self::assertEquals($file_id, $documentDTO->file_id);
        self::assertEquals($file_unique_id, $documentDTO->file_unique_id);
        self::assertEquals(null, $documentDTO->thumb);
        self::assertEquals($file_name, $documentDTO->file_name);
        self::assertEquals($mime_type, $documentDTO->mime_type);
        self::assertEquals($file_size, $documentDTO->file_size);
        self::assertEquals(
            json_encode($document, JSON_THROW_ON_ERROR),
            json_encode($documentDTO, JSON_THROW_ON_ERROR)
        );
    }
}
