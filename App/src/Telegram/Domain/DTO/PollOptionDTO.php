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
 * This class contains information about one answer option in a poll.
 */
final class PollOptionDTO implements JsonSerializable
{

    /**
     * @param string $text        Option text, 1-100 characters
     * @param int    $voter_count Number of users that voted for this option
     */
    public function __construct(
        public readonly string $text,
        public readonly int $voter_count
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'text'        => $this->text,
            'voter_count' => $this->voter_count,
        ];
    }
}
