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

/**
 * This class represents an individual video on Facebook.
 * @see https://developers.facebook.com/docs/graph-api/reference/video/
 */
class VideoDTO implements JsonSerializable
{

    /**
     * @param string|null                 $id
     * @param int[]|null                  $ad_breaks
     * @param DateTimeInterface|null      $backdated_time
     * @param string|null                 $backdated_time_granularity
     * @param string|null                 $content_category
     * @param string[]|null               $content_tags
     * @param DateTimeInterface|null      $created_time
     * @param string[]|null               $custom_labels
     * @param string                      $description
     * @param string|null                 $embed_html
     * @param bool|null                   $embeddable
     * @param EventDTO|null               $event
     * @param VideoFormatDTO[]|null       $format
     * @param UserDTO|PageDTO|null        $from
     * @param string|null                 $icon
     * @param bool|null                   $is_crosspost_video
     * @param bool|null                   $is_crossposting_eligible
     * @param bool|null                   $is_episode
     * @param bool|null                   $is_instagram_eligible
     * @param bool|null                   $is_reference_only
     * @param float|null                  $length
     * @param string|null                 $live_status
     * @param MusicVideoCopyrightDTO|null $music_video_copyright
     * @param string|null                 $permalink_url
     * @param PlaceDTO|null               $place
     * @param int|null                    $post_views
     * @param string|null                 $premiere_living_room_status
     * @param PrivacyDTO|null             $privacy
     * @param bool|null                   $published
     * @param DateTimeInterface|null      $scheduled_publish_time
     * @param string|null                 $source
     * @param VideoStatusDTO|null         $status
     * @param string|null                 $title
     * @param string|null                 $universal_video_id
     * @param DateTimeInterface           $updated_time
     * @param int|null                    $views
     */
    public function __construct(
        public readonly ?string $id,
        public readonly ?array $ad_breaks,
        public readonly ?DateTimeInterface $backdated_time,
        public readonly ?string $backdated_time_granularity,
        public readonly ?string $content_category,
        public readonly ?array $content_tags,
        public readonly ?DateTimeInterface $created_time,
        public readonly ?array $custom_labels,
        public readonly string $description,
        public readonly ?string $embed_html,
        public readonly ?bool $embeddable,
        public readonly ?EventDTO $event,
        public readonly ?array $format,
        public readonly null|UserDTO|PageDTO $from,
        public readonly ?string $icon,
        public readonly ?bool $is_crosspost_video,
        public readonly ?bool $is_crossposting_eligible,
        public readonly ?bool $is_episode,
        public readonly ?bool $is_instagram_eligible,
        public readonly ?bool $is_reference_only,
        public readonly ?float $length,
        public readonly ?string $live_status,
        public readonly ?MusicVideoCopyrightDTO $music_video_copyright,
        public readonly ?string $permalink_url,
        public readonly ?PlaceDTO $place,
        public readonly ?int $post_views,
        public readonly ?string $premiere_living_room_status,
        public readonly ?PrivacyDTO $privacy,
        public readonly ?bool $published,
        public readonly ?DateTimeInterface $scheduled_publish_time,
        public readonly ?string $source,
        public readonly ?VideoStatusDTO $status,
        public readonly ?string $title,
        public readonly ?string $universal_video_id,
        public readonly DateTimeInterface $updated_time,
        public readonly ?int $views
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                          => $this->id,
            'ad_breaks'                   => $this->ad_breaks,
            'backdated_time'              => $this->backdated_time,
            'backdated_time_granularity'  => $this->backdated_time_granularity,
            'content_category'            => $this->content_category,
            'content_tags'                => $this->content_tags,
            'created_time'                => $this->created_time,
            'custom_labels'               => $this->custom_labels,
            'description'                 => $this->description,
            'embed_html'                  => $this->embed_html,
            'embeddable'                  => $this->embeddable,
            'event'                       => $this->event,
            'format'                      => $this->format,
            'from'                        => $this->from,
            'icon'                        => $this->icon,
            'is_crosspost_video'          => $this->is_crosspost_video,
            'is_crossposting_eligible'    => $this->is_crossposting_eligible,
            'is_episode'                  => $this->is_episode,
            'is_instagram_eligible'       => $this->is_instagram_eligible,
            'is_reference_only'           => $this->is_reference_only,
            'length'                      => $this->length,
            'live_status'                 => $this->live_status,
            'music_video_copyright'       => $this->music_video_copyright,
            'permalink_url'               => $this->permalink_url,
            'place'                       => $this->place,
            'post_views'                  => $this->post_views,
            'premiere_living_room_status' => $this->premiere_living_room_status,
            'privacy'                     => $this->privacy,
            'published'                   => $this->published,
            'scheduled_publish_time'      => $this->scheduled_publish_time,
            'source'                      => $this->source,
            'status'                      => $this->status,
            'title'                       => $this->title,
            'universal_video_id'          => $this->universal_video_id,
            'updated_time'                => $this->updated_time,
            'views'                       => $this->views,
        ];
    }
}

