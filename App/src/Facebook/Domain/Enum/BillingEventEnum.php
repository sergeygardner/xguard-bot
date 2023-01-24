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

enum BillingEventEnum implements JsonSerializable
{

    case APP_INSTALLS;       //Pay when people install your app.
    case CLICKS;             //Pay when people click anywhere in the ad.
    case IMPRESSIONS;        //Pay when the ads are shown to people.
    case LINK_CLICKS;        //Pay when people click on the link of the ad.
    case NONE;               //Money for nothing ;-)
    case OFFER_CLAIMS;       //Pay when people claim the offer.
    case PAGE_LIKES;         //Pay when people like your page.
    case POST_ENGAGEMENT;    //Pay when people engage with your post.
    case THRUPLAY;           //Pay for ads that are played to completion, or played for at least 15 seconds.
    case PURCHASE;           //TODO what is it?
    case LISTING_INTERACTION;//TODO what is it?
    case VIDEO_VIEWS;        //Pay when people watch your video ads for at least 10 seconds.

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
