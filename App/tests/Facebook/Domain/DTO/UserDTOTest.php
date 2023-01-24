<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use DateInterval;
use DateTime;
use Exception;
use JsonException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class UserDTOTest extends TestCase
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
                '',
            ],
            [
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
                    'updated_time'                         => (new DateTime())->add(
                        new DateInterval('P'.random_int(0, 50).'M')
                    )->getTimestamp(),
                    'verified'                             => null,
                    'video_upload_limits'                  => null,
                    'website'                              => null,
                ],
                '',
            ],
            [
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
                    'updated_time'                         => 'test',
                    'verified'                             => null,
                    'video_upload_limits'                  => null,
                    'website'                              => null,
                ],
                ExpectationFailedException::class,
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

        self::assertNull($DTOFactoryService->createDTOFromUsers(null));
        self::assertNull($DTOFactoryService->createDTOFromUser(null));

        $userDTO  = $DTOFactoryService->createDTOFromUser($data);
        $usersDTO = $DTOFactoryService->createDTOFromUsers([$data]);

        foreach ([$userDTO, ...$usersDTO] as $userDTOItem) {
            self::assertIsObject($userDTOItem);
            self::assertEquals($data['id'], $userDTOItem->id);
            self::assertEquals($data['about'], $userDTOItem->about);
            self::assertEquals(
                json_encode($data['age_range'], JSON_THROW_ON_ERROR),
                json_encode($userDTOItem->age_range, JSON_THROW_ON_ERROR)
            );
            self::assertEquals($data['birthday'], $userDTOItem->birthday);
            self::assertEquals($data['currency'], $userDTOItem->currency);
            self::assertEquals($data['education'], $userDTOItem->education);
            self::assertEquals($data['email'], $userDTOItem->email);
            self::assertEquals($data['favorite_athletes'], $userDTOItem->favorite_athletes);
            self::assertEquals($data['favorite_teams'], $userDTOItem->favorite_teams);
            self::assertEquals($data['first_name'], $userDTOItem->first_name);
            self::assertEquals($data['gender'], $userDTOItem->gender);
            self::assertEquals($data['hometown'], $userDTOItem->hometown);
            self::assertEquals($data['id_for_avatars'], $userDTOItem->id_for_avatars);
            self::assertEquals($data['inspirational_people'], $userDTOItem->inspirational_people);
            self::assertEquals($data['install_type'], $userDTOItem->install_type);
            self::assertEquals($data['installed'], $userDTOItem->installed);
            self::assertEquals($data['is_guest_user'], $userDTOItem->is_guest_user);
            self::assertEquals($data['languages'], $userDTOItem->languages);
            self::assertEquals($data['last_name'], $userDTOItem->last_name);
            self::assertEquals($data['link'], $userDTOItem->link);
            self::assertEquals(
                $data['local_news_megaphone_dismiss_status'],
                $userDTOItem->local_news_megaphone_dismiss_status
            );
            self::assertEquals($data['local_news_subscription_status'], $userDTOItem->local_news_subscription_status);
            self::assertEquals($data['locale'], $userDTOItem->locale);
            self::assertEquals($data['location'], $userDTOItem->location);
            self::assertEquals($data['meeting_for'], $userDTOItem->meeting_for);
            self::assertEquals($data['middle_name'], $userDTOItem->middle_name);
            self::assertEquals($data['name'], $userDTOItem->name);
            self::assertEquals($data['name_format'], $userDTOItem->name_format);
            self::assertEquals($data['payment_pricepoints'], $userDTOItem->payment_pricepoints);
            self::assertEquals($data['political'], $userDTOItem->political);
            self::assertEquals($data['profile_pic'], $userDTOItem->profile_pic);
            self::assertEquals($data['quotes'], $userDTOItem->quotes);
            self::assertEquals($data['relationship_status'], $userDTOItem->relationship_status);
            self::assertEquals(
                $data['shared_login_upgrade_required_by'],
                $userDTOItem->shared_login_upgrade_required_by
            );
            self::assertEquals($data['short_name'], $userDTOItem->short_name);
            self::assertEquals($data['significant_other'], $userDTOItem->significant_other);
            self::assertEquals($data['sports'], $userDTOItem->sports);
            self::assertEquals(
                $data['supports_donate_button_in_live_video'],
                $userDTOItem->supports_donate_button_in_live_video
            );
            self::assertEquals($data['third_party_id'], $userDTOItem->third_party_id);
            self::assertEquals($data['timezone'], $userDTOItem->timezone);
            self::assertEquals($data['token_for_business'], $userDTOItem->token_for_business);
            self::assertEquals($data['updated_time'], $userDTOItem->updated_time?->getTimestamp());
            self::assertEquals($data['verified'], $userDTOItem->verified);
            self::assertEquals($data['video_upload_limits'], $userDTOItem->video_upload_limits);
            self::assertEquals($data['website'], $userDTOItem->website);
            self::assertNotEmpty(json_encode($userDTOItem, JSON_THROW_ON_ERROR));
        }
    }
}
