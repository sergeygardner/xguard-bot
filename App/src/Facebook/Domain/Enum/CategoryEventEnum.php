<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\Enum;

use JsonSerializable;

/**
 *
 */
enum CategoryEventEnum implements JsonSerializable
{

    case CLASSIC_LITERATURE;
    case COMEDY;
    case CRAFTS;
    case DANCE;
    case DRINKS;
    case FITNESS_AND_WORKOUTS;
    case FOODS;
    case GAMES;
    case GARDENING;
    case HEALTH_AND_MEDICAL;
    case HEALTHY_LIVING_AND_SELF_CARE;
    case HOME_AND_GARDEN;
    case MUSIC_AND_AUDIO;
    case PARTIES;
    case PROFESSIONAL_NETWORKING;
    case RELIGIONS;
    case SHOPPING_EVENT;
    case SOCIAL_ISSUES;
    case SPORTS;
    case THEATER;
    case TV_AND_MOVIES;
    case VISUAL_ARTS;

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
