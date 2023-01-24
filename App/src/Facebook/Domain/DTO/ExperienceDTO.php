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

use JsonSerializable;

/**
 * The class represents an experience
 * @see https://developers.facebook.com/docs/graph-api/reference/experience/
 */
class ExperienceDTO implements JsonSerializable
{

    /**
     * @param string    $id          [Default] ID
     * @param string    $description [Default] Description
     * @param mixed     $from        [Default] From TODO transfer to a certain type
     * @param string    $name        [Default] Name
     * @param UserDTO[] $with        [Default] Tagged users
     */
    public function __construct(
        public readonly string $id,
        public readonly string $description,
        public readonly mixed $from,
        public readonly string $name,
        public readonly array $with
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'          => $this->id,
            'description' => $this->description,
            'from'        => $this->from,
            'name'        => $this->name,
            'with'        => $this->with,
        ];
    }
}
