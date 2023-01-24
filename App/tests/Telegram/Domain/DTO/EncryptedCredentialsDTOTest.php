<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class EncryptedCredentialsDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromEncryptedCredentials(null));

        $data                    = 'data';
        $hash                    = 'hash';
        $secret                  = 'secret';
        $encryptedCredentialsDTO = $DTOFactoryService->createDTOFromEncryptedCredentials(
            $encryptedCredentials = [
                'data'   => $data,
                'hash'   => $hash,
                'secret' => $secret,
            ]
        );
        self::assertIsObject($encryptedCredentialsDTO);
        self::assertEquals($data, $encryptedCredentialsDTO->data);
        self::assertEquals($hash, $encryptedCredentialsDTO->hash);
        self::assertEquals($secret, $encryptedCredentialsDTO->secret);
        self::assertEquals(
            json_encode($encryptedCredentials, JSON_THROW_ON_ERROR),
            json_encode($encryptedCredentialsDTO, JSON_THROW_ON_ERROR)
        );
    }
}
