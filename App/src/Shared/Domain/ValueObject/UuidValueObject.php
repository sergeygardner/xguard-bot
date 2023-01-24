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

use Symfony\Component\Uid\Uuid as PHPUuid;

/**
 * @see     https://en.wikipedia.org/wiki/UUID
 *
 * @package XGuard\Bot\Shared\Domain\ValueObject
 */
final class UuidValueObject extends AbstractString
{

    /**
     * @return self
     */
    public static function generate(): self
    {
        return new UuidValueObject((string)PHPUuid::v4());
    }

    /**
     * @inheritDoc
     */
    protected function getAllowedLength(): int
    {
        return 36;
    }

    /**
     * @inheritDoc
     */
    protected function allowedFormat(): self
    {
        $this->assertion->uuid('Value is not valid uuid.');

        return $this;
    }

}
