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
 * The class represents demographic restrictions for a Facebook App
 * @see https://developers.facebook.com/docs/graph-api/reference/application-restriction-info/
 */
class ApplicationRestrictionInfoDTO implements JsonSerializable
{

    /**
     * @param string $age              [Default] Age restrictions for the app. Can be one of the following values: 13+, 16+, 17+, 18+, 19+, or 21+
     * @param string $age_distribution [Default] Age restrictions by location
     * @param string $location         [Default] Location restrictions for the app. Facebook uses 2-letter country codes.
     * @param string $type             [Default] Custom category restrictions for the app. Currently, can only be set to alcohol.
     */
    public function __construct(
        public readonly string $age,
        public readonly string $age_distribution,
        public readonly string $location,
        public readonly string $type
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'age'              => $this->age,
            'age_distribution' => $this->age_distribution,
            'location'         => $this->location,
            'type'             => $this->type,
        ];
    }
}
