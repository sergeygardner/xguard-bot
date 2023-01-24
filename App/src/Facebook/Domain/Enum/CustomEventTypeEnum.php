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
enum CustomEventTypeEnum implements JsonSerializable
{

    case RATE;
    case TUTORIAL_COMPLETION;
    case CONTACT;
    case CUSTOMIZE_PRODUCT;
    case DONATE;
    case FIND_LOCATION;
    case SCHEDULE;
    case START_TRIAL;
    case SUBMIT_APPLICATION;
    case SUBSCRIBE;
    case ADD_TO_CART;
    case ADD_TO_WISHLIST;
    case INITIATED_CHECKOUT;
    case ADD_PAYMENT_INFO;
    case PURCHASE;
    case LEAD;
    case COMPLETE_REGISTRATION;
    case CONTENT_VIEW;
    case SEARCH;
    case SERVICE_BOOKING_REQUEST;
    case MESSAGING_CONVERSATION_STARTED_7D;
    case LEVEL_ACHIEVED;
    case ACHIEVEMENT_UNLOCKED;
    case SPENT_CREDITS;
    case LISTING_INTERACTION;
    case D2_RETENTION;
    case D7_RETENTION;
    case OTHER;

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
