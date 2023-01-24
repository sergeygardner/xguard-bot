<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\DTO;

use DateTimeInterface;
use JsonSerializable;

/**
 * This class represents an AdLabel
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-label/
 */
class AdLabelDTO implements JsonSerializable
{

    /**
     * @param string|null            $id           Ad Label ID
     * @param AdAccountDTO|null      $account      Ad Account
     * @param DateTimeInterface|null $created_time Created time
     * @param string                 $name         [Default] Ad Label name
     * @param DateTimeInterface|null $updated_time Updated time
     */
    public function __construct(
        public readonly ?string $id,
        public readonly ?AdAccountDTO $account,
        public readonly ?DateTimeInterface $created_time,
        public readonly string $name,
        public readonly ?DateTimeInterface $updated_time
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'           => $this->id,
            'account'      => $this->account,
            'created_time' => $this->created_time,
            'name'         => $this->name,
            'updated_time' => $this->updated_time,
        ];
    }
}
