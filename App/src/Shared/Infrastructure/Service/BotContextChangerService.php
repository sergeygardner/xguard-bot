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

use Throwable;
use XGuard\Bot\Facebook\UI\Bot as FacebookBot;
use XGuard\Bot\Facebook\UI\Channel as FacebookChannel;
use XGuard\Bot\Facebook\UI\ChannelToBot as FacebookChannelToBot;
use XGuard\Bot\Facebook\UI\Index as FacebookIndex;
use XGuard\Bot\Facebook\UI\Post;
use XGuard\Bot\Shared\UI\ChannelToBot as SharedChannelToBot;
use XGuard\Bot\Shared\UI\Index as SharedIndex;
use XGuard\Bot\Telegram\UI\Bot as TelegramBot;
use XGuard\Bot\Telegram\UI\Channel as TelegramChannel;
use XGuard\Bot\Telegram\UI\ChannelToBot as TelegramChannelToBot;
use XGuard\Bot\Telegram\UI\Index as TelegramIndex;
use XGuard\Bot\Telegram\UI\Message;

/**
 *
 */
final class BotContextChangerService implements BotContextChangerServiceInterface
{

    /**
     * @var array[]
     */
    private readonly array $contexts;

    /**
     * @param array $arguments
     */
    public function __construct(public readonly array $arguments)
    {
        $this->contexts = [
            'Facebook' => [
                'Bot'            => FacebookBot::class,
                'Channel'        => FacebookChannel::class,
                'Channel_to_bot' => FacebookChannelToBot::class,
                'Index'          => FacebookIndex::class,
                'Post'           => Post::class,
            ],
            'Shared'   => [
                'Channel_to_bot' => SharedChannelToBot::class,
                'Index'          => SharedIndex::class,
            ],
            'Telegram' => [
                'Bot'            => TelegramBot::class,
                'Channel'        => TelegramChannel::class,
                'Channel_to_bot' => TelegramChannelToBot::class,
                'Index'          => TelegramIndex::class,
                'Message'        => Message::class,
            ],
        ];
    }

    /**
     * @return void
     */
    public function switch(): void
    {
        try {
            [$context, $className, $action] = $this->ensureRoute();
            $context   = ucfirst($context);
            $className = ucfirst($className);

            (new ($this->contexts[$context][$className])($this->prepareARGV()))->{$action}();
        } catch (Throwable $e) {
            echo PHP_EOL,
            "\033[31mError:",
            PHP_EOL,
            $e->getMessage(),
            PHP_EOL,
            PHP_EOL,
            "\033[31mTrace:",
            PHP_EOL,
            $e->getTraceAsString(),
            PHP_EOL,
            "\033[39m";
        }
    }

    /**
     * @return array
     */
    private function ensureRoute(): array
    {
        return array_replace(
            ['Shared', 'Index', 'List'],
            explode(':', $this->arguments[1] ?? 'shared:index:list', 3)
        );
    }

    /**
     * @return array
     */
    private function prepareARGV(): array
    {
        return array_reduce(
            $this->arguments,
            static function (array $carry, string $item): array {
                preg_match('#--([^=]+)=(.+)#', $item, $matches);

                if (count($matches) === 3) {
                    $carry[$matches[1]] = $matches[2];
                }

                return $carry;
            },
            []
        );
    }
}
