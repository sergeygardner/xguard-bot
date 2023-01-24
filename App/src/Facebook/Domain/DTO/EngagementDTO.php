<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\DTO;

use JsonSerializable;

/**
 * This class represents a social sentence and like count used to render the like plugin
 * @see https://developers.facebook.com/docs/graph-api/reference/engagement/
 */
class EngagementDTO implements JsonSerializable
{

    /**
     * @param int         $count                        [Default] Number of people who like this
     * @param string|null $count_string                 Abbreviated string representation of count
     * @param string|null $count_string_with_like       Abbreviated string representation of count if the viewer likes the object
     * @param string|null $count_string_without_like    Abbreviated string representation of count if the viewer does not like the object
     * @param string      $social_sentence              [Default] Text that the like button would currently display
     * @param string|null $social_sentence_with_like    Text that the like button would display if the viewer likes the object
     * @param string|null $social_sentence_without_like Text that the like button would display if the viewer does not like the object
     */
    public function __construct(
        public readonly int $count,
        public readonly ?string $count_string,
        public readonly ?string $count_string_with_like,
        public readonly ?string $count_string_without_like,
        public readonly string $social_sentence,
        public readonly ?string $social_sentence_with_like,
        public readonly ?string $social_sentence_without_like
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'count'                        => $this->count,
            'count_string'                 => $this->count_string,
            'count_string_with_like'       => $this->count_string_with_like,
            'count_string_without_like'    => $this->count_string_without_like,
            'social_sentence'              => $this->social_sentence,
            'social_sentence_with_like'    => $this->social_sentence_with_like,
            'social_sentence_without_like' => $this->social_sentence_without_like,
        ];
    }
}
