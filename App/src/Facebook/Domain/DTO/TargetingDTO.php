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

use JsonSerializable;

/**
 * This class represents an object that limited the audience for this content.
 */
class TargetingDTO implements JsonSerializable
{

    /**
     * @param mixed $country                         [Default] TODO add a description and a type
     * @param mixed $cities                          [Default] TODO add a description and a type
     * @param mixed $regions                         [Default] TODO add a description and a type
     * @param mixed $zips                            [Default] TODO add a description and a type
     * @param mixed $genders                         [Default] TODO add a description and a type
     * @param mixed $college_networks                [Default] TODO add a description and a type
     * @param mixed $work_networks                   [Default] TODO add a description and a type
     * @param mixed $age_min                         [Default] TODO add a description and a type
     * @param mixed $age_max                         [Default] TODO add a description and a type
     * @param mixed $education_statuses              [Default] TODO add a description and a type
     * @param mixed $college_years                   [Default] TODO add a description and a type
     * @param mixed $college_majors                  [Default] TODO add a description and a type
     * @param mixed $political_views                 [Default] TODO add a description and a type
     * @param mixed $relationship_statuses           [Default] TODO add a description and a type
     * @param mixed $interests                       [Default] TODO add a description and a type
     * @param mixed $keywords                        [Default] TODO add a description and a type
     * @param mixed $interested_in                   [Default] TODO add a description and a type
     * @param mixed $user_clusters                   [Default] TODO add a description and a type
     * @param mixed $user_clusters2                  [Default] TODO add a description and a type
     * @param mixed $user_clusters3                  [Default] TODO add a description and a type
     * @param mixed $user_adclusters                 [Default] TODO add a description and a type
     * @param mixed $excluded_user_adclusters        [Default] TODO add a description and a type
     * @param mixed $custom_audiences                [Default] TODO add a description and a type
     * @param mixed $excluded_custom_audiences       [Default] TODO add a description and a type
     * @param mixed $locales                         [Default] TODO add a description and a type
     * @param mixed $radius                          [Default] TODO add a description and a type
     * @param mixed $connections                     [Default] TODO add a description and a type
     * @param mixed $excluded_connections            [Default] TODO add a description and a type
     * @param mixed $friends_of_connections          [Default] TODO add a description and a type
     * @param mixed $countries                       [Default] TODO add a description and a type
     * @param mixed $excluded_user_clusters          [Default] TODO add a description and a type
     * @param mixed $adgroup_id                      [Default] TODO add a description and a type
     * @param mixed $user_event                      [Default] TODO add a description and a type
     * @param mixed $qrt_versions                    [Default] TODO add a description and a type
     * @param mixed $page_types                      [Default] TODO add a description and a type
     * @param mixed $user_os                         [Default] TODO add a description and a type
     * @param mixed $user_device                     [Default] TODO add a description and a type
     * @param mixed $action_spec                     [Default] TODO add a description and a type
     * @param mixed $action_spec_friend              [Default] TODO add a description and a type
     * @param mixed $action_spec_excluded            [Default] TODO add a description and a type
     * @param mixed $geo_locations                   [Default] TODO add a description and a type
     * @param mixed $excluded_geo_locations          [Default] TODO add a description and a type
     * @param mixed $targeted_entities               [Default] TODO add a description and a type
     * @param mixed $conjunctive_user_adclusters     [Default] TODO add a description and a type
     * @param mixed $wireless_carrier                [Default] TODO add a description and a type
     * @param mixed $site_category                   [Default] TODO add a description and a type
     * @param mixed $work_positions                  [Default] TODO add a description and a type
     * @param mixed $work_employers                  [Default] TODO add a description and a type
     * @param mixed $education_majors                [Default] TODO add a description and a type
     * @param mixed $education_schools               [Default] TODO add a description and a type
     * @param mixed $family_statuses                 [Default] TODO add a description and a type
     * @param mixed $life_events                     [Default] TODO add a description and a type
     * @param mixed $behaviors                       [Default] TODO add a description and a type
     * @param mixed $travel_status                   [Default] TODO add a description and a type
     * @param mixed $industries                      [Default] TODO add a description and a type
     * @param mixed $politics                        [Default] TODO add a description and a type
     * @param mixed $markets                         [Default] TODO add a description and a type
     * @param mixed $income                          [Default] TODO add a description and a type
     * @param mixed $net_worth                       [Default] TODO add a description and a type
     * @param mixed $home_type                       [Default] TODO add a description and a type
     * @param mixed $home_ownership                  [Default] TODO add a description and a type
     * @param mixed $home_value                      [Default] TODO add a description and a type
     * @param mixed $ethnic_affinity                 [Default] TODO add a description and a type
     * @param mixed $generation                      [Default] TODO add a description and a type
     * @param mixed $household_composition           [Default] TODO add a description and a type
     * @param mixed $moms                            [Default] TODO add a description and a type
     * @param mixed $office_type                     [Default] TODO add a description and a type
     * @param mixed $interest_clusters_expansion     [Default] TODO add a description and a type
     * @param mixed $dynamic_audience_ids            [Default] TODO add a description and a type
     * @param mixed $product_audience_specs          [Default] TODO add a description and a type
     * @param mixed $excluded_product_audience_specs [Default] TODO add a description and a type
     * @param mixed $exclusions                      [Default] TODO add a description and a type
     * @param mixed $flexible_spec                   [Default] TODO add a description and a type
     * @param mixed $engagement_specs                [Default] TODO add a description and a type
     * @param mixed $excluded_engagement_specs       [Default] TODO add a description and a type
     */
    public function __construct(
        public readonly mixed $country,
        public readonly mixed $cities,
        public readonly mixed $regions,
        public readonly mixed $zips,
        public readonly mixed $genders,
        public readonly mixed $college_networks,
        public readonly mixed $work_networks,
        public readonly mixed $age_min,
        public readonly mixed $age_max,
        public readonly mixed $education_statuses,
        public readonly mixed $college_years,
        public readonly mixed $college_majors,
        public readonly mixed $political_views,
        public readonly mixed $relationship_statuses,
        public readonly mixed $interests,
        public readonly mixed $keywords,
        public readonly mixed $interested_in,
        public readonly mixed $user_clusters,
        public readonly mixed $user_clusters2,
        public readonly mixed $user_clusters3,
        public readonly mixed $user_adclusters,
        public readonly mixed $excluded_user_adclusters,
        public readonly mixed $custom_audiences,
        public readonly mixed $excluded_custom_audiences,
        public readonly mixed $locales,
        public readonly mixed $radius,
        public readonly mixed $connections,
        public readonly mixed $excluded_connections,
        public readonly mixed $friends_of_connections,
        public readonly mixed $countries,
        public readonly mixed $excluded_user_clusters,
        public readonly mixed $adgroup_id,
        public readonly mixed $user_event,
        public readonly mixed $qrt_versions,
        public readonly mixed $page_types,
        public readonly mixed $user_os,
        public readonly mixed $user_device,
        public readonly mixed $action_spec,
        public readonly mixed $action_spec_friend,
        public readonly mixed $action_spec_excluded,
        public readonly mixed $geo_locations,
        public readonly mixed $excluded_geo_locations,
        public readonly mixed $targeted_entities,
        public readonly mixed $conjunctive_user_adclusters,
        public readonly mixed $wireless_carrier,
        public readonly mixed $site_category,
        public readonly mixed $work_positions,
        public readonly mixed $work_employers,
        public readonly mixed $education_majors,
        public readonly mixed $education_schools,
        public readonly mixed $family_statuses,
        public readonly mixed $life_events,
        public readonly mixed $behaviors,
        public readonly mixed $travel_status,
        public readonly mixed $industries,
        public readonly mixed $politics,
        public readonly mixed $markets,
        public readonly mixed $income,
        public readonly mixed $net_worth,
        public readonly mixed $home_type,
        public readonly mixed $home_ownership,
        public readonly mixed $home_value,
        public readonly mixed $ethnic_affinity,
        public readonly mixed $generation,
        public readonly mixed $household_composition,
        public readonly mixed $moms,
        public readonly mixed $office_type,
        public readonly mixed $interest_clusters_expansion,
        public readonly mixed $dynamic_audience_ids,
        public readonly mixed $product_audience_specs,
        public readonly mixed $excluded_product_audience_specs,
        public readonly mixed $exclusions,
        public readonly mixed $flexible_spec,
        public readonly mixed $engagement_specs,
        public readonly mixed $excluded_engagement_specs
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'country'                         => $this->country,
            'cities'                          => $this->cities,
            'regions'                         => $this->regions,
            'zips'                            => $this->zips,
            'genders'                         => $this->genders,
            'college_networks'                => $this->college_networks,
            'work_networks'                   => $this->work_networks,
            'age_min'                         => $this->age_min,
            'age_max'                         => $this->age_max,
            'education_statuses'              => $this->education_statuses,
            'college_years'                   => $this->college_years,
            'college_majors'                  => $this->college_majors,
            'political_views'                 => $this->political_views,
            'relationship_statuses'           => $this->relationship_statuses,
            'interests'                       => $this->interests,
            'keywords'                        => $this->keywords,
            'interested_in'                   => $this->interested_in,
            'user_clusters'                   => $this->user_clusters,
            'user_clusters2'                  => $this->user_clusters2,
            'user_clusters3'                  => $this->user_clusters3,
            'user_adclusters'                 => $this->user_adclusters,
            'excluded_user_adclusters'        => $this->excluded_user_adclusters,
            'custom_audiences'                => $this->custom_audiences,
            'excluded_custom_audiences'       => $this->excluded_custom_audiences,
            'locales'                         => $this->locales,
            'radius'                          => $this->radius,
            'connections'                     => $this->connections,
            'excluded_connections'            => $this->excluded_connections,
            'friends_of_connections'          => $this->friends_of_connections,
            'countries'                       => $this->countries,
            'excluded_user_clusters'          => $this->excluded_user_clusters,
            'adgroup_id'                      => $this->adgroup_id,
            'user_event'                      => $this->user_event,
            'qrt_versions'                    => $this->qrt_versions,
            'page_types'                      => $this->page_types,
            'user_os'                         => $this->user_os,
            'user_device'                     => $this->user_device,
            'action_spec'                     => $this->action_spec,
            'action_spec_friend'              => $this->action_spec_friend,
            'action_spec_excluded'            => $this->action_spec_excluded,
            'geo_locations'                   => $this->geo_locations,
            'excluded_geo_locations'          => $this->excluded_geo_locations,
            'targeted_entities'               => $this->targeted_entities,
            'conjunctive_user_adclusters'     => $this->conjunctive_user_adclusters,
            'wireless_carrier'                => $this->wireless_carrier,
            'site_category'                   => $this->site_category,
            'work_positions'                  => $this->work_positions,
            'work_employers'                  => $this->work_employers,
            'education_majors'                => $this->education_majors,
            'education_schools'               => $this->education_schools,
            'family_statuses'                 => $this->family_statuses,
            'life_events'                     => $this->life_events,
            'behaviors'                       => $this->behaviors,
            'travel_status'                   => $this->travel_status,
            'industries'                      => $this->industries,
            'politics'                        => $this->politics,
            'markets'                         => $this->markets,
            'income'                          => $this->income,
            'net_worth'                       => $this->net_worth,
            'home_type'                       => $this->home_type,
            'home_ownership'                  => $this->home_ownership,
            'home_value'                      => $this->home_value,
            'ethnic_affinity'                 => $this->ethnic_affinity,
            'generation'                      => $this->generation,
            'household_composition'           => $this->household_composition,
            'moms'                            => $this->moms,
            'office_type'                     => $this->office_type,
            'interest_clusters_expansion'     => $this->interest_clusters_expansion,
            'dynamic_audience_ids'            => $this->dynamic_audience_ids,
            'product_audience_specs'          => $this->product_audience_specs,
            'excluded_product_audience_specs' => $this->excluded_product_audience_specs,
            'exclusions'                      => $this->exclusions,
            'flexible_spec'                   => $this->flexible_spec,
            'engagement_specs'                => $this->engagement_specs,
            'excluded_engagement_specs'       => $this->excluded_engagement_specs,
        ];
    }
}
