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

use XGuard\Bot\Shared\Domain\ValueObject\Traits\AllowedFormatTrait;
use XGuard\Bot\Shared\Domain\ValueObject\Traits\Max5SymbolsTrait;

/**
 *
 * @package XGuard\Bot\Shared\Domain\ValueObject
 */
final class ActionValueObject extends AbstractString
{

    use Max5SymbolsTrait, AllowedFormatTrait;

    /**
     *
     */
    public const SENT = 'sent';

    /**
     *
     */
    public const CLOSE = 'close';

    /**
     *
     */
    public const OPEN = 'open';

    /**
     *
     */
    public const ERROR = 'error';

    /**
     *
     */
    private const ALLOWED_FORMAT = [
        self::SENT, // the message was sent
        self::CLOSE,// the message was closed
        self::OPEN, // the message was opened
        self::ERROR,// the error was appeared during sending the message
    ];

    /**
     * @return self
     */
    public static function createOpen(): self
    {
        return new self(self::OPEN);
    }

    /**
     * @return self
     */
    public static function createSent(): self
    {
        return new self(self::SENT);
    }
}
