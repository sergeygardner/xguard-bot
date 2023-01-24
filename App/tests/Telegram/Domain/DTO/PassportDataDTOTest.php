<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class PassportDataDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromPassportData(null));

        $data            = 'data';
        $hash            = 'hash';
        $secret          = 'secret';
        $credentials     = [
            'data'   => $data,
            'hash'   => $hash,
            'secret' => $secret,
        ];
        $data            = [];
        $passportDataDTO = $DTOFactoryService->createDTOFromPassportData(
            $passportData = [
                'data'        => $data,
                'credentials' => $credentials,
            ]
        );
        self::assertIsObject($passportDataDTO);
        self::assertEquals($data, $passportDataDTO->data);
        self::assertEquals($credentials, $passportDataDTO->credentials->jsonSerialize());
        self::assertEquals(
            json_encode($passportData, JSON_THROW_ON_ERROR),
            json_encode($passportDataDTO, JSON_THROW_ON_ERROR)
        );
    }
}
