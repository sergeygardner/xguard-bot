<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class PassportFileDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromPassportFile(null));

        $file_id         = 'telegram://file.url';
        $file_unique_id  = 'file_unique_id';
        $file_size       = 100;
        $file_date       = time();
        $passportFileDTO = $DTOFactoryService->createDTOFromPassportFile(
            $passportFile = [
                'file_id'        => $file_id,
                'file_unique_id' => $file_unique_id,
                'file_size'      => $file_size,
                'file_date'      => $file_date,
            ]
        );
        self::assertIsObject($passportFileDTO);
        self::assertEquals($file_id, $passportFileDTO->file_id);
        self::assertEquals($file_unique_id, $passportFileDTO->file_unique_id);
        self::assertEquals($file_size, $passportFileDTO->file_size);
        self::assertEquals($file_date, $passportFileDTO->file_date);
        self::assertEquals(
            json_encode($passportFile, JSON_THROW_ON_ERROR),
            json_encode($passportFileDTO, JSON_THROW_ON_ERROR)
        );
    }
}
