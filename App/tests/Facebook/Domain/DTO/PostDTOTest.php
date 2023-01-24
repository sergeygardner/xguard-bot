<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use DateInterval;
use DateTime;
use Error;
use Exception;
use JsonException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Enum\InstagramEligibilityEnum;

/**
 *
 */
final class PostDTOTest extends TestCase
{

    /**
     * @return array[]
     * @throws Exception
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'                             => null,
                    'actions'                        => null,
                    'admin_creator'                  => null,
                    'allowed_advertising_objectives' => null,
                    'application'                    => null,
                    'backdated_time'                 => (new DateTime())->add(
                        new DateInterval('P'.random_int(50, 99).'M')
                    )->getTimestamp(),
                    'call_to_action'                 => null,
                    'can_reply_privately'            => null,
                    'caption'                        => null,
                    'child_attachments'              => null,
                    'comments_mirroring_domain'      => null,
                    'coordinates'                    => null,
                    'created_time'                   => (new DateTime())->add(
                        new DateInterval('P'.random_int(0, 50).'M')
                    )->getTimestamp(),
                    'description'                    => null,
                    'event'                          => null,
                    'expanded_height'                => null,
                    'expanded_width'                 => null,
                    'feed_targeting'                 => null,
                    'from'                           => null,
                    'full_picture'                   => null,
                    'height'                         => null,
                    'icon'                           => null,
                    'instagram_eligibility'          => 'eligible',//InstagramEligibilityEnum::eligible
                    'is_app_share'                   => null,
                    'is_eligible_for_promotion'      => null,
                    'is_expired'                     => null,
                    'is_hidden'                      => null,
                    'is_inline_created'              => null,
                    'is_instagram_eligible'          => null,
                    'is_popular'                     => null,
                    'is_published'                   => null,
                    'is_spherical'                   => null,
                    'link'                           => null,
                    'message'                        => 'message',
                    'message_tags'                   => null,
                    'multi_share_end_card'           => null,
                    'multi_share_optimized'          => null,
                    'name'                           => null,
                    'object_id'                      => null,
                    'parent_id'                      => null,
                    'permalink_url'                  => null,
                    'place'                          => null,
                    'privacy'                        => null,
                    'promotable_id'                  => null,
                    'properties'                     => null,
                    'scheduled_publish_time'         => null,
                    'shares'                         => null,
                    'source'                         => null,
                    'status_type'                    => null,
                    'story'                          => 'story',
                    'story_tags'                     => null,
                    'subscribed'                     => null,
                    'target'                         => null,
                    'targeting'                      => null,
                    'timeline_visibility'            => null,
                    'type'                           => null,
                    'updated_time'                   => (new DateTime())->add(
                        new DateInterval('P'.random_int(100, 150).'M')
                    )->getTimestamp(),
                    'via'                            => null,
                    'video_buying_eligibility'       => null,
                    'width'                          => null,
                ],
                '',
            ],
            [
                [
                    'id'                             => null,
                    'actions'                        => null,
                    'admin_creator'                  => null,
                    'allowed_advertising_objectives' => null,
                    'application'                    => null,
                    'backdated_time'                 => null,
                    'call_to_action'                 => null,
                    'can_reply_privately'            => null,
                    'caption'                        => null,
                    'child_attachments'              => null,
                    'comments_mirroring_domain'      => null,
                    'coordinates'                    => null,
                    'created_time'                   => (new DateTime())->add(
                        new DateInterval('P'.random_int(0, 50).'M')
                    )->getTimestamp(),
                    'description'                    => null,
                    'event'                          => null,
                    'expanded_height'                => null,
                    'expanded_width'                 => null,
                    'feed_targeting'                 => null,
                    'from'                           => null,
                    'full_picture'                   => null,
                    'height'                         => null,
                    'icon'                           => null,
                    'instagram_eligibility'          => 'not_eligible',//InstagramEligibilityEnum::not_eligible
                    'is_app_share'                   => null,
                    'is_eligible_for_promotion'      => null,
                    'is_expired'                     => null,
                    'is_hidden'                      => null,
                    'is_inline_created'              => null,
                    'is_instagram_eligible'          => null,
                    'is_popular'                     => null,
                    'is_published'                   => null,
                    'is_spherical'                   => null,
                    'link'                           => null,
                    'message'                        => 'message',
                    'message_tags'                   => null,
                    'multi_share_end_card'           => null,
                    'multi_share_optimized'          => null,
                    'name'                           => null,
                    'object_id'                      => null,
                    'parent_id'                      => null,
                    'permalink_url'                  => null,
                    'place'                          => null,
                    'privacy'                        => null,
                    'promotable_id'                  => null,
                    'properties'                     => null,
                    'scheduled_publish_time'         => null,
                    'shares'                         => null,
                    'source'                         => null,
                    'status_type'                    => null,
                    'story'                          => 'story',
                    'story_tags'                     => null,
                    'subscribed'                     => null,
                    'target'                         => null,
                    'targeting'                      => null,
                    'timeline_visibility'            => null,
                    'type'                           => null,
                    'updated_time'                   => null,
                    'via'                            => null,
                    'video_buying_eligibility'       => null,
                    'width'                          => null,
                ],
                '',
            ],
            [
                [
                    'id'                             => null,
                    'actions'                        => null,
                    'admin_creator'                  => null,
                    'allowed_advertising_objectives' => null,
                    'application'                    => null,
                    'backdated_time'                 => null,
                    'call_to_action'                 => null,
                    'can_reply_privately'            => null,
                    'caption'                        => null,
                    'child_attachments'              => null,
                    'comments_mirroring_domain'      => null,
                    'coordinates'                    => null,
                    'created_time'                   => (new DateTime())->add(
                        new DateInterval('P'.random_int(0, 50).'M')
                    )->getTimestamp(),
                    'description'                    => null,
                    'event'                          => null,
                    'expanded_height'                => null,
                    'expanded_width'                 => null,
                    'feed_targeting'                 => null,
                    'from'                           => null,
                    'full_picture'                   => null,
                    'height'                         => null,
                    'icon'                           => null,
                    'instagram_eligibility'          => null,
                    'is_app_share'                   => null,
                    'is_eligible_for_promotion'      => null,
                    'is_expired'                     => null,
                    'is_hidden'                      => null,
                    'is_inline_created'              => null,
                    'is_instagram_eligible'          => null,
                    'is_popular'                     => null,
                    'is_published'                   => null,
                    'is_spherical'                   => null,
                    'link'                           => null,
                    'message'                        => 'message',
                    'message_tags'                   => null,
                    'multi_share_end_card'           => null,
                    'multi_share_optimized'          => null,
                    'name'                           => null,
                    'object_id'                      => null,
                    'parent_id'                      => null,
                    'permalink_url'                  => null,
                    'place'                          => null,
                    'privacy'                        => null,
                    'promotable_id'                  => null,
                    'properties'                     => null,
                    'scheduled_publish_time'         => null,
                    'shares'                         => null,
                    'source'                         => null,
                    'status_type'                    => null,
                    'story'                          => 'story',
                    'story_tags'                     => null,
                    'subscribed'                     => null,
                    'target'                         => null,
                    'targeting'                      => null,
                    'timeline_visibility'            => null,
                    'type'                           => null,
                    'updated_time'                   => null,
                    'via'                            => null,
                    'video_buying_eligibility'       => null,
                    'width'                          => null,
                ],
                '',
            ],
            [
                [
                    'id'                             => null,
                    'actions'                        => null,
                    'admin_creator'                  => null,
                    'allowed_advertising_objectives' => null,
                    'application'                    => null,
                    'backdated_time'                 => null,
                    'call_to_action'                 => null,
                    'can_reply_privately'            => null,
                    'caption'                        => null,
                    'child_attachments'              => null,
                    'comments_mirroring_domain'      => null,
                    'coordinates'                    => null,
                    'created_time'                   => (new DateTime())->add(
                        new DateInterval('P'.random_int(0, 50).'M')
                    )->getTimestamp(),
                    'description'                    => null,
                    'event'                          => null,
                    'expanded_height'                => null,
                    'expanded_width'                 => null,
                    'feed_targeting'                 => null,
                    'from'                           => null,
                    'full_picture'                   => null,
                    'height'                         => null,
                    'icon'                           => null,
                    'instagram_eligibility'          => 'not_eligible1',//InstagramEligibilityEnum::not_eligible?
                    'is_app_share'                   => null,
                    'is_eligible_for_promotion'      => null,
                    'is_expired'                     => null,
                    'is_hidden'                      => null,
                    'is_inline_created'              => null,
                    'is_instagram_eligible'          => null,
                    'is_popular'                     => null,
                    'is_published'                   => null,
                    'is_spherical'                   => null,
                    'link'                           => null,
                    'message'                        => 'message',
                    'message_tags'                   => null,
                    'multi_share_end_card'           => null,
                    'multi_share_optimized'          => null,
                    'name'                           => null,
                    'object_id'                      => null,
                    'parent_id'                      => null,
                    'permalink_url'                  => null,
                    'place'                          => null,
                    'privacy'                        => null,
                    'promotable_id'                  => null,
                    'properties'                     => null,
                    'scheduled_publish_time'         => null,
                    'shares'                         => null,
                    'source'                         => null,
                    'status_type'                    => null,
                    'story'                          => 'story',
                    'story_tags'                     => null,
                    'subscribed'                     => null,
                    'target'                         => null,
                    'targeting'                      => null,
                    'timeline_visibility'            => null,
                    'type'                           => null,
                    'updated_time'                   => null,
                    'via'                            => null,
                    'video_buying_eligibility'       => null,
                    'width'                          => null,
                ],
                Error::class,
            ],
            [
                [
                    'id'                             => null,
                    'actions'                        => null,
                    'admin_creator'                  => null,
                    'allowed_advertising_objectives' => null,
                    'application'                    => null,
                    'backdated_time'                 => 'test',
                    'call_to_action'                 => null,
                    'can_reply_privately'            => null,
                    'caption'                        => null,
                    'child_attachments'              => null,
                    'comments_mirroring_domain'      => null,
                    'coordinates'                    => null,
                    'created_time'                   => (new DateTime())->add(
                        new DateInterval('P'.random_int(0, 50).'M')
                    )->getTimestamp(),
                    'description'                    => null,
                    'event'                          => null,
                    'expanded_height'                => null,
                    'expanded_width'                 => null,
                    'feed_targeting'                 => null,
                    'from'                           => null,
                    'full_picture'                   => null,
                    'height'                         => null,
                    'icon'                           => null,
                    'instagram_eligibility'          => null,
                    'is_app_share'                   => null,
                    'is_eligible_for_promotion'      => null,
                    'is_expired'                     => null,
                    'is_hidden'                      => null,
                    'is_inline_created'              => null,
                    'is_instagram_eligible'          => null,
                    'is_popular'                     => null,
                    'is_published'                   => null,
                    'is_spherical'                   => null,
                    'link'                           => null,
                    'message'                        => 'message',
                    'message_tags'                   => null,
                    'multi_share_end_card'           => null,
                    'multi_share_optimized'          => null,
                    'name'                           => null,
                    'object_id'                      => null,
                    'parent_id'                      => null,
                    'permalink_url'                  => null,
                    'place'                          => null,
                    'privacy'                        => null,
                    'promotable_id'                  => null,
                    'properties'                     => null,
                    'scheduled_publish_time'         => null,
                    'shares'                         => null,
                    'source'                         => null,
                    'status_type'                    => null,
                    'story'                          => 'story',
                    'story_tags'                     => null,
                    'subscribed'                     => null,
                    'target'                         => null,
                    'targeting'                      => null,
                    'timeline_visibility'            => null,
                    'type'                           => null,
                    'updated_time'                   => null,
                    'via'                            => null,
                    'video_buying_eligibility'       => null,
                    'width'                          => null,
                ],
                ExpectationFailedException::class,
            ],
            [
                [
                    'id'                             => null,
                    'actions'                        => null,
                    'admin_creator'                  => null,
                    'allowed_advertising_objectives' => null,
                    'application'                    => null,
                    'backdated_time'                 => null,
                    'call_to_action'                 => null,
                    'can_reply_privately'            => null,
                    'caption'                        => null,
                    'child_attachments'              => null,
                    'comments_mirroring_domain'      => null,
                    'coordinates'                    => null,
                    'created_time'                   => (new DateTime())->add(
                        new DateInterval('P'.random_int(0, 50).'M')
                    )->getTimestamp(),
                    'description'                    => null,
                    'event'                          => null,
                    'expanded_height'                => null,
                    'expanded_width'                 => null,
                    'feed_targeting'                 => null,
                    'from'                           => null,
                    'full_picture'                   => null,
                    'height'                         => null,
                    'icon'                           => null,
                    'instagram_eligibility'          => null,
                    'is_app_share'                   => null,
                    'is_eligible_for_promotion'      => null,
                    'is_expired'                     => null,
                    'is_hidden'                      => null,
                    'is_inline_created'              => null,
                    'is_instagram_eligible'          => null,
                    'is_popular'                     => null,
                    'is_published'                   => null,
                    'is_spherical'                   => null,
                    'link'                           => null,
                    'message'                        => 'message',
                    'message_tags'                   => null,
                    'multi_share_end_card'           => null,
                    'multi_share_optimized'          => null,
                    'name'                           => null,
                    'object_id'                      => null,
                    'parent_id'                      => null,
                    'permalink_url'                  => null,
                    'place'                          => null,
                    'privacy'                        => null,
                    'promotable_id'                  => null,
                    'properties'                     => null,
                    'scheduled_publish_time'         => null,
                    'shares'                         => null,
                    'source'                         => null,
                    'status_type'                    => null,
                    'story'                          => 'story',
                    'story_tags'                     => null,
                    'subscribed'                     => null,
                    'target'                         => null,
                    'targeting'                      => null,
                    'timeline_visibility'            => null,
                    'type'                           => null,
                    'updated_time'                   => 'test',
                    'via'                            => null,
                    'video_buying_eligibility'       => null,
                    'width'                          => null,
                ],
                ExpectationFailedException::class,
            ],
            [
                [
                    'id'                             => null,
                    'actions'                        => null,
                    'admin_creator'                  => null,
                    'allowed_advertising_objectives' => null,
                    'application'                    => null,
                    'backdated_time'                 => null,
                    'call_to_action'                 => null,
                    'can_reply_privately'            => null,
                    'caption'                        => null,
                    'child_attachments'              => null,
                    'comments_mirroring_domain'      => null,
                    'coordinates'                    => null,
                    'created_time'                   => 'test',
                    'description'                    => null,
                    'event'                          => null,
                    'expanded_height'                => null,
                    'expanded_width'                 => null,
                    'feed_targeting'                 => null,
                    'from'                           => null,
                    'full_picture'                   => null,
                    'height'                         => null,
                    'icon'                           => null,
                    'instagram_eligibility'          => null,
                    'is_app_share'                   => null,
                    'is_eligible_for_promotion'      => null,
                    'is_expired'                     => null,
                    'is_hidden'                      => null,
                    'is_inline_created'              => null,
                    'is_instagram_eligible'          => null,
                    'is_popular'                     => null,
                    'is_published'                   => null,
                    'is_spherical'                   => null,
                    'link'                           => null,
                    'message'                        => 'message',
                    'message_tags'                   => null,
                    'multi_share_end_card'           => null,
                    'multi_share_optimized'          => null,
                    'name'                           => null,
                    'object_id'                      => null,
                    'parent_id'                      => null,
                    'permalink_url'                  => null,
                    'place'                          => null,
                    'privacy'                        => null,
                    'promotable_id'                  => null,
                    'properties'                     => null,
                    'scheduled_publish_time'         => null,
                    'shares'                         => null,
                    'source'                         => null,
                    'status_type'                    => null,
                    'story'                          => 'story',
                    'story_tags'                     => null,
                    'subscribed'                     => null,
                    'target'                         => null,
                    'targeting'                      => null,
                    'timeline_visibility'            => null,
                    'type'                           => null,
                    'updated_time'                   => null,
                    'via'                            => null,
                    'video_buying_eligibility'       => null,
                    'width'                          => null,
                ],
                TypeError::class,
            ],
        ];
    }

    /**
     * @param array  $data
     * @param string $exception
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data, string $exception): void
    {
        if (!empty($exception)) {
            $this->expectException($exception);
        }

        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromPost(null));

        $postDTO = $DTOFactoryService->createDTOFromPost($data);

        self::assertIsObject($postDTO);
        self::assertEquals($data['id'], $postDTO->id);
        self::assertEquals($data['actions'], $postDTO->actions);
        self::assertEquals($data['admin_creator'], $postDTO->admin_creator);
        self::assertEquals($data['allowed_advertising_objectives'], $postDTO->allowed_advertising_objectives);
        self::assertEquals($data['application'], $postDTO->application);
        self::assertEquals($data['backdated_time'], $postDTO->backdated_time?->getTimestamp());
        self::assertEquals($data['call_to_action'], $postDTO->call_to_action);
        self::assertEquals($data['can_reply_privately'], $postDTO->can_reply_privately);
        self::assertEquals($data['caption'], $postDTO->caption);
        self::assertEquals($data['child_attachments'], $postDTO->child_attachments);
        self::assertEquals($data['comments_mirroring_domain'], $postDTO->comments_mirroring_domain);
        self::assertEquals($data['coordinates'], $postDTO->coordinates);
        self::assertEquals($data['created_time'], $postDTO->created_time->getTimestamp());
        self::assertEquals($data['description'], $postDTO->description);
        self::assertEquals($data['event'], $postDTO->event);
        self::assertEquals($data['expanded_height'], $postDTO->expanded_height);
        self::assertEquals($data['expanded_width'], $postDTO->expanded_width);
        self::assertEquals($data['feed_targeting'], $postDTO->feed_targeting);
        self::assertEquals($data['from'], $postDTO->from);
        self::assertEquals($data['full_picture'], $postDTO->full_picture);
        self::assertEquals($data['height'], $postDTO->height);
        self::assertEquals($data['icon'], $postDTO->icon);

        if (null !== $data['instagram_eligibility']) {
            self::assertEquals(
                constant((InstagramEligibilityEnum::class).'::'.$data['instagram_eligibility']),
                $postDTO->instagram_eligibility
            );
        } else {
            self::assertEquals($data['instagram_eligibility'], $postDTO->instagram_eligibility);
        }

        self::assertEquals($data['is_app_share'], $postDTO->is_app_share);
        self::assertEquals($data['is_eligible_for_promotion'], $postDTO->is_eligible_for_promotion);
        self::assertEquals($data['is_expired'], $postDTO->is_expired);
        self::assertEquals($data['is_hidden'], $postDTO->is_hidden);
        self::assertEquals($data['is_inline_created'], $postDTO->is_inline_created);
        self::assertEquals($data['is_instagram_eligible'], $postDTO->is_instagram_eligible);
        self::assertEquals($data['is_popular'], $postDTO->is_popular);
        self::assertEquals($data['is_published'], $postDTO->is_published);
        self::assertEquals($data['is_spherical'], $postDTO->is_spherical);
        self::assertEquals($data['link'], $postDTO->link);
        self::assertEquals($data['message'], $postDTO->message);
        self::assertEquals($data['message_tags'], $postDTO->message_tags);
        self::assertEquals($data['multi_share_end_card'], $postDTO->multi_share_end_card);
        self::assertEquals($data['multi_share_optimized'], $postDTO->multi_share_optimized);
        self::assertEquals($data['name'], $postDTO->name);
        self::assertEquals($data['object_id'], $postDTO->object_id);
        self::assertEquals($data['parent_id'], $postDTO->parent_id);
        self::assertEquals($data['permalink_url'], $postDTO->permalink_url);
        self::assertEquals($data['place'], $postDTO->place);
        self::assertEquals($data['privacy'], $postDTO->privacy);
        self::assertEquals($data['promotable_id'], $postDTO->promotable_id);
        self::assertEquals($data['properties'], $postDTO->properties);
        self::assertEquals($data['scheduled_publish_time'], $postDTO->scheduled_publish_time);
        self::assertEquals($data['shares'], $postDTO->shares);
        self::assertEquals($data['source'], $postDTO->source);
        self::assertEquals($data['status_type'], $postDTO->status_type);
        self::assertEquals($data['story'], $postDTO->story);
        self::assertEquals($data['story_tags'], $postDTO->story_tags);
        self::assertEquals($data['subscribed'], $postDTO->subscribed);
        self::assertEquals($data['target'], $postDTO->target);
        self::assertEquals($data['targeting'], $postDTO->targeting);
        self::assertEquals($data['timeline_visibility'], $postDTO->timeline_visibility);
        self::assertEquals($data['type'], $postDTO->type);
        self::assertEquals($data['updated_time'], $postDTO->updated_time?->getTimestamp());
        self::assertEquals($data['via'], $postDTO->via);
        self::assertEquals($data['video_buying_eligibility'], $postDTO->video_buying_eligibility);
        self::assertEquals($data['width'], $postDTO->width);
        self::assertNotEmpty(json_encode($postDTO, JSON_THROW_ON_ERROR));
    }
}
