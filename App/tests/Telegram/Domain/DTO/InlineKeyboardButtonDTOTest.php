<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class InlineKeyboardButtonDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromInlineKeyboardButtons(null));
        self::assertNull($DTOFactoryService->createDTOFromInlineKeyboardButton(null));

        $text                             = 'text';
        $url                              = 'https://t.me/';
        $callback_data                    = 'callback_data';
        $web_app                          = null;
        $login_url                        = null;
        $switch_inline_query              = 'switch_inline_query';
        $switch_inline_query_current_chat = 'switch_inline_query_current_chat';
        $callback_game                    = null;
        $pay                              = false;
        $inlineKeyboardButtonDTO          = $DTOFactoryService->createDTOFromInlineKeyboardButton(
            $inlineKeyboardButton = [
                'text'                             => $text,
                'url'                              => $url,
                'callback_data'                    => $callback_data,
                'web_app'                          => $web_app,
                'login_url'                        => $login_url,
                'switch_inline_query'              => $switch_inline_query,
                'switch_inline_query_current_chat' => $switch_inline_query_current_chat,
                'callback_game'                    => $callback_game,
                'pay'                              => $pay,
            ]
        );
        $inlineKeyboardButtonDTOs         = $DTOFactoryService->createDTOFromInlineKeyboardButtons(
            [$inlineKeyboardButton]
        );

        foreach ([$inlineKeyboardButtonDTO, ...$inlineKeyboardButtonDTOs] as $inlineKeyboardButtonDTOItem) {
            self::assertIsObject($inlineKeyboardButtonDTOItem);
            self::assertEquals($text, $inlineKeyboardButtonDTOItem->text);
            self::assertEquals($url, $inlineKeyboardButtonDTOItem->url);
            self::assertEquals($callback_data, $inlineKeyboardButtonDTOItem->callback_data);
            self::assertEquals($web_app, $inlineKeyboardButtonDTOItem->web_app);
            self::assertEquals($login_url, $inlineKeyboardButtonDTOItem->login_url);
            self::assertEquals($switch_inline_query, $inlineKeyboardButtonDTOItem->switch_inline_query);
            self::assertEquals(
                $switch_inline_query_current_chat,
                $inlineKeyboardButtonDTOItem->switch_inline_query_current_chat
            );
            self::assertEquals($callback_game, $inlineKeyboardButtonDTOItem->callback_game);
            self::assertEquals($pay, $inlineKeyboardButtonDTOItem->pay);
            self::assertEquals(
                json_encode($inlineKeyboardButton, JSON_THROW_ON_ERROR),
                json_encode($inlineKeyboardButtonDTOItem, JSON_THROW_ON_ERROR)
            );
        }
    }
}
