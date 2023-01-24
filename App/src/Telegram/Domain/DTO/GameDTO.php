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
 * This class represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 */
final class GameDTO implements JsonSerializable
{

    /**
     * @param string                  $title         Title of the game
     * @param string                  $description   Description of the game
     * @param PhotoSizeDTO[]          $photo         Photo that will be displayed in the game message in chats.
     * @param string|null             $text          Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
     * @param MessageEntityDTO[]|null $text_entities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     * @param AnimationDTO|null       $animation     Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
     */
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly array $photo,
        public readonly ?string $text,
        public readonly ?array $text_entities,
        public readonly ?AnimationDTO $animation
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'title'         => $this->title,
            'description'   => $this->description,
            'photo'         => $this->photo,
            'text'          => $this->text,
            'text_entities' => $this->text_entities,
            'animation'     => $this->animation,
        ];
    }
}
