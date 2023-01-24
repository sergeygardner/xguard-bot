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
use XGuard\Bot\Facebook\Domain\Enum\InstagramEligibilityEnum;

/**
 * The class represents an individual post in a profile's feed. The profile could be a user, page, app, or group.
 * @see https://developers.facebook.com/docs/graph-api/reference/post/
 */
final class PostDTO implements JsonSerializable
{

    /**
     * @param string|null                                 $id                             The post ID.
     * @param string[]|null                               $actions                        Action links
     * @param ApplicationDTO|UserDTO|BusinessUserDTO|null $admin_creator                  The admin creator of a Page Post. Only available if there exists more than one admin for the page.
     * @param string[]|null                               $allowed_advertising_objectives The only objectives under which this post can be advertised
     * @param ApplicationDTO|null                         $application                    Information about the app this post was published by.
     * @param DateTimeInterface|null                      $backdated_time                 The backdated time for backdate post. For regular post, this field will be set to null.
     * @param string[]|null                               $call_to_action                 The call to action type used in any Page posts for mobile app engagement ads.
     * @param bool|null                                   $can_reply_privately            Whether the page viewer can send a private reply to this post
     * @param string|null                                 $caption                        The caption of a link in the post (appears beneath the name).
     * @param string[]|null                               $child_attachments              Sub-shares of a multi-link share post
     * @param string|null                                 $comments_mirroring_domain      If comments are being mirrored to an external site, this function returns the domain of that external site.
     * @param CoordinateDTO|null                          $coordinates                    An array of information about the attachment to the post
     * @param DateTimeInterface                           $created_time                   [Default] The time the post was published, expressed as UNIX timestamp
     * @param string|null                                 $description                    A description of a link in the post (appears beneath the caption).
     * @param EventDTO|null                               $event                          If this Post has a place, the event associated with the place
     * @param int|null                                    $expanded_height                An array of information about the attachment to the post
     * @param int|null                                    $expanded_width                 An array of information about the attachment to the post
     * @param FeedTargetingDTO|null                       $feed_targeting                 Object that controls news feed targeting for this post. Anyone in these groups will be more likely to see this post, others will be less likely, but may still see it anyway. Any of the targeting fields shown here can be used, none are required (applies to Pages only).
     * @param UserDTO|PageDTO|null                        $from                           The ID of the user, page, group, or event that published the post
     * @param string|null                                 $full_picture                   If the photo's largest dimension exceeds 720 pixels, it is resized, with the largest dimension set to 720.
     * @param int|null                                    $height                         An array of information about the attachment to the post
     * @param string|null                                 $icon                           A link to an icon representing the type of this post.
     * @param InstagramEligibilityEnum|null               $instagram_eligibility          Whether the post can be promoted on Instagram. It returns the enum "eligible" if it can be promoted. Otherwise it returns an enum for why it cannot be promoted
     * @param bool|null                                   $is_app_share                   Whether the post references an app
     * @param bool|null                                   $is_eligible_for_promotion      Whether the post is eligible for promotion.
     * @param bool|null                                   $is_expired                     Whether the post has expiration time that has passed
     * @param bool|null                                   $is_hidden                      Whether a post has been set to hidden
     * @param bool|null                                   $is_inline_created              Returns True if the post was created inline when creating ads.
     * @param bool|null                                   $is_instagram_eligible          Whether this post can be promoted in Instagram
     * @param bool|null                                   $is_popular                     Whether the post is currently popular. Based on whether the total actions as a percentage of reach exceeds a certain threshold
     * @param bool|null                                   $is_published                   Indicates whether a scheduled post was published (applies to scheduled Page Post only, for users post and instanlty published posts this value is always true)
     * @param bool|null                                   $is_spherical                   Whether the post is a spherical video post
     * @param string|null                                 $link                           A description of a link in the post (appears beneath the caption).
     * @param string                                      $message                        [Default] The message written in the post
     * @param string[]|null                               $message_tags                   Profiles mentioned or tagged in a message. This is an object with a unique key for each mention or tag in the message.
     * @param bool|null                                   $multi_share_end_card           Whether display the end card for a multi-link share post
     * @param bool|null                                   $multi_share_optimized          Whether automatically select the order of the links in multi-link share post when used in an ad
     * @param string|null                                 $name                           The name of the link.
     * @param string|null                                 $object_id                      The ID of any uploaded photo or video attached to the post.
     * @param string|null                                 $parent_id                      The ID of a parent post for this post, if it exists. For example, if this story is a 'Your Page was mentioned in a post' story, the parent_id will be the original post where the mention happened
     * @param string|null                                 $permalink_url                  The permanent static URL to the post on www.facebook.com. Example: https://www.facebook.com/FacebookforDevelopers/posts/10153449196353553
     * @param PlaceDTO|null                               $place                          ID of the place associated with the post
     * @param PrivacyDTO|null                             $privacy                        The privacy settings for a post
     * @param string|null                                 $promotable_id                  ID of post to use for promotion for stories that cannot be promoted directly
     * @param string[]|null                               $properties                     A list of properties for any attached video, for example, the length of the video.
     * @param float|null                                  $scheduled_publish_time         UNIX timestamp of the scheduled publish time for the post
     * @param ShareDTO|null                               $shares                         Number of times the post has been shared
     * @param string|null                                 $source                         A URL to any Flash movie or video file attached to the post.
     * @param string|null                                 $status_type                    Description of the type of status update.
     * @param string                                      $story                          [Default] Text of stories not intentionally generated by users, such as those generated when two users become friends. You must have the "Include recent activity stories" migration enabled in your app to retrieve this field
     * @param string[]|null                               $story_tags                     The list of tags in the post description
     * @param bool|null                                   $subscribed                     Whether user is subscribed to the post
     * @param ProfileDTO|null                             $target                         The profile this was posted on if different from the author
     * @param TargetingDTO|null                           $targeting                      Object that limited the audience for this content. Anyone not in these demographics will not be able to view this content. This will not override any Page-level demographic restrictions that may be in place.
     * @param string|null                                 $timeline_visibility            Timeline visibility information of the post
     * @param string|null                                 $type                           A string indicating the object type of this post.
     * @param DateTimeInterface|null                      $updated_time                   The time the post was last updated, which occurs when a user comments on the post.
     * @param UserDTO|PageDTO|null                        $via                            ID of the user or Page the post was shared from
     * @param string[]|null                               $video_buying_eligibility       Whether the post can be promoted with different video buying options. It returns an empty list when video is eligible. Otherwise it returns a list of reasons why thepost cannot be promoted.
     * @param int|null                                    $width                          An array of information about the attachment to the post
     */
    public function __construct(
        public readonly ?string $id,
        public readonly ?array $actions,
        public readonly null|ApplicationDTO|UserDTO|BusinessUserDTO $admin_creator,
        public readonly ?array $allowed_advertising_objectives,
        public readonly ?ApplicationDTO $application,
        public readonly ?DateTimeInterface $backdated_time,
        public readonly ?array $call_to_action,
        public readonly ?bool $can_reply_privately,
        public readonly ?string $caption,
        public readonly ?array $child_attachments,
        public readonly ?string $comments_mirroring_domain,
        public readonly ?CoordinateDTO $coordinates,
        public readonly DateTimeInterface $created_time,
        public readonly ?string $description,
        public readonly ?EventDTO $event,
        public readonly ?int $expanded_height,
        public readonly ?int $expanded_width,
        public readonly ?FeedTargetingDTO $feed_targeting,
        public readonly null|UserDTO|PageDTO $from,
        public readonly ?string $full_picture,
        public readonly ?int $height,
        public readonly ?string $icon,
        public readonly ?InstagramEligibilityEnum $instagram_eligibility,
        public readonly ?bool $is_app_share,
        public readonly ?bool $is_eligible_for_promotion,
        public readonly ?bool $is_expired,
        public readonly ?bool $is_hidden,
        public readonly ?bool $is_inline_created,
        public readonly ?bool $is_instagram_eligible,
        public readonly ?bool $is_popular,
        public readonly ?bool $is_published,
        public readonly ?bool $is_spherical,
        public readonly ?string $link,
        public readonly string $message,
        public readonly ?array $message_tags,
        public readonly ?bool $multi_share_end_card,
        public readonly ?bool $multi_share_optimized,
        public readonly ?string $name,
        public readonly ?string $object_id,
        public readonly ?string $parent_id,
        public readonly ?string $permalink_url,
        public readonly ?PlaceDTO $place,
        public readonly ?PrivacyDTO $privacy,
        public readonly ?string $promotable_id,
        public readonly ?array $properties,
        public readonly ?float $scheduled_publish_time,
        public readonly ?ShareDTO $shares,
        public readonly ?string $source,
        public readonly ?string $status_type,
        public readonly string $story,
        public readonly ?array $story_tags,
        public readonly ?bool $subscribed,
        public readonly ?ProfileDTO $target,
        public readonly ?TargetingDTO $targeting,
        public readonly ?string $timeline_visibility,
        public readonly ?string $type,
        public readonly ?DateTimeInterface $updated_time,
        public readonly null|UserDTO|PageDTO $via,
        public readonly ?array $video_buying_eligibility,
        public readonly ?int $width
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                             => $this->id,
            'actions'                        => $this->actions,
            'admin_creator'                  => $this->admin_creator,
            'allowed_advertising_objectives' => $this->allowed_advertising_objectives,
            'application'                    => $this->application,
            'backdated_time'                 => $this->backdated_time,
            'call_to_action'                 => $this->call_to_action,
            'can_reply_privately'            => $this->can_reply_privately,
            'caption'                        => $this->caption,
            'child_attachments'              => $this->child_attachments,
            'comments_mirroring_domain'      => $this->comments_mirroring_domain,
            'coordinates'                    => $this->coordinates,
            'created_time'                   => $this->created_time,
            'description'                    => $this->description,
            'event'                          => $this->event,
            'expanded_height'                => $this->expanded_height,
            'expanded_width'                 => $this->expanded_width,
            'feed_targeting'                 => $this->feed_targeting,
            'from'                           => $this->from,
            'full_picture'                   => $this->full_picture,
            'height'                         => $this->height,
            'icon'                           => $this->icon,
            'instagram_eligibility'          => $this->instagram_eligibility,
            'is_app_share'                   => $this->is_app_share,
            'is_eligible_for_promotion'      => $this->is_eligible_for_promotion,
            'is_expired'                     => $this->is_expired,
            'is_hidden'                      => $this->is_hidden,
            'is_inline_created'              => $this->is_inline_created,
            'is_instagram_eligible'          => $this->is_instagram_eligible,
            'is_popular'                     => $this->is_popular,
            'is_published'                   => $this->is_published,
            'is_spherical'                   => $this->is_spherical,
            'link'                           => $this->link,
            'message'                        => $this->message,
            'message_tags'                   => $this->message_tags,
            'multi_share_end_card'           => $this->multi_share_end_card,
            'multi_share_optimized'          => $this->multi_share_optimized,
            'name'                           => $this->name,
            'object_id'                      => $this->object_id,
            'parent_id'                      => $this->parent_id,
            'permalink_url'                  => $this->permalink_url,
            'place'                          => $this->place,
            'privacy'                        => $this->privacy,
            'promotable_id'                  => $this->promotable_id,
            'properties'                     => $this->properties,
            'scheduled_publish_time'         => $this->scheduled_publish_time,
            'shares'                         => $this->shares,
            'source'                         => $this->source,
            'status_type'                    => $this->status_type,
            'story'                          => $this->story,
            'story_tags'                     => $this->story_tags,
            'subscribed'                     => $this->subscribed,
            'target'                         => $this->target,
            'targeting'                      => $this->targeting,
            'timeline_visibility'            => $this->timeline_visibility,
            'type'                           => $this->type,
            'updated_time'                   => $this->updated_time,
            'via'                            => $this->via,
            'video_buying_eligibility'       => $this->video_buying_eligibility,
            'width'                          => $this->width,
        ];
    }
}
