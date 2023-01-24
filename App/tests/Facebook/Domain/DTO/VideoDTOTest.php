<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use DateInterval;
use DateTime;
use Exception;
use JsonException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class VideoDTOTest extends TestCase
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
                    'id'                          => null,
                    'ad_breaks'                   => null,
                    'backdated_time'              => (new DateTime())->add(
                        new DateInterval('P'.random_int(51, 99).'M')
                    )->getTimestamp(),
                    'backdated_time_granularity'  => null,
                    'content_category'            => null,
                    'content_tags'                => null,
                    'created_time'                => (new DateTime())->add(
                        new DateInterval('P'.random_int(0, 50).'M')
                    )->getTimestamp(),
                    'custom_labels'               => null,
                    'description'                 => 'description',
                    'embed_html'                  => null,
                    'embeddable'                  => null,
                    'event'                       => null,
                    'format'                      => null,
                    'from'                        => null,
                    'icon'                        => null,
                    'is_crosspost_video'          => null,
                    'is_crossposting_eligible'    => null,
                    'is_episode'                  => null,
                    'is_instagram_eligible'       => null,
                    'is_reference_only'           => null,
                    'length'                      => null,
                    'live_status'                 => null,
                    'music_video_copyright'       => null,
                    'permalink_url'               => null,
                    'place'                       => null,
                    'post_views'                  => null,
                    'premiere_living_room_status' => null,
                    'privacy'                     => null,
                    'published'                   => null,
                    'scheduled_publish_time'      => (new DateTime())->add(
                        new DateInterval('P'.random_int(200, 250).'M')
                    )->getTimestamp(),
                    'source'                      => null,
                    'status'                      => null,
                    'title'                       => null,
                    'universal_video_id'          => null,
                    'updated_time'                => (new DateTime())->add(
                        new DateInterval('P'.random_int(100, 150).'M')
                    )->getTimestamp(),
                    'views'                       => null,
                ],
                '',
            ],
            [
                [
                    'id'                          => null,
                    'ad_breaks'                   => null,
                    'backdated_time'              => null,
                    'backdated_time_granularity'  => null,
                    'content_category'            => null,
                    'content_tags'                => null,
                    'created_time'                => null,
                    'custom_labels'               => null,
                    'description'                 => 'description',
                    'embed_html'                  => null,
                    'embeddable'                  => null,
                    'event'                       => null,
                    'format'                      => null,
                    'from'                        => null,
                    'icon'                        => null,
                    'is_crosspost_video'          => null,
                    'is_crossposting_eligible'    => null,
                    'is_episode'                  => null,
                    'is_instagram_eligible'       => null,
                    'is_reference_only'           => null,
                    'length'                      => null,
                    'live_status'                 => null,
                    'music_video_copyright'       => null,
                    'permalink_url'               => null,
                    'place'                       => null,
                    'post_views'                  => null,
                    'premiere_living_room_status' => null,
                    'privacy'                     => null,
                    'published'                   => null,
                    'scheduled_publish_time'      => null,
                    'source'                      => null,
                    'status'                      => null,
                    'title'                       => null,
                    'universal_video_id'          => null,
                    'updated_time'                => (new DateTime())->add(
                        new DateInterval('P'.random_int(100, 150).'M')
                    )->getTimestamp(),
                    'views'                       => null,
                ],
                '',
            ],
            [
                [
                    'id'                          => null,
                    'ad_breaks'                   => null,
                    'backdated_time'              => 'test',
                    'backdated_time_granularity'  => null,
                    'content_category'            => null,
                    'content_tags'                => null,
                    'created_time'                => null,
                    'custom_labels'               => null,
                    'description'                 => 'description',
                    'embed_html'                  => null,
                    'embeddable'                  => null,
                    'event'                       => null,
                    'format'                      => null,
                    'from'                        => null,
                    'icon'                        => null,
                    'is_crosspost_video'          => null,
                    'is_crossposting_eligible'    => null,
                    'is_episode'                  => null,
                    'is_instagram_eligible'       => null,
                    'is_reference_only'           => null,
                    'length'                      => null,
                    'live_status'                 => null,
                    'music_video_copyright'       => null,
                    'permalink_url'               => null,
                    'place'                       => null,
                    'post_views'                  => null,
                    'premiere_living_room_status' => null,
                    'privacy'                     => null,
                    'published'                   => null,
                    'scheduled_publish_time'      => null,
                    'source'                      => null,
                    'status'                      => null,
                    'title'                       => null,
                    'universal_video_id'          => null,
                    'updated_time'                => (new DateTime())->add(
                        new DateInterval('P'.random_int(100, 150).'M')
                    )->getTimestamp(),
                    'views'                       => null,
                ],
                ExpectationFailedException::class,
            ],
            [
                [
                    'id'                          => null,
                    'ad_breaks'                   => null,
                    'backdated_time'              => null,
                    'backdated_time_granularity'  => null,
                    'content_category'            => null,
                    'content_tags'                => null,
                    'created_time'                => 'test',
                    'custom_labels'               => null,
                    'description'                 => 'description',
                    'embed_html'                  => null,
                    'embeddable'                  => null,
                    'event'                       => null,
                    'format'                      => null,
                    'from'                        => null,
                    'icon'                        => null,
                    'is_crosspost_video'          => null,
                    'is_crossposting_eligible'    => null,
                    'is_episode'                  => null,
                    'is_instagram_eligible'       => null,
                    'is_reference_only'           => null,
                    'length'                      => null,
                    'live_status'                 => null,
                    'music_video_copyright'       => null,
                    'permalink_url'               => null,
                    'place'                       => null,
                    'post_views'                  => null,
                    'premiere_living_room_status' => null,
                    'privacy'                     => null,
                    'published'                   => null,
                    'scheduled_publish_time'      => null,
                    'source'                      => null,
                    'status'                      => null,
                    'title'                       => null,
                    'universal_video_id'          => null,
                    'updated_time'                => (new DateTime())->add(
                        new DateInterval('P'.random_int(100, 150).'M')
                    )->getTimestamp(),
                    'views'                       => null,
                ],
                ExpectationFailedException::class,
            ],
            [
                [
                    'id'                          => null,
                    'ad_breaks'                   => null,
                    'backdated_time'              => null,
                    'backdated_time_granularity'  => null,
                    'content_category'            => null,
                    'content_tags'                => null,
                    'created_time'                => null,
                    'custom_labels'               => null,
                    'description'                 => 'description',
                    'embed_html'                  => null,
                    'embeddable'                  => null,
                    'event'                       => null,
                    'format'                      => null,
                    'from'                        => null,
                    'icon'                        => null,
                    'is_crosspost_video'          => null,
                    'is_crossposting_eligible'    => null,
                    'is_episode'                  => null,
                    'is_instagram_eligible'       => null,
                    'is_reference_only'           => null,
                    'length'                      => null,
                    'live_status'                 => null,
                    'music_video_copyright'       => null,
                    'permalink_url'               => null,
                    'place'                       => null,
                    'post_views'                  => null,
                    'premiere_living_room_status' => null,
                    'privacy'                     => null,
                    'published'                   => null,
                    'scheduled_publish_time'      => 'test',
                    'source'                      => null,
                    'status'                      => null,
                    'title'                       => null,
                    'universal_video_id'          => null,
                    'updated_time'                => (new DateTime())->add(
                        new DateInterval('P'.random_int(100, 150).'M')
                    )->getTimestamp(),
                    'views'                       => null,
                ],
                ExpectationFailedException::class,
            ],
            [
                [
                    'id'                          => null,
                    'ad_breaks'                   => null,
                    'backdated_time'              => null,
                    'backdated_time_granularity'  => null,
                    'content_category'            => null,
                    'content_tags'                => null,
                    'created_time'                => null,
                    'custom_labels'               => null,
                    'description'                 => 'description',
                    'embed_html'                  => null,
                    'embeddable'                  => null,
                    'event'                       => null,
                    'format'                      => null,
                    'from'                        => null,
                    'icon'                        => null,
                    'is_crosspost_video'          => null,
                    'is_crossposting_eligible'    => null,
                    'is_episode'                  => null,
                    'is_instagram_eligible'       => null,
                    'is_reference_only'           => null,
                    'length'                      => null,
                    'live_status'                 => null,
                    'music_video_copyright'       => null,
                    'permalink_url'               => null,
                    'place'                       => null,
                    'post_views'                  => null,
                    'premiere_living_room_status' => null,
                    'privacy'                     => null,
                    'published'                   => null,
                    'scheduled_publish_time'      => null,
                    'source'                      => null,
                    'status'                      => null,
                    'title'                       => null,
                    'universal_video_id'          => null,
                    'updated_time'                => 'test',
                    'views'                       => null,
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

        self::assertNull($DTOFactoryService->createDTOFromVideo(null));

        $videoDTO = $DTOFactoryService->createDTOFromVideo($data);

        self::assertEquals($data['id'], $videoDTO->id);
        self::assertEquals($data['ad_breaks'], $videoDTO->ad_breaks);
        self::assertEquals($data['backdated_time'], $videoDTO->backdated_time?->getTimestamp());
        self::assertEquals($data['backdated_time_granularity'], $videoDTO->backdated_time_granularity);
        self::assertEquals($data['content_category'], $videoDTO->content_category);
        self::assertEquals($data['content_tags'], $videoDTO->content_tags);
        self::assertEquals($data['created_time'], $videoDTO->created_time?->getTimestamp());
        self::assertEquals($data['custom_labels'], $videoDTO->custom_labels);
        self::assertEquals($data['description'], $videoDTO->description);
        self::assertEquals($data['embed_html'], $videoDTO->embed_html);
        self::assertEquals($data['embeddable'], $videoDTO->embeddable);
        self::assertEquals($data['event'], $videoDTO->event);
        self::assertEquals($data['format'], $videoDTO->format);
        self::assertEquals($data['from'], $videoDTO->from);
        self::assertEquals($data['icon'], $videoDTO->icon);
        self::assertEquals($data['is_crosspost_video'], $videoDTO->is_crosspost_video);
        self::assertEquals($data['is_crossposting_eligible'], $videoDTO->is_crossposting_eligible);
        self::assertEquals($data['is_episode'], $videoDTO->is_episode);
        self::assertEquals($data['is_instagram_eligible'], $videoDTO->is_instagram_eligible);
        self::assertEquals($data['is_reference_only'], $videoDTO->is_reference_only);
        self::assertEquals($data['length'], $videoDTO->length);
        self::assertEquals($data['live_status'], $videoDTO->live_status);
        self::assertEquals($data['music_video_copyright'], $videoDTO->music_video_copyright);
        self::assertEquals($data['permalink_url'], $videoDTO->permalink_url);
        self::assertEquals($data['place'], $videoDTO->place);
        self::assertEquals($data['post_views'], $videoDTO->post_views);
        self::assertEquals($data['premiere_living_room_status'], $videoDTO->premiere_living_room_status);
        self::assertEquals($data['privacy'], $videoDTO->privacy);
        self::assertEquals($data['published'], $videoDTO->published);
        self::assertEquals($data['scheduled_publish_time'], $videoDTO->scheduled_publish_time?->getTimestamp());
        self::assertEquals($data['source'], $videoDTO->source);
        self::assertEquals($data['status'], $videoDTO->status);
        self::assertEquals($data['title'], $videoDTO->title);
        self::assertEquals($data['universal_video_id'], $videoDTO->universal_video_id);
        self::assertEquals($data['updated_time'], $videoDTO->updated_time->getTimestamp());
        self::assertEquals($data['views'], $videoDTO->views);
        self::assertNotEmpty(json_encode($videoDTO, JSON_THROW_ON_ERROR));
    }
}
