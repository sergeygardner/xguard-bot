<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Domain\ValueObject;

use XGuard\Bot\Shared\Domain\ValueObject\AbstractString;
use XGuard\Bot\Shared\Domain\ValueObject\Traits\Max2048SymbolsTrait;

/**
 *
 * @package XGuard\Bot\Telegram\Domain\ValueObject
 */
final class TextValueObject extends AbstractString
{

    use Max2048SymbolsTrait;
}
