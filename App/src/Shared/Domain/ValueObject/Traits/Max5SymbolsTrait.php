<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Domain\ValueObject\Traits;

/**
 * Trait Max5SymbolsTrait
 * @package XGuard\Bot\Shared\Domain\ValueObject\Traits
 */
trait Max5SymbolsTrait
{

    /**
     * {@inheritDoc}
     */
    protected function getAllowedLength(): int
    {
        return 5;
    }
}
