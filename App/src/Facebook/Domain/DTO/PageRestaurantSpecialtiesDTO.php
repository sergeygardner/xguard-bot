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
 * This class represents the specialties of a restaurant that is represented by a Facebook Page
 * @see https://developers.facebook.com/docs/graph-api/reference/page-restaurant-specialties/
 */
class PageRestaurantSpecialtiesDTO implements JsonSerializable
{

    /**
     * @param int $breakfast [Default] Whether the restaurant serves breakfast
     * @param int $coffee    [Default] Whether the restaurant serves coffee
     * @param int $dinner    [Default] Whether the restaurant serves dinner
     * @param int $drinks    [Default] Whether the restaurant serves drinks
     * @param int $lunch     [Default] Whether the restaurant serves lunch
     */
    public function __construct(
        public readonly int $breakfast,
        public readonly int $coffee,
        public readonly int $dinner,
        public readonly int $drinks,
        public readonly int $lunch
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'breakfast' => $this->breakfast,
            'coffee'    => $this->coffee,
            'dinner'    => $this->dinner,
            'drinks'    => $this->drinks,
            'lunch'     => $this->lunch,
        ];
    }
}
