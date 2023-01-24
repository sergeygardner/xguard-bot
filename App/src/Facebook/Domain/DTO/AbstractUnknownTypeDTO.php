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
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 * This class represents a set of tests which can help find out potential issues related to ad delivery.
 * @see https://developers.facebook.com/docs/marketing-api/adgroup/deliverychecks/v17.0
 */
abstract class AbstractUnknownTypeDTO implements JsonSerializable
{

    /**
     * @param array|null $value
     */
    public function __construct(public readonly ?array $value)
    {

    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name): mixed
    {
        return $this->value[$name];
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     * @throws ModifyReadOnlyPropertyInDTOException
     */
    public function __set(string $name, mixed $value): void
    {
        throw new ModifyReadOnlyPropertyInDTOException(static::class, $name, $value);
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return isset($this->value[$name]);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->value ?? [];
    }
}
