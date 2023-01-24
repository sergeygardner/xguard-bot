<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class EncryptedPassportElementDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromEncryptedPassportElements(null));
        self::assertNull($DTOFactoryService->createDTOFromEncryptedPassportElement(null));

        $type                     = 'type';
        $data                     = 'data';
        $phone_number             = '+0 7999 999 999';
        $email                    = 'email@email.email';
        $files                    = [];
        $front_side               = null;
        $reverse_side             = null;
        $selfie                   = null;
        $translation              = [];
        $hash                     = 'hash';
        $encryptedCredentialsDTO  = $DTOFactoryService->createDTOFromEncryptedPassportElement(
            $encryptedCredentials = [
                'type'         => $type,
                'data'         => $data,
                'phone_number' => $phone_number,
                'email'        => $email,
                'files'        => $files,
                'front_side'   => $front_side,
                'reverse_side' => $reverse_side,
                'selfie'       => $selfie,
                'translation'  => $translation,
                'hash'         => $hash,
            ]
        );
        $encryptedCredentialsDTOs = $DTOFactoryService->createDTOFromEncryptedPassportElements([$encryptedCredentials]);

        foreach ([$encryptedCredentialsDTO, ...$encryptedCredentialsDTOs] as $encryptedCredentialsDTOItem) {
            self::assertIsObject($encryptedCredentialsDTOItem);
            self::assertEquals($type, $encryptedCredentialsDTOItem->type);
            self::assertEquals($data, $encryptedCredentialsDTOItem->data);
            self::assertEquals($phone_number, $encryptedCredentialsDTOItem->phone_number);
            self::assertEquals($email, $encryptedCredentialsDTOItem->email);
            self::assertEquals($files, $encryptedCredentialsDTOItem->files);
            self::assertEquals($front_side, $encryptedCredentialsDTOItem->front_side);
            self::assertEquals($reverse_side, $encryptedCredentialsDTOItem->reverse_side);
            self::assertEquals($selfie, $encryptedCredentialsDTOItem->selfie);
            self::assertEquals($translation, $encryptedCredentialsDTOItem->translation);
            self::assertEquals($hash, $encryptedCredentialsDTOItem->hash);
            self::assertEquals(
                json_encode($encryptedCredentials, JSON_THROW_ON_ERROR),
                json_encode($encryptedCredentialsDTOItem, JSON_THROW_ON_ERROR)
            );
        }
    }
}
