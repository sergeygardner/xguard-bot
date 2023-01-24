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
use Doctrine\DBAL\Types\StringType;
use Throwable;
use XGuard\Bot\Facebook\Domain\ValueObject\ClientSecretValueObject;

/**
 * DBAL ClientSecret
 */
final class ClientSecretType extends StringType
{

    /**
     * {@inheritDoc}
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?ClientSecretValueObject
    {
        if ($value === null) {
            return null;
        }

        try {
            return new ClientSecretValueObject($value);
        } catch (Throwable $exception) {
            throw ConversionException::conversionFailedInvalidType(
                $value,
                __CLASS__,
                [ClientSecretValueObject::class],
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
        if (!($value instanceof ClientSecretValueObject)) {
            throw ConversionException::conversionFailedInvalidType(
                $value,
                __CLASS__,
                [ClientSecretValueObject::class]
            );
        }

        return (string)$value;
    }

}
