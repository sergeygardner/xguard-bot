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
 * This class represents information about when a business was started that's represented by a Facebook Page
 * @see https://developers.facebook.com/docs/graph-api/reference/page-start-info/
 */
class PageStartInfoDTO implements JsonSerializable
{

    /**
     * @param PageStartDateDTO $date [Default] The start date of the entity
     * @param string           $type [Default] The start type of the entity
     */
    public function __construct(
        public readonly PageStartDateDTO $date,
        public readonly string $type
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'date' => $this->date,
            'type' => $this->type,
        ];
    }
}
