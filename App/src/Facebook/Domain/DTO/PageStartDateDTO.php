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
 * This class represents date about when the entity represented by the Page was started
 * @see https://developers.facebook.com/docs/graph-api/reference/page-start-date/
 */
class PageStartDateDTO implements JsonSerializable
{

    /**
     * @param int $day   [Default] The start day of the entity
     * @param int $month [Default] The start month of the entity
     * @param int $year  [Default] The start year of the entity
     */
    public function __construct(
        public readonly int $day,
        public readonly int $month,
        public readonly int $year
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'day'   => $this->day,
            'month' => $this->month,
            'year'  => $this->year,
        ];
    }
}
