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
 * This class represents services that a Restaurant that's represented as a Facebook Page might provide
 * @see https://developers.facebook.com/docs/graph-api/reference/page-restaurant-services/
 */
class PageRestaurantServicesDTO implements JsonSerializable
{

    /**
     * @param bool $catering [Default] Whether the restaurant has catering service
     * @param bool $delivery [Default] Whether the restaurant has delivery service
     * @param bool $groups   [Default] Whether the restaurant is group-friendly
     * @param bool $kids     [Default] Whether the restaurant is kids-friendly
     * @param bool $outdoor  [Default] Whether the restaurant has outdoor seating
     * @param bool $pickup   [Default] Whether the restaurant has pickup service
     * @param bool $reserve  [Default] Whether the restaurant takes reservations
     * @param bool $takeout  [Default] Whether the restaurant has takeout service
     * @param bool $waiter   [Default] Whether the restaurant has waiters
     * @param bool $walkins  [Default] Whether the restaurant welcomes walkins
     */
    public function __construct(
        public readonly bool $catering,
        public readonly bool $delivery,
        public readonly bool $groups,
        public readonly bool $kids,
        public readonly bool $outdoor,
        public readonly bool $pickup,
        public readonly bool $reserve,
        public readonly bool $takeout,
        public readonly bool $waiter,
        public readonly bool $walkins
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'catering' => $this->catering,
            'delivery' => $this->delivery,
            'groups'   => $this->groups,
            'kids'     => $this->kids,
            'outdoor'  => $this->outdoor,
            'pickup'   => $this->pickup,
            'reserve'  => $this->reserve,
            'takeout'  => $this->takeout,
            'waiter'   => $this->waiter,
            'walkins'  => $this->walkins,
        ];
    }
}
