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
 * This class represents an object that controls news feed targeting for this post.
 */
class FeedTargetingDTO implements JsonSerializable
{

    /**
     * @param mixed $country               [Default] TODO add a description and a type
     * @param mixed $cities                [Default] TODO add a description and a type
     * @param mixed $regions               [Default] TODO add a description and a type
     * @param mixed $genders               [Default] TODO add a description and a type
     * @param mixed $age_min               [Default] TODO add a description and a type
     * @param mixed $age_max               [Default] TODO add a description and a type
     * @param mixed $education_statuses    [Default] TODO add a description and a type
     * @param mixed $college_years         [Default] TODO add a description and a type
     * @param mixed $relationship_statuses [Default] TODO add a description and a type
     * @param mixed $interests             [Default] TODO add a description and a type
     * @param mixed $interested_in         [Default] TODO add a description and a type
     * @param mixed $user_adclusters       [Default] TODO add a description and a type
     * @param mixed $locales               [Default] TODO add a description and a type
     * @param mixed $countries             [Default] TODO add a description and a type
     * @param mixed $geo_locations         [Default] TODO add a description and a type
     * @param mixed $work_positions        [Default] TODO add a description and a type
     * @param mixed $work_employers        [Default] TODO add a description and a type
     * @param mixed $education_majors      [Default] TODO add a description and a type
     * @param mixed $education_schools     [Default] TODO add a description and a type
     * @param mixed $family_statuses       [Default] TODO add a description and a type
     * @param mixed $life_events           [Default] TODO add a description and a type
     * @param mixed $industries            [Default] TODO add a description and a type
     * @param mixed $politics              [Default] TODO add a description and a type
     * @param mixed $ethnic_affinity       [Default] TODO add a description and a type
     * @param mixed $generation            [Default] TODO add a description and a type
     * @param mixed $fan_of                [Default] TODO add a description and a type
     * @param mixed $relevant_until_ts     [Default] TODO add a description and a type
     */
    public function __construct(
        public readonly mixed $country,
        public readonly mixed $cities,
        public readonly mixed $regions,
        public readonly mixed $genders,
        public readonly mixed $age_min,
        public readonly mixed $age_max,
        public readonly mixed $education_statuses,
        public readonly mixed $college_years,
        public readonly mixed $relationship_statuses,
        public readonly mixed $interests,
        public readonly mixed $interested_in,
        public readonly mixed $user_adclusters,
        public readonly mixed $locales,
        public readonly mixed $countries,
        public readonly mixed $geo_locations,
        public readonly mixed $work_positions,
        public readonly mixed $work_employers,
        public readonly mixed $education_majors,
        public readonly mixed $education_schools,
        public readonly mixed $family_statuses,
        public readonly mixed $life_events,
        public readonly mixed $industries,
        public readonly mixed $politics,
        public readonly mixed $ethnic_affinity,
        public readonly mixed $generation,
        public readonly mixed $fan_of,
        public readonly mixed $relevant_until_ts
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'country'               => $this->country,
            'cities'                => $this->cities,
            'regions'               => $this->regions,
            'genders'               => $this->genders,
            'age_min'               => $this->age_min,
            'age_max'               => $this->age_max,
            'education_statuses'    => $this->education_statuses,
            'college_years'         => $this->college_years,
            'relationship_statuses' => $this->relationship_statuses,
            'interests'             => $this->interests,
            'interested_in'         => $this->interested_in,
            'user_adclusters'       => $this->user_adclusters,
            'locales'               => $this->locales,
            'countries'             => $this->countries,
            'geo_locations'         => $this->geo_locations,
            'work_positions'        => $this->work_positions,
            'work_employers'        => $this->work_employers,
            'education_majors'      => $this->education_majors,
            'education_schools'     => $this->education_schools,
            'family_statuses'       => $this->family_statuses,
            'life_events'           => $this->life_events,
            'industries'            => $this->industries,
            'politics'              => $this->politics,
            'ethnic_affinity'       => $this->ethnic_affinity,
            'generation'            => $this->generation,
            'fan_of'                => $this->fan_of,
            'relevant_until_ts'     => $this->relevant_until_ts,
        ];
    }
}
