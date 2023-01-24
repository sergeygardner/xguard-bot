<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class ExperienceDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'          => 'id',
                    'description' => 'description',
                    'from'        => 'from',
                    'name'        => 'name',
                    'with'        => [
                        [
                            'id'                                   => 'id',
                            'about'                                => null,
                            'age_range'                            => ['max' => 30, 'min' => 20],
                            'birthday'                             => 'birthday',
                            'currency'                             => null,
                            'education'                            => null,
                            'email'                                => 'email@fb.com',
                            'favorite_athletes'                    => null,
                            'favorite_teams'                       => null,
                            'first_name'                           => 'first_name',
                            'gender'                               => 'gender',
                            'hometown'                             => null,
                            'id_for_avatars'                       => null,
                            'inspirational_people'                 => null,
                            'install_type'                         => null,
                            'installed'                            => null,
                            'is_guest_user'                        => null,
                            'languages'                            => null,
                            'last_name'                            => 'last_name',
                            'link'                                 => 'https://fb.link/',
                            'local_news_megaphone_dismiss_status'  => null,
                            'local_news_subscription_status'       => null,
                            'locale'                               => null,
                            'location'                             => null,
                            'meeting_for'                          => null,
                            'middle_name'                          => 'middle_name',
                            'name'                                 => 'name',
                            'name_format'                          => null,
                            'payment_pricepoints'                  => null,
                            'political'                            => null,
                            'profile_pic'                          => null,
                            'quotes'                               => null,
                            'relationship_status'                  => null,
                            'shared_login_upgrade_required_by'     => null,
                            'short_name'                           => null,
                            'significant_other'                    => null,
                            'sports'                               => null,
                            'supports_donate_button_in_live_video' => null,
                            'third_party_id'                       => null,
                            'timezone'                             => null,
                            'token_for_business'                   => null,
                            'updated_time'                         => null,
                            'verified'                             => null,
                            'video_upload_limits'                  => null,
                            'website'                              => null,
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     *
     * @param array $data
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromExperiences(null));
        self::assertNull($DTOFactoryService->createDTOFromExperience(null));

        $experienceDTO  = $DTOFactoryService->createDTOFromExperience($data);
        $experiencesDTO = $DTOFactoryService->createDTOFromExperiences([$data]);

        foreach ([$experienceDTO, ...$experiencesDTO] as $experienceDTOItem) {
            self::assertIsObject($experienceDTOItem);
            self::assertEquals($data['id'], $experienceDTOItem->id);
            self::assertEquals($data['description'], $experienceDTOItem->description);
            self::assertEquals($data['from'], $experienceDTOItem->from);
            self::assertEquals($data['name'], $experienceDTOItem->name);
            self::assertEquals(
                json_encode($data['with'], JSON_THROW_ON_ERROR),
                json_encode($experienceDTOItem->with, JSON_THROW_ON_ERROR)
            );
            self::assertEquals(
                json_encode($data, JSON_THROW_ON_ERROR),
                json_encode($experienceDTOItem, JSON_THROW_ON_ERROR)
            );
        }
    }
}
