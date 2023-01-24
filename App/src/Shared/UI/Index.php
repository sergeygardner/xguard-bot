<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\UI;

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
        echo "\033[36mShared",
        PHP_EOL,
        "\033[90mDescription for all actions",
        PHP_EOL,
        PHP_EOL,
        "\033[33mList of Actions:",
        PHP_EOL,
        "\033[32mshared:index:list \033[90mShow the list of the functions. The possible flags are not defined.",
        PHP_EOL,
        "\033[32mshared:channel_to_bot:create \033[90mCreate a channel_to_bot. The possible flags are --channelId=? --botId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mshared:channel_to_bot:read \033[90mRead the list of channels_to_bots. The possible flags are ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mshared:channel_to_bot:update \033[90mUpdate the channel_to_bot. The possible flags are --id=? --channelId=? --newChannelId=? --botId=? --newBotId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[32mshared:channel_to_bot:delete \033[90mDelete the channel_to_bot. The possible flags are --id=? --channelId=? --botId=? ?--databaseUser=? ?--databasePassword=? ?--databaseName=? ?--databaseHost=? ?--devMode=?",
        PHP_EOL,
        "\033[39m";

        (new \XGuard\Bot\Facebook\UI\Index())->list();
        (new \XGuard\Bot\Telegram\UI\Index())->list();
    }
}
