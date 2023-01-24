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
 * This class contains information about a poll.
 */
final class PollDTO implements JsonSerializable
{

    /**
     * @param string                  $id                      Unique poll identifier
     * @param string                  $question                Poll question, 1-300 characters
     * @param PollOptionDTO[]         $options                 List of poll options
     * @param int                     $total_voter_count       Total number of users that voted in the poll
     * @param bool                    $is_closed               True, if the poll is closed
     * @param bool                    $is_anonymous            True, if the poll is anonymous
     * @param string                  $type                    Poll type, currently can be "regular" or "quiz"
     * @param bool                    $allows_multiple_answers True, if the poll allows multiple answers
     * @param int|null                $correct_option_id       Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
     * @param string|null             $explanation             Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
     * @param MessageEntityDTO[]|null $explanation_entities    Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
     * @param int|null                $open_period             Optional. Amount of time in seconds the poll will be active after creation
     * @param int|null                $close_date              Optional. Point in time (Unix timestamp) when the poll will be automatically closed
     */
    public function __construct(
        public readonly string $id,
        public readonly string $question,
        public readonly array $options,
        public readonly int $total_voter_count,
        public readonly bool $is_closed,
        public readonly bool $is_anonymous,
        public readonly string $type,
        public readonly bool $allows_multiple_answers,
        public readonly ?int $correct_option_id,
        public readonly ?string $explanation,
        public readonly ?array $explanation_entities,
        public readonly ?int $open_period,
        public readonly ?int $close_date
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                      => $this->id,
            'question'                => $this->question,
            'options'                 => $this->options,
            'total_voter_count'       => $this->total_voter_count,
            'is_closed'               => $this->is_closed,
            'is_anonymous'            => $this->is_anonymous,
            'type'                    => $this->type,
            'allows_multiple_answers' => $this->allows_multiple_answers,
            'correct_option_id'       => $this->correct_option_id,
            'explanation'             => $this->explanation,
            'explanation_entities'    => $this->explanation_entities,
            'open_period'             => $this->open_period,
            'close_date'              => $this->close_date,
        ];
    }
}
