<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\Exception;

use Exception;
use Throwable;

/**
 *
 */
class ModifyReadOnlyPropertyInDTOException extends Exception
{

    /**
     * @param string         $class
     * @param string         $name
     * @param mixed          $value
     * @param int|null       $code
     * @param Throwable|null $previous
     */
    public function __construct(string $class, string $name, mixed $value, ?int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(
            sprintf(
                'Try to modify the property "%s" with the value "%s" in the class "%s"',
                $name,
                print_r((array)$value, true),
                $class
            ),
            $code,
            $previous
        );
    }
}

