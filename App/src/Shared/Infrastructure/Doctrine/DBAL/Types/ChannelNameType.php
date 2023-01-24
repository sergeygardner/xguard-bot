<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\StringType;
use Throwable;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;

/**
 * DBAL ChannelName
 */
final class ChannelNameType extends StringType
{

    /**
     * {@inheritDoc}
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?ChannelNameValueObject
    {
        if ($value === null) {
            return null;
        }

        try {
            return new ChannelNameValueObject($value);
        } catch (Throwable $exception) {
            throw ConversionException::conversionFailedInvalidType(
                $value,
                __CLASS__,
                [ChannelNameValueObject::class],
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
        if (!($value instanceof ChannelNameValueObject)) {
            throw ConversionException::conversionFailedInvalidType($value, __CLASS__, [ChannelNameValueObject::class]);
        }

        return (string)$value;
    }

}
