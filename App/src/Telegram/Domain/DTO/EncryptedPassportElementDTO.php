<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Domain\DTO;

use JsonSerializable;

/**
 * This class describes documents or other Telegram Passport elements shared with the bot by the user.
 */
final class EncryptedPassportElementDTO implements JsonSerializable
{

    /**
     * @param string                 $type         Element type. One of "personal_details", "passport", "driver_license", "identity_card", "internal_passport", "address", "utility_bill", "bank_statement", "rental_agreement", "passport_registration", "temporary_registration", "phone_number", "email".
     * @param string|null            $data         Optional. Base64-encoded encrypted Telegram Passport element data provided by the user, available for "personal_details", "passport", "driver_license", "identity_card", "internal_passport" and "address" types. Can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param string|null            $phone_number Optional. User's verified phone number, available only for "phone_number" type
     * @param string|null            $email        Optional. User's verified email address, available only for "email" type
     * @param PassportFileDTO[]|null $files        Optional. Array of encrypted files with documents provided by the user, available for "utility_bill", "bank_statement", "rental_agreement", "passport_registration" and "temporary_registration" types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFileDTO|null   $front_side   Optional. Encrypted file with the front side of the document, provided by the user. Available for "passport", "driver_license", "identity_card" and "internal_passport". The file can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFileDTO|null   $reverse_side Optional. Encrypted file with the reverse side of the document, provided by the user. Available for "driver_license" and "identity_card". The file can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFileDTO|null   $selfie       Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available for "passport", "driver_license", "identity_card" and "internal_passport". The file can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param PassportFileDTO[]|null $translation  Optional. Array of encrypted files with translated versions of documents provided by the user. Available if requested for "passport", "driver_license", "identity_card", "internal_passport", "utility_bill", "bank_statement", "rental_agreement", "passport_registration" and "temporary_registration" types. Files can be decrypted and verified using the accompanying EncryptedCredentials.
     * @param string                 $hash         Base64-encoded element hash for using in PassportElementErrorUnspecified
     */
    public function __construct(
        public readonly string $type,
        public readonly ?string $data,
        public readonly ?string $phone_number,
        public readonly ?string $email,
        public readonly ?array $files,
        public readonly ?PassportFileDTO $front_side,
        public readonly ?PassportFileDTO $reverse_side,
        public readonly ?PassportFileDTO $selfie,
        public readonly ?array $translation,
        public readonly string $hash,
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'type'         => $this->type,
            'data'         => $this->data,
            'phone_number' => $this->phone_number,
            'email'        => $this->email,
            'files'        => $this->files,
            'front_side'   => $this->front_side,
            'reverse_side' => $this->reverse_side,
            'selfie'       => $this->selfie,
            'translation'  => $this->translation,
            'hash'         => $this->hash,
        ];
    }
}
