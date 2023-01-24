<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Domain\DTO;

use JsonSerializable;

/**
 * This class represents one button of an inline keyboard. You must use exactly one of the optional fields.
 */
final class InlineKeyboardButtonDTO implements JsonSerializable
{

    /**
     * @param string               $text                             Label text on the button
     * @param string|null          $url                              Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to mention a user by their ID without using a username, if this is allowed by their privacy settings.
     * @param string|null          $callback_data                    Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
     * @param WebAppInfoDTO|null   $web_app                          Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot.
     * @param LoginUrlDTO|null     $login_url                        Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
     * @param string|null          $switch_inline_query              Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted. Note: This offers an easy way for users to start using your bot in inline mode when they are currently in a private chat with it. Especially useful when combined with switch_pm… actions - in this case the user will be automatically returned to the chat they switched from, skipping the chat selection screen.
     * @param string|null          $switch_inline_query_current_chat Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted. This offers a quick way for the user to open your bot in inline mode in the same chat - good for selecting something from multiple options.
     * @param CallbackGameDTO|null $callback_game                    Optional. Description of the game that will be launched when the user presses the button. NOTE: This type of button must always be the first button in the first row.
     * @param bool|null            $pay                              Optional. Specify True, to send a Pay button. NOTE: This type of button must always be the first button in the first row and can only be used in invoice messages.
     */
    public function __construct(
        public readonly string $text,
        public readonly ?string $url,
        public readonly ?string $callback_data,
        public readonly ?WebAppInfoDTO $web_app,
        public readonly ?LoginUrlDTO $login_url,
        public readonly ?string $switch_inline_query,
        public readonly ?string $switch_inline_query_current_chat,
        public readonly ?CallbackGameDTO $callback_game,
        public readonly ?bool $pay
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'text'                             => $this->text,
            'url'                              => $this->url,
            'callback_data'                    => $this->callback_data,
            'web_app'                          => $this->web_app,
            'login_url'                        => $this->login_url,
            'switch_inline_query'              => $this->switch_inline_query,
            'switch_inline_query_current_chat' => $this->switch_inline_query_current_chat,
            'callback_game'                    => $this->callback_game,
            'pay'                              => $this->pay,
        ];
    }
}
