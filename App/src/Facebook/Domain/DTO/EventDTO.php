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

use DateTimeInterface;
use JsonSerializable;
use XGuard\Bot\Facebook\Domain\Enum\CategoryEventEnum;
use XGuard\Bot\Facebook\Domain\Enum\OnlineEventFormatEnum;
use XGuard\Bot\Facebook\Domain\Enum\TypeEventEnum;

/**
 * The class represents an Event.
 * @see https://developers.facebook.com/docs/graph-api/reference/event/
 */
class EventDTO implements JsonSerializable
{

    /**
     * @param string|null                $id                           The event ID
     * @param int|null                   $attending_count              Number of people attending the event
     * @param bool|null                  $can_guests_invite            Can guests invite friends? Requires an access token of an Admin of the Event
     * @param CategoryEventEnum|null     $category                     The category of the event
     * @param CoverPhotoDTO|null         $cover                        Cover picture
     * @param DateTimeInterface|null     $created_time                 created_time
     * @param int|null                   $declined_count               Number of people who declined the event
     * @param string                     $description                  [Default] Long-form description
     * @param bool|null                  $discount_code_enabled        Is discount code enabled for this event
     * @param string                     $end_time                     [Default] End time, if one has been set
     * @param ChildEventDTO[]            $event_times                  [Default] Array of times of a multi-instance event
     * @param bool|null                  $guest_list_enabled           Can see a guest list. Requires an access token of an Admin of the Event
     * @param int|null                   $interested_count             Number of people interested in the event
     * @param bool|null                  $is_canceled                  Whether the event has been marked as canceled
     * @param bool|null                  $is_draft                     Whether the event is in draft mode or published. Requires an access token of an Admin of the Event
     * @param bool|null                  $is_online                    Whether the event is online or not. Required to pass the 'address' (city name) parameter for online events.
     * @param bool|null                  $is_page_owned                Whether the event is created by page or not
     * @param int|null                   $maybe_count                  Number of people who maybe going to the event
     * @param string                     $name                         [Default] Event name
     * @param int|null                   $noreply_count                Number of people who did not reply to the event
     * @param OnlineEventFormatEnum|null $online_event_format          Type of online event - Live, Link or Other
     * @param string|null                $online_event_third_party_url Third party streaming url associated with Link events
     * @param mixed                      $owner                        The profile that created the event TODO to real type
     * @param PlaceDTO|null              $place                        Event Place information
     * @param string|null                $scheduled_publish_time       Time when event is scheduled to be published
     * @param string                     $start_time                   [Default] Start time
     * @param string|null                $ticket_uri                   The link users can visit to buy a ticket to this event
     * @param string|null                $ticket_uri_start_sales_time  Time when tickets go on sale
     * @param string|null                $ticketing_privacy_uri        URI to seller's privacy policy for ticket purchases
     * @param string|null                $ticketing_terms_uri          URI to seller's terms of service for ticket purchases
     * @param string|null                $timezone                     Timezone
     * @param TypeEventEnum|null         $type                         The type of the event
     * @param DateTimeInterface|null     $updated_time                 Last update time (ISO 8601 formatted)
     */
    public function __construct(
        public readonly ?string $id,
        public readonly ?int $attending_count,
        public readonly ?bool $can_guests_invite,
        public readonly ?CategoryEventEnum $category,
        public readonly ?CoverPhotoDTO $cover,
        public readonly ?DateTimeInterface $created_time,
        public readonly ?int $declined_count,
        public readonly string $description,
        public readonly ?bool $discount_code_enabled,
        public readonly string $end_time,
        public readonly array $event_times,
        public readonly ?bool $guest_list_enabled,
        public readonly ?int $interested_count,
        public readonly ?bool $is_canceled,
        public readonly ?bool $is_draft,
        public readonly ?bool $is_online,
        public readonly ?bool $is_page_owned,
        public readonly ?int $maybe_count,
        public readonly string $name,
        public readonly ?int $noreply_count,
        public readonly ?OnlineEventFormatEnum $online_event_format,
        public readonly ?string $online_event_third_party_url,
        public readonly mixed $owner,
        public readonly ?PlaceDTO $place,
        public readonly ?string $scheduled_publish_time,
        public readonly string $start_time,
        public readonly ?string $ticket_uri,
        public readonly ?string $ticket_uri_start_sales_time,
        public readonly ?string $ticketing_privacy_uri,
        public readonly ?string $ticketing_terms_uri,
        public readonly ?string $timezone,
        public readonly ?TypeEventEnum $type,
        public readonly ?DateTimeInterface $updated_time
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                           => $this->id,
            'attending_count'              => $this->attending_count,
            'can_guests_invite'            => $this->can_guests_invite,
            'category'                     => $this->category,
            'cover'                        => $this->cover,
            'created_time'                 => $this->created_time,
            'declined_count'               => $this->declined_count,
            'description'                  => $this->description,
            'discount_code_enabled'        => $this->discount_code_enabled,
            'end_time'                     => $this->end_time,
            'event_times'                  => $this->event_times,
            'guest_list_enabled'           => $this->guest_list_enabled,
            'interested_count'             => $this->interested_count,
            'is_canceled'                  => $this->is_canceled,
            'is_draft'                     => $this->is_draft,
            'is_online'                    => $this->is_online,
            'is_page_owned'                => $this->is_page_owned,
            'maybe_count'                  => $this->maybe_count,
            'name'                         => $this->name,
            'noreply_count'                => $this->noreply_count,
            'online_event_format'          => $this->online_event_format,
            'online_event_third_party_url' => $this->online_event_third_party_url,
            'owner'                        => $this->owner,
            'place'                        => $this->place,
            'scheduled_publish_time'       => $this->scheduled_publish_time,
            'start_time'                   => $this->start_time,
            'ticket_uri'                   => $this->ticket_uri,
            'ticket_uri_start_sales_time'  => $this->ticket_uri_start_sales_time,
            'ticketing_privacy_uri'        => $this->ticketing_privacy_uri,
            'ticketing_terms_uri'          => $this->ticketing_terms_uri,
            'timezone'                     => $this->timezone,
            'type'                         => $this->type,
            'updated_time'                 => $this->updated_time,
        ];
    }
}
