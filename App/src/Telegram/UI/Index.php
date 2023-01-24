<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\UI;

/**
 *
 */
final class Index
{

    /**
     * @return void
     */
    public function list(): void
    {
        echo PHP_EOL,
        "\033[36mTelegram",
        PHP_EOL,
        "\033[90mActions for the telegram bot",
        PHP_EOL,
        PHP_EOL,
        "\033[33mList of Actions:",
        PHP_EOL,
        "\033[32mtelegram:index:list \033[90mShow the list of the functions. The possible flags are not defined.",
        PHP_EOL,
        "\033[32mtelegram:bot:create \033[90mCreate a bot. The possible flags are --botName=? --token=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:bot:read \033[90mRead the list of bots. The possible flags are ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:bot:update \033[90mUpdate the bot. The possible flags are --id=? --botName=? --newBotName=? --token=? --newToken=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:bot:delete \033[90mDelete the bot. The possible flags are --id=? --botName=? --token=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:channel:create \033[90mCreate a channel. The possible flags are --channelName=? --chatId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:channel:read \033[90mRead the list of channels. The possible flags are ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:channel:update \033[90mUpdate the channel. The possible flags are --id=? --channelName=? --newChannelName=? --chatId=? --newChatId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:channel:delete \033[90mDelete the channel. The possible flags are --id=? --channelName=? --chatId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:channel_to_bot:create \033[90mCreate a channel_to_bot. The possible flags are --channelId=? --botId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:channel_to_bot:read \033[90mRead the list of channels_to_bots. The possible flags are ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:channel_to_bot:update \033[90mUpdate the channel_to_bot. The possible flags are --id=? --channelId=? --newChannelId=? --botId=? --newBotId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:channel_to_bot:delete \033[90mDelete the channel_to_bot. The possible flags are --id=? --channelId=? --botId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mtelegram:message:post \033[90mPost messages. The possible flags are --baseURI=? --botName=? --channelName=? --messageSent=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[39m";
    }
}
