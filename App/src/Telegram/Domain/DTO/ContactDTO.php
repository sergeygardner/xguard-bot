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
 * This class represents a phone contact.
 */
final class ContactDTO implements JsonSerializable
{

    /**
     * @param string      $phone_number Contact's phone number
     * @param string      $first_name   Contact's first name
     * @param string|null $last_name    Optional. Contact's last name
     * @param int|null    $user_id      Optional. Contact's user identifier in Telegram. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param string|null $vcard        Optional. Additional data about the contact in the form of a vCard
     */
    public function __construct(
        public readonly string $phone_number,
        public readonly string $first_name,
        public readonly ?string $last_name,
        public readonly ?int $user_id,
        public readonly ?string $vcard
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'phone_number' => $this->phone_number,
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'user_id'      => $this->user_id,
            'vcard'        => $this->vcard,
        ];
    }
}
