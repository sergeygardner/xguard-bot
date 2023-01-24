<?php declare(strict_types=1);

use Doctrine\DBAL\Types\Type;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ChannelIdType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ClientIdType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\ClientSecretType;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\DBAL\Types\TypeType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ActionType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\BotNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\ChannelNameType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\TextType;
use XGuard\Bot\Shared\Infrastructure\Doctrine\DBAL\Types\UuidType;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types\ChatIdType;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\DBAL\Types\TokenType;

try {
    Type::addType('ActionType', ActionType::class);
    Type::addType('BotNameType', BotNameType::class);
    Type::addType('ChannelNameType', ChannelNameType::class);
    Type::addType('ChannelIdType', ChannelIdType::class);
    Type::addType('ChatIdType', ChatIdType::class);
    Type::addType('ClientIdType', ClientIdType::class);
    Type::addType('ClientSecretType', ClientSecretType::class);
    Type::addType('UuidType', UuidType::class);
    Type::addType('TextType', TextType::class);
    Type::addType('TokenType', TokenType::class);
    Type::addType('TypeType', TypeType::class);
    Type::addType('UuidType', UuidType::class);
} catch (Exception $e) {

}
