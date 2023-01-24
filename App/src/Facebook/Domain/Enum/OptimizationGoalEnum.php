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
enum OptimizationGoalEnum implements JsonSerializable
{

    case NONE;                                //Only available in read mode for campaigns created pre-v2.4.
    case APP_INSTALLS;                        //Optimize for people more likely to install your app.
    case AD_RECALL_LIFT;                      //Optimize for people more likely to remember seeing your ads.
    case CLICKS;                              //Deprecated. Only available in read mode.
    case ENGAGED_USERS;                       //Optimize for people more likely to take a particular action in your app.
    case EVENT_RESPONSES;                     //Optimize for people more likely to attend your event.
    case IMPRESSIONS;                         //Show the ads as many times as possible.
    case LEAD_GENERATION;                     //Optimize for people more likely to fill out a lead generation form.
    case QUALITY_LEAD;                        //Optimize for people who are likely to have a deeper conversation with advertisers after lead submission.
    case LINK_CLICKS;                         //Optimize for people more likely to click in the link of the ad.
    case OFFSITE_CONVERSIONS;                 //Optimize for people more likely to make a conversion on the site.
    case PAGE_LIKES;                          //Optimize for people more likely to like your page.
    case POST_ENGAGEMENT;                     //Optimize for people more likely to engage with your post.
    case QUALITY_CALL;                        //Optimize for people who are likely to call the advertiser.
    case REACH;                               //Optimize to reach the unique users for each day or interval specified in frequency_control_specs.
    case LANDING_PAGE_VIEWS;                  //Optimize for people who are most likely to click on and load your chosen landing page.
    case VISIT_INSTAGRAM_PROFILE;             //Optimize for visits to the advertiser's Instagram profile.
    case VALUE;                               //Optimize for maximum total purchase value within the specified attribution window.
    case THRUPLAY;                            //Optimize delivery of your ads to people who are more likely to play your ad to completion, or play it for at least 15 seconds.
    case DERIVED_EVENTS;                      //Optimize for retention, which reaches people who are most likely to return to the app and open it again during a given time frame after installing. You can choose either two days, meaning the app is likely to be reopened between 24 and 48 hours after installation; or seven days, meaning the app is likely to be reopened between 144 and 168 hours after installation.
    case APP_INSTALLS_AND_OFFSITE_CONVERSIONS;//Optimizes for people more likely to install your app and make a conversion on your site.
    case CONVERSATIONS;                       //Directs ads to people more likely to have a conversation with the business.
    case IN_APP_VALUE;                        //TODO what is it?
    case MESSAGING_PURCHASE_CONVERSION;       //TODO what is it?
    case MESSAGING_APPOINTMENT_CONVERSION;    //TODO what is it?
    case SUBSCRIBERS;                         //TODO what is it?
    case REMINDERS_SET;                       //TODO what is it?

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
