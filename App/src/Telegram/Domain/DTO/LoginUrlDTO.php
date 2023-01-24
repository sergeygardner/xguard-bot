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
 * This class represents a parameter of the inline keyboard button used to automatically authorize a user. Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram. All the user needs to do is tap/click a button and confirm that they want to log in.
 */
final class LoginUrlDTO implements JsonSerializable
{

    /**
     * @param string      $url                  An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed. If the user refuses to provide authorization data, the original URL without information about the user will be opened. The data added is the same as described in Receiving authorization data. NOTE: You must always check the hash of the received data to verify the authentication and the integrity of the data as described in Checking authorization.
     * @param string|null $forward_text         Optional. New text of the button in forwarded messages.
     * @param string|null $bot_username         Optional. Username of a bot, which will be used for user authorization. See Setting up a bot for more details. If not specified, the current bot's username will be assumed. The url's domain must be the same as the domain linked with the bot. See Linking your domain to the bot for more details.
     * @param bool|null   $request_write_access Optional. Pass True to request the permission for your bot to send messages to the user.
     */
    public function __construct(
        public readonly string $url,
        public readonly ?string $forward_text,
        public readonly ?string $bot_username,
        public readonly ?bool $request_write_access,
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'url'                  => $this->url,
            'forward_text'         => $this->forward_text,
            'bot_username'         => $this->bot_username,
            'request_write_access' => $this->request_write_access,
        ];
    }
}
