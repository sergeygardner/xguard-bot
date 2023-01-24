<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Domain\ValueObject;

use JsonSerializable;
use Stringable;

/**
 * @package XGuard\Bot\Shared\Domain\ValueObject
 */
interface ValueObjectInterface extends Stringable, JsonSerializable
{

    /**
     * @return string
     */
    public function hash(): string;

    /**
     * @param object $object
     *
     * @return bool
     */
    public function isComparable(object $object): bool;

    /**
     * @param object $object
     *
     * @return bool
     */
    public function isEquals(object $object): bool;

    /**
     * @return mixed
     */
    public function getValue(): mixed;

}
