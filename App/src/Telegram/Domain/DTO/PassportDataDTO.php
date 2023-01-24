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
 * This class describes Telegram Passport data shared with the bot by the user.
 */
final class PassportDataDTO implements JsonSerializable
{

    /**
     * @param EncryptedPassportElementDTO[] $data        Array with information about documents and other Telegram Passport elements that was shared with the bot
     * @param EncryptedCredentialsDTO       $credentials Encrypted credentials required to decrypt the data
     */
    public function __construct(
        public readonly array $data,
        public readonly EncryptedCredentialsDTO $credentials,
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'data'        => $this->data,
            'credentials' => $this->credentials,
        ];
    }
}
