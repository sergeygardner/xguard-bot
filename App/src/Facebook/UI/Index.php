<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\UI;

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
        "\033[36mFacebook",
        PHP_EOL,
        "\033[90mActions for the Facebook bot",
        PHP_EOL,
        PHP_EOL,
        "\033[33mList of Actions:",
        PHP_EOL,
        "\033[32mfacebook:index:list \033[90mShow the list of the functions. The possible flags are not defined.",
        PHP_EOL,
        "\033[32mfacebook:bot:create \033[90mCreate a bot. The possible flags are --clientId=? --clientSecret=? --botName=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:bot:read \033[90mRead the list of bots. The possible flags are ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:bot:update \033[90mUpdate the bot. The possible flags are --id=? --clientId=? --newClientId=? --clientSecret=? --newClientSecret=? --botName=? --newBotName=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:bot:delete \033[90mDelete the bot. The possible flags are --id=? --clientId=? --clientSecret=? --botName=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:channel:create \033[90mCreate a channel. The possible flags are --channelId=? --channelName=? --channelType=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:channel:read \033[90mRead the list of channels. The possible flags are ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:channel:update \033[90mUpdate the channel. The possible flags are --id=? --channelId=? --newChannelId=? --channelName=? --newChannelName=? --channelType=? --newChannelType=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:channel:delete \033[90mDelete the channel. The possible flags are --id=? --channelId=? --channelName=? --channelType=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:channel_to_bot:create \033[90mCreate a channel_to_bot. The possible flags are --channelId=? --botId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:channel_to_bot:read \033[90mRead the list of channels_to_bots. The possible flags are ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:channel_to_bot:update \033[90mUpdate the channel_to_bot. The possible flags are --id=? --channelId=? --newChannelId=? --botId=? --newBotId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:channel_to_bot:delete \033[90mDelete the channel_to_bot. The possible flags are --id=? --channelId=? --botId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mfacebook:post:get \033[90mGet messages from the channel. The possible flags are --baseURI=? --clientId=? --clientSecret=? --channelName=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[39m";
    }
}
