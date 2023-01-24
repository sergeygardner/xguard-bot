<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class TargetingDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'country'                         => null,
                    'cities'                          => null,
                    'regions'                         => null,
                    'zips'                            => null,
                    'genders'                         => null,
                    'college_networks'                => null,
                    'work_networks'                   => null,
                    'age_min'                         => null,
                    'age_max'                         => null,
                    'education_statuses'              => null,
                    'college_years'                   => null,
                    'college_majors'                  => null,
                    'political_views'                 => null,
                    'relationship_statuses'           => null,
                    'interests'                       => null,
                    'keywords'                        => null,
                    'interested_in'                   => null,
                    'user_clusters'                   => null,
                    'user_clusters2'                  => null,
                    'user_clusters3'                  => null,
                    'user_adclusters'                 => null,
                    'excluded_user_adclusters'        => null,
                    'custom_audiences'                => null,
                    'excluded_custom_audiences'       => null,
                    'locales'                         => null,
                    'radius'                          => null,
                    'connections'                     => null,
                    'excluded_connections'            => null,
                    'friends_of_connections'          => null,
                    'countries'                       => null,
                    'excluded_user_clusters'          => null,
                    'adgroup_id'                      => null,
                    'user_event'                      => null,
                    'qrt_versions'                    => null,
                    'page_types'                      => null,
                    'user_os'                         => null,
                    'user_device'                     => null,
                    'action_spec'                     => null,
                    'action_spec_friend'              => null,
                    'action_spec_excluded'            => null,
                    'geo_locations'                   => null,
                    'excluded_geo_locations'          => null,
                    'targeted_entities'               => null,
                    'conjunctive_user_adclusters'     => null,
                    'wireless_carrier'                => null,
                    'site_category'                   => null,
                    'work_positions'                  => null,
                    'work_employers'                  => null,
                    'education_majors'                => null,
                    'education_schools'               => null,
                    'family_statuses'                 => null,
                    'life_events'                     => null,
                    'behaviors'                       => null,
                    'travel_status'                   => null,
                    'industries'                      => null,
                    'politics'                        => null,
                    'markets'                         => null,
                    'income'                          => null,
                    'net_worth'                       => null,
                    'home_type'                       => null,
                    'home_ownership'                  => null,
                    'home_value'                      => null,
                    'ethnic_affinity'                 => null,
                    'generation'                      => null,
                    'household_composition'           => null,
                    'moms'                            => null,
                    'office_type'                     => null,
                    'interest_clusters_expansion'     => null,
                    'dynamic_audience_ids'            => null,
                    'product_audience_specs'          => null,
                    'excluded_product_audience_specs' => null,
                    'exclusions'                      => null,
                    'flexible_spec'                   => null,
                    'engagement_specs'                => null,
                    'excluded_engagement_specs'       => null,
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

        self::assertNull($DTOFactoryService->createDTOFromTargeting(null));

        $targetingDTO = $DTOFactoryService->createDTOFromTargeting($data);

        self::assertIsObject($targetingDTO);
        self::assertEquals($data['country'], $targetingDTO->country);
        self::assertEquals($data['cities'], $targetingDTO->cities);
        self::assertEquals($data['regions'], $targetingDTO->regions);
        self::assertEquals($data['zips'], $targetingDTO->zips);
        self::assertEquals($data['genders'], $targetingDTO->genders);
        self::assertEquals($data['college_networks'], $targetingDTO->college_networks);
        self::assertEquals($data['work_networks'], $targetingDTO->work_networks);
        self::assertEquals($data['age_min'], $targetingDTO->age_min);
        self::assertEquals($data['age_max'], $targetingDTO->age_max);
        self::assertEquals($data['education_statuses'], $targetingDTO->education_statuses);
        self::assertEquals($data['college_years'], $targetingDTO->college_years);
        self::assertEquals($data['college_majors'], $targetingDTO->college_majors);
        self::assertEquals($data['political_views'], $targetingDTO->political_views);
        self::assertEquals($data['relationship_statuses'], $targetingDTO->relationship_statuses);
        self::assertEquals($data['interests'], $targetingDTO->interests);
        self::assertEquals($data['keywords'], $targetingDTO->keywords);
        self::assertEquals($data['interested_in'], $targetingDTO->interested_in);
        self::assertEquals($data['user_clusters'], $targetingDTO->user_clusters);
        self::assertEquals($data['user_clusters2'], $targetingDTO->user_clusters2);
        self::assertEquals($data['user_clusters3'], $targetingDTO->user_clusters3);
        self::assertEquals($data['user_adclusters'], $targetingDTO->user_adclusters);
        self::assertEquals($data['excluded_user_adclusters'], $targetingDTO->excluded_user_adclusters);
        self::assertEquals($data['custom_audiences'], $targetingDTO->custom_audiences);
        self::assertEquals($data['excluded_custom_audiences'], $targetingDTO->excluded_custom_audiences);
        self::assertEquals($data['locales'], $targetingDTO->locales);
        self::assertEquals($data['radius'], $targetingDTO->radius);
        self::assertEquals($data['connections'], $targetingDTO->connections);
        self::assertEquals($data['excluded_connections'], $targetingDTO->excluded_connections);
        self::assertEquals($data['friends_of_connections'], $targetingDTO->friends_of_connections);
        self::assertEquals($data['countries'], $targetingDTO->countries);
        self::assertEquals($data['excluded_user_clusters'], $targetingDTO->excluded_user_clusters);
        self::assertEquals($data['adgroup_id'], $targetingDTO->adgroup_id);
        self::assertEquals($data['user_event'], $targetingDTO->user_event);
        self::assertEquals($data['qrt_versions'], $targetingDTO->qrt_versions);
        self::assertEquals($data['page_types'], $targetingDTO->page_types);
        self::assertEquals($data['user_os'], $targetingDTO->user_os);
        self::assertEquals($data['user_device'], $targetingDTO->user_device);
        self::assertEquals($data['action_spec'], $targetingDTO->action_spec);
        self::assertEquals($data['action_spec_friend'], $targetingDTO->action_spec_friend);
        self::assertEquals($data['action_spec_excluded'], $targetingDTO->action_spec_excluded);
        self::assertEquals($data['geo_locations'], $targetingDTO->geo_locations);
        self::assertEquals($data['excluded_geo_locations'], $targetingDTO->excluded_geo_locations);
        self::assertEquals($data['targeted_entities'], $targetingDTO->targeted_entities);
        self::assertEquals($data['conjunctive_user_adclusters'], $targetingDTO->conjunctive_user_adclusters);
        self::assertEquals($data['wireless_carrier'], $targetingDTO->wireless_carrier);
        self::assertEquals($data['site_category'], $targetingDTO->site_category);
        self::assertEquals($data['work_positions'], $targetingDTO->work_positions);
        self::assertEquals($data['work_employers'], $targetingDTO->work_employers);
        self::assertEquals($data['education_majors'], $targetingDTO->education_majors);
        self::assertEquals($data['education_schools'], $targetingDTO->education_schools);
        self::assertEquals($data['family_statuses'], $targetingDTO->family_statuses);
        self::assertEquals($data['life_events'], $targetingDTO->life_events);
        self::assertEquals($data['behaviors'], $targetingDTO->behaviors);
        self::assertEquals($data['travel_status'], $targetingDTO->travel_status);
        self::assertEquals($data['industries'], $targetingDTO->industries);
        self::assertEquals($data['politics'], $targetingDTO->politics);
        self::assertEquals($data['markets'], $targetingDTO->markets);
        self::assertEquals($data['income'], $targetingDTO->income);
        self::assertEquals($data['net_worth'], $targetingDTO->net_worth);
        self::assertEquals($data['home_type'], $targetingDTO->home_type);
        self::assertEquals($data['home_ownership'], $targetingDTO->home_ownership);
        self::assertEquals($data['home_value'], $targetingDTO->home_value);
        self::assertEquals($data['ethnic_affinity'], $targetingDTO->ethnic_affinity);
        self::assertEquals($data['generation'], $targetingDTO->generation);
        self::assertEquals($data['household_composition'], $targetingDTO->household_composition);
        self::assertEquals($data['moms'], $targetingDTO->moms);
        self::assertEquals($data['office_type'], $targetingDTO->office_type);
        self::assertEquals($data['interest_clusters_expansion'], $targetingDTO->interest_clusters_expansion);
        self::assertEquals($data['dynamic_audience_ids'], $targetingDTO->dynamic_audience_ids);
        self::assertEquals($data['product_audience_specs'], $targetingDTO->product_audience_specs);
        self::assertEquals($data['excluded_product_audience_specs'], $targetingDTO->excluded_product_audience_specs);
        self::assertEquals($data['exclusions'], $targetingDTO->exclusions);
        self::assertEquals($data['flexible_spec'], $targetingDTO->flexible_spec);
        self::assertEquals($data['engagement_specs'], $targetingDTO->engagement_specs);
        self::assertEquals($data['excluded_engagement_specs'], $targetingDTO->excluded_engagement_specs);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($targetingDTO, JSON_THROW_ON_ERROR)
        );
    }
}
