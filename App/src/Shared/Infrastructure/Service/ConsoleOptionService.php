<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Infrastructure\Service;

/**
 *
 */
final class ConsoleOptionService
{

    /**
     * @param array $options
     *
     * @example [SHORT_OPTIONS_AND_LONG_OPTIONS]
     * @see     https://php.net/manual/en/function.getopt.php
     */
    public function __construct(public readonly array $options)
    {

    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->options['id'] ?? 'id';
    }

    /**
     * @return string
     */
    public function getBotName(): string
    {
        return $this->options['botName'] ?? 'botName';
    }

    /**
     * @return string
     */
    public function getNewBotName(): string
    {
        return $this->options['newBotName'] ?? $this->options['botName'] ?? 'newBotName';
    }

    /**
     * @return string
     */
    public function getBotId(): string
    {
        return $this->options['botId'] ?? 'botId';
    }

    /**
     * @return string
     */
    public function getNewBotId(): string
    {
        return $this->options['newBotId'] ?? $this->options['botId'] ?? 'newBotId';
    }

    /**
     * @return string
     */
    public function getChannelId(): string
    {
        return $this->options['channelId'] ?? 'channelId';
    }

    /**
     * @return string
     */
    public function getNewChannelId(): string
    {
        return $this->options['newChannelId'] ?? $this->options['channelId'] ?? 'newChannelId';
    }

    /**
     * @return string
     */
    public function getChannelName(): string
    {
        return $this->options['channelName'] ?? 'channel_name';
    }

    /**
     * @return string
     */
    public function getNewChannelName(): string
    {
        return $this->options['newChannelName'] ?? $this->options['channelName'] ?? 'newChannelName';
    }

    /**
     * @return string
     */
    public function getChannelType(): string
    {
        return $this->options['channelType'] ?? 'channel_type';
    }

    /**
     * @return string
     */
    public function getNewChannelType(): string
    {
        return $this->options['newChannelType'] ?? $this->options['channelType'] ?? 'new_channel_type';
    }

    /**
     * @return string
     */
    public function getDatabaseUser(): string
    {
        return $this->options['databaseUser'] ?? (getenv('DATABASE_USER') ?: 'test');
    }

    /**
     * @return string
     */
    public function getDatabasePassword(): string
    {
        return $this->options['databasePassword'] ?? (getenv('DATABASE_PASSWORD') ?: 'test');
    }

    /**
     * @return string
     */
    public function getDatabaseName(): string
    {
        return $this->options['databaseName'] ?? (getenv('DATABASE_NAME') ?: 'test');
    }

    /**
     * @return string
     */
    public function getDatabaseHost(): string
    {
        return $this->options['databaseHost'] ?? (getenv('DATABASE_HOST') ?: 'localhost');
    }

    /**
     * @return bool
     */
    public function getDevMode(): bool
    {
        return (bool)(int)($this->options['devMode'] ?? (getenv('DEV_MODE') ?: true));
    }

    /**
     * @return string
     */
    public function getBaseURI(): string
    {
        return $this->options['baseURI'] ?? 'https://xxx.xxx.xxx/';
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->options['clientId'] ?? 'clientId';
    }

    /**
     * @return string
     */
    public function getNewClientId(): string
    {
        return $this->options['newClientId'] ?? $this->options['clientId'] ?? 'newClientId';
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->options['clientSecret'] ?? 'clientSecret';
    }

    /**
     * @return string
     */
    public function getNewClientSecret(): string
    {
        return $this->options['newClientSecret'] ?? $this->options['clientSecret'] ?? 'newClientSecret';
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->options['token'] ?? 'token';
    }

    /**
     * @return string
     */
    public function getNewToken(): string
    {
        return $this->options['newToken'] ?? $this->options['token'] ?? 'newToken';
    }

    /**
     * @return string
     */
    public function getChatId(): string
    {
        return $this->options['chatId'] ?? 'chatId';
    }

    /**
     * @return string
     */
    public function getNewChatId(): string
    {
        return $this->options['newChatId'] ?? $this->options['chatId'] ?? 'newChatId';
    }
}
