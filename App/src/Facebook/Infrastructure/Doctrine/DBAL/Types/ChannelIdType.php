<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\IntegerType;
use Throwable;
use XGuard\Bot\Facebook\Domain\ValueObject\ChannelIdValueObject;

/**
 * DBAL ChannelId
 */
final class ChannelIdType extends IntegerType
{

    /**
     * {@inheritDoc}
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?ChannelIdValueObject
    {
        if ($value === null) {
            return null;
        }

        try {
            return new ChannelIdValueObject((string)$value);
        } catch (Throwable $exception) {
            throw ConversionException::conversionFailedInvalidType(
                $value,
                __CLASS__,
                [ChannelIdValueObject::class],
                $exception
            );
        }
    }

    /**
     * {@inheritDoc}
     * @throws ConversionException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        if (!($value instanceof ChannelIdValueObject)) {
            throw ConversionException::conversionFailedInvalidType(
                $value,
                __CLASS__,
                [ChannelIdValueObject::class]
            );
        }

        return $value->getValue();
    }

}
