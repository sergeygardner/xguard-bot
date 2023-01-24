<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class FeedTargetingDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'country'               => null,
                    'cities'                => null,
                    'regions'               => null,
                    'genders'               => null,
                    'age_min'               => null,
                    'age_max'               => null,
                    'education_statuses'    => null,
                    'college_years'         => null,
                    'relationship_statuses' => null,
                    'interests'             => null,
                    'interested_in'         => null,
                    'user_adclusters'       => null,
                    'locales'               => null,
                    'countries'             => null,
                    'geo_locations'         => null,
                    'work_positions'        => null,
                    'work_employers'        => null,
                    'education_majors'      => null,
                    'education_schools'     => null,
                    'family_statuses'       => null,
                    'life_events'           => null,
                    'industries'            => null,
                    'politics'              => null,
                    'ethnic_affinity'       => null,
                    'generation'            => null,
                    'fan_of'                => null,
                    'relevant_until_ts'     => null,
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

        self::assertNull($DTOFactoryService->createDTOFromFeedTargeting(null));

        $feedTargetingDTO = $DTOFactoryService->createDTOFromFeedTargeting($data);

        self::assertIsObject($feedTargetingDTO);
        self::assertEquals($data['country'], $feedTargetingDTO->country);
        self::assertEquals($data['cities'], $feedTargetingDTO->cities);
        self::assertEquals($data['regions'], $feedTargetingDTO->regions);
        self::assertEquals($data['genders'], $feedTargetingDTO->genders);
        self::assertEquals($data['age_min'], $feedTargetingDTO->age_min);
        self::assertEquals($data['age_max'], $feedTargetingDTO->age_max);
        self::assertEquals($data['education_statuses'], $feedTargetingDTO->education_statuses);
        self::assertEquals($data['college_years'], $feedTargetingDTO->college_years);
        self::assertEquals($data['relationship_statuses'], $feedTargetingDTO->relationship_statuses);
        self::assertEquals($data['interests'], $feedTargetingDTO->interests);
        self::assertEquals($data['interested_in'], $feedTargetingDTO->interested_in);
        self::assertEquals($data['user_adclusters'], $feedTargetingDTO->user_adclusters);
        self::assertEquals($data['locales'], $feedTargetingDTO->locales);
        self::assertEquals($data['countries'], $feedTargetingDTO->countries);
        self::assertEquals($data['geo_locations'], $feedTargetingDTO->geo_locations);
        self::assertEquals($data['work_positions'], $feedTargetingDTO->work_positions);
        self::assertEquals($data['work_employers'], $feedTargetingDTO->work_employers);
        self::assertEquals($data['education_majors'], $feedTargetingDTO->education_majors);
        self::assertEquals($data['education_schools'], $feedTargetingDTO->education_schools);
        self::assertEquals($data['family_statuses'], $feedTargetingDTO->family_statuses);
        self::assertEquals($data['life_events'], $feedTargetingDTO->life_events);
        self::assertEquals($data['industries'], $feedTargetingDTO->industries);
        self::assertEquals($data['politics'], $feedTargetingDTO->politics);
        self::assertEquals($data['ethnic_affinity'], $feedTargetingDTO->ethnic_affinity);
        self::assertEquals($data['generation'], $feedTargetingDTO->generation);
        self::assertEquals($data['fan_of'], $feedTargetingDTO->fan_of);
        self::assertEquals($data['relevant_until_ts'], $feedTargetingDTO->relevant_until_ts);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($feedTargetingDTO, JSON_THROW_ON_ERROR)
        );
    }
}
