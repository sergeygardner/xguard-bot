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

use XGuard\Bot\Shared\Domain\ValueObject\AbstractString;

/**
 * Trait AllowedFormatTrait
 * @package BorkLab\Purchase\Domain\ValueObject\Traits
 */
trait AllowedFormatTrait
{

    /**
     * {@inheritDoc}
     */
    protected function allowedFormat(): AbstractString
    {
        $this->assertion->choice(
            self::ALLOWED_FORMAT,
            sprintf(
                'The value "%s" format must be present in the allowed format rules: %s',
                $this->getValue(),
                var_export(self::ALLOWED_FORMAT, true)
            )
        );

        return $this;
    }
}
