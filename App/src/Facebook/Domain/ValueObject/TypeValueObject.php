<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\ValueObject;

use XGuard\Bot\Shared\Domain\ValueObject\AbstractString;
use XGuard\Bot\Shared\Domain\ValueObject\Traits\AllowedFormatTrait;
use XGuard\Bot\Shared\Domain\ValueObject\Traits\Max5SymbolsTrait;

/**
 *
 * @package XGuard\Bot\Facebook\Domain\ValueObject
 */
final class TypeValueObject extends AbstractString
{

    use Max5SymbolsTrait, AllowedFormatTrait;

    /**
     *
     */
    public const ALLOWED_FORMAT = [
        self::USER,
        self::PAGE,
        self::APP,
        self::GROUP,
    ];

    /**
     *
     */
    public const USER = 'user';

    /**
     *
     */
    public const PAGE = 'user';

    /**
     *
     */
    public const APP = 'page';

    /**
     *
     */
    public const GROUP = 'group';
}
