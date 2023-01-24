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
use XGuard\Bot\Facebook\Domain\Enum\BidStrategyEnum;
use XGuard\Bot\Facebook\Domain\Enum\BillingEventEnum;
use XGuard\Bot\Facebook\Domain\Enum\CampaignAttributionEnum;
use XGuard\Bot\Facebook\Domain\Enum\ConfiguredStatusEnum;
use XGuard\Bot\Facebook\Domain\Enum\DayPartEnum;
use XGuard\Bot\Facebook\Domain\Enum\EffectiveStatusEnum;
use XGuard\Bot\Facebook\Domain\Enum\OptimizationGoalEnum;

/**
 * This class represents an ad set is a group of ads that share the same daily or lifetime budget, schedule, bid type, bid info, and targeting data. Ad sets enable you to group ads according to your criteria, and you can retrieve the ad-related statistics that apply to a set. See Optimized CPM and Promoted Object.
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-campaign
 */
class AdSetDTO implements JsonSerializable
{

    /**
     * @param string                                    $id                               [Default] ID for the Ad Set
     * @param string|null                               $account_id                       ID for the Ad Account associated with this Ad Set
     * @param AdLabelDTO[]|null                         $adlabels                         Ad Labels associated with this ad set
     * @param DayPartEnum[]|null                        $adset_schedule                   Ad set schedule, representing a delivery schedule for a single day
     * @param string|null                               $asset_feed_id                    The ID of the asset feed that constains a content to create ads
     * @param string[]|null                             $attribution_spec                 Conversion attribution spec used for attributing conversions for optimization. Supported window lengths differ by optimization goal and campaign objective. See Objective, Optimization Goal and attribution_spec. TODO transfer to AttributionSpecEnum
     * @param AdBidAdjustmentsDTO|null                  $bid_adjustments                  Map of bid adjustment types to values
     * @param int|null                                  $bid_amount                       Bid cap or target cost for this ad set. The bid cap used in a lowest cost bid strategy is defined as the maximum bid you want to pay for a result based on your optimization_goal. The target cost used in a target cost bid strategy lets Facebook bid on your behalf to meet your target on average and keep costs stable as you raise budget. The bid amount's unit is cents for currencies like USD, EUR, and the basic unit for currencies like JPY, KRW. The bid amount for ads with IMPRESSION or REACH as billing_event is per 1,000 occurrences of that event, and the bid amount for ads with other billing_events is for each occurrence.
     * @param AdCampaignBidConstraintDTO|null           $bid_constraints                  Choose bid constraints for "ad set" to suit your specific business goals. It usually works together with bid_strategy field.
     * @param int[]|null                                $bid_info                         Map of bid objective to bid value.
     * @param BidStrategyEnum|null                      $bid_strategy                     Bid strategy for this ad set when you use AUCTION as your buying type: LOWEST_COST_WITHOUT_CAP: Designed to get the most results for your budget based on your ad set optimization_goal without limiting your bid amount. This is the best strategy if you care most about cost efficiency. However with this strategy it may be harder to get stable average costs as you spend. This strategy is also known as automatic bidding. Learn more in Ads Help Center, About bid strategies: Lowest cost. LOWEST_COST_WITH_BID_CAP: Designed to get the most results for your budget based on your ad set optimization_goal while limiting actual bid to your specified amount. With a bid cap you have more control over your cost per actual optimization event. However if you set a limit which is too low you may get less ads delivery. Get your bid cap with the field bid_amount. This strategy is also known as manual maximum-cost bidding. Learn more in Ads Help Center, About bid strategies: Lowest cost. Notes: If you enable campaign budget optimization, you should get bid_strategy at the parent campaign level. TARGET_COST bidding strategy has been deprecated with Marketing API v9.
     * @param BillingEventEnum|null                     $billing_event                    The billing event for this ad set: APP_INSTALLS: Pay when people install your app. CLICKS: Pay when people click anywhere in the ad. IMPRESSIONS: Pay when the ads are shown to people. LINK_CLICKS: Pay when people click on the link of the ad. OFFER_CLAIMS: Pay when people claim the offer. PAGE_LIKES: Pay when people like your page. POST_ENGAGEMENT: Pay when people engage with your post. VIDEO_VIEWS: Pay when people watch your video ads for at least 10 seconds. THRUPLAY: Pay for ads that are played to completion, or played for at least 15 seconds.
     * @param string|null                               $budget_remaining                 Remaining budget of this Ad Set
     * @param CampaignDTO|null                          $campaign                         The campaign that contains this ad set
     * @param CampaignAttributionEnum|null              $campaign_attribution             The field for app ads campaign, used to indicate a campaign's attribution type, e.g. SKAN or AEM
     * @param string|null                               $campaign_id                      The ID of the campaign that contains this ad set
     * @param ConfiguredStatusEnum|null                 $configured_status                The status set at the ad set level. It can be different from the effective status due to its parent campaign. Prefer using 'status' instead of this.
     * @param ContextualBundlingSpecDTO|null            $contextual_bundling_spec         Specs of contextual bundling Ad Set setup, including signal of opt-in/out the feature
     * @param DateTimeInterface|null                    $created_time                     Time when this Ad Set was created
     * @param string[]|null                             $creative_sequence                Order of the adgroup sequence to be shown to users
     * @param string|null                               $daily_budget                     The daily budget of the set defined in your account currency.
     * @param string|null                               $daily_min_spend_target           Daily minimum spend target of the ad set defined in your account currency. To use this field, daily budget must be specified in the Campaign. This target is not a guarantee but our best effort.
     * @param string|null                               $daily_spend_cap                  Daily spend cap of the ad set defined in your account currency. To use this field, daily budget must be specified in the Campaign
     * @param string|null                               $destination_type                 Destination of ads in this Ad Set. Options include: WEBSITE, APP, MESSENGER, INSTAGRAM_DIRECT. The ON_AD, ON_POST, ON_VIDEO, ON_PAGE, and ON_EVENT destination types are currently in limited beta testing. Trying to duplicate campaigns with existing destination types using these new destination types may throw an error. See the Outcome-Driven Ads Experiences section below for more information.
     * @param string|null                               $dsa_beneficiary                  The beneficiary of all ads in this ad set.
     * @param string|null                               $dsa_payor                        The payor of all ads in this ad set.
     * @param EffectiveStatusEnum|null                  $effective_status                 The effective status of the adset. The status could be effective either because of its own status, or the status of its parent campaign. WITH_ISSUES is available for version 3.2 or higher. IN_PROCESS is available for version 4.0 or higher.
     * @param DateTimeInterface|null                    $end_time                         End time, in UTC UNIX timestamp
     * @param AdCampaignFrequencyControlSpecsDTO[]|null $frequency_control_specs          An array of frequency control specs for this ad set. As there is only one event type currently supported, this array has no more than one element. Writes to this field are only available in ad sets where REACH is the objective.
     * @param string|null                               $instagram_actor_id               Represents your Instagram account id, used for ads, including dynamic creative ads on Instagram.
     * @param bool|null                                 $is_dynamic_creative              Whether this ad set is a dynamic creative ad set. dynamic creative ad can be created only under "ad set" with this field set to be true.
     * @param AdCampaignIssuesInfoDTO[]|null            $issues_info                      Issues for this ad set that prevented it from delivering
     * @param AdCampaignLearningStageInfoDTO|null       $learning_stage_info              Info about whether the ranking or delivery system is still learning for this ad set. While the ad set is still in learning, we might unstablized delivery performances.
     * @param string|null                               $lifetime_budget                  The lifetime budget of the set defined in your account currency.
     * @param int|null                                  $lifetime_imps                    Lifetime impressions. Available only for campaigns with buying_type=FIXED_CPM
     * @param string|null                               $lifetime_min_spend_target        Lifetime minimum spend target of the ad set defined in your account currency. To use this field, lifetime budget must be specified in the Campaign. This target is not a guarantee but our best effort.
     * @param string|null                               $lifetime_spend_cap               Lifetime spend cap of the ad set defined in your account currency. To use this field, lifetime budget must be specified in the Campaign.
     * @param string|null                               $multi_optimization_goal_weight   Multi optimization goal weight
     * @param string|null                               $name                             Name of the ad set
     * @param OptimizationGoalEnum|null                 $optimization_goal                The optimization goal this ad set is using. NONE: Only available in read mode for campaigns created pre-v2.4. APP_INSTALLS: Optimize for people more likely to install your app. AD_RECALL_LIFT: Optimize for people more likely to remember seeing your ads. CLICKS: Deprecated. Only available in read mode. ENGAGED_USERS: Optimize for people more likely to take a particular action in your app. EVENT_RESPONSES: Optimize for people more likely to attend your event. IMPRESSIONS: Show the ads as many times as possible. LEAD_GENERATION: Optimize for people more likely to fill out a lead generation form. QUALITY_LEAD: Optimize for people who are likely to have a deeper conversation with advertisers after lead submission. LINK_CLICKS: Optimize for people more likely to click in the link of the ad. OFFSITE_CONVERSIONS: Optimize for people more likely to make a conversion on the site. PAGE_LIKES: Optimize for people more likely to like your page. POST_ENGAGEMENT: Optimize for people more likely to engage with your post. QUALITY_CALL: Optimize for people who are likely to call the advertiser. REACH: Optimize to reach the most unique users for each day or interval specified in frequency_control_specs. LANDING_PAGE_VIEWS: Optimize for people who are most likely to click on and load your chosen landing page. VISIT_INSTAGRAM_PROFILE: Optimize for visits to the advertiser's Instagram profile. VALUE: Optimize for maximum total purchase value within the specified attribution window. THRUPLAY: Optimize delivery of your ads to people who are more likely to play your ad to completion, or play it for at least 15 seconds. DERIVED_EVENTS: Optimize for retention, which reaches people who are most likely to return to the app and open it again during a given time frame after installing. You can choose either two days, meaning the app is likely to be reopened between 24 and 48 hours after installation; or seven days, meaning the app is likely to be reopened between 144 and 168 hours after installation. APP_INSTALLS_AND_OFFSITE_CONVERSIONS: Optimizes for people more likely to install your app and make a conversion on your site. CONVERSATIONS: Directs ads to people more likely to have a conversation with the business.
     * @param string|null                               $optimization_sub_event           Optimization sub event for a specific optimization goal. For example: Sound-On event for Video-View-2s optimization goal.
     * @param string[]|null                             $pacing_type                      Defines the pacing type, standard or using ad scheduling
     * @param AdPromotedObjectDTO|null                  $promoted_object                  The object this ad set is promoting across all its ads.
     * @param AdRecommendationDTO[]|null                $recommendations                  If there are recommendations for this ad set, this field includes them. Otherwise, will not be included in the response. This field is not included in redownload mode.
     * @param bool|null                                 $recurring_budget_semantics       If this field is true, your daily spend may be more than your daily budget while your weekly spend will not exceed 7 times your daily budget. More details explained in the Ad Set Budget document. If this is false, your amount spent daily will not exceed the daily budget. This field is not applicable for lifetime budgets.
     * @param string|null                               $review_feedback                  Reviews for dynamic creative ad
     * @param string|null                               $rf_prediction_id                 Reach and frequency prediction ID
     * @param AdSetDTO|null                             $source_adset                     The source ad set that this ad set was copied from
     * @param string|null                               $source_adset_id                  The source ad set id that this ad set was copied from
     * @param DateTimeInterface|null                    $start_time                       Start time, in UTC UNIX timestamp
     * @param ConfiguredStatusEnum|null                 $status                           The status set at the ad set level. It can be different from the effective status due to its parent campaign. The field returns the same value as configured_status, and is the suggested one to use.
     * @param TargetingDTO|null                         $targeting                        Targeting
     * @param int[]|null                                $targeting_optimization_types     Targeting options that are relaxed and used as a signal for optimization
     * @param int[][]|null                              $time_based_ad_rotation_id_blocks Specify ad creative that displays at custom date ranges in a campaign as an array. A list of Adgroup IDs. The list of ads to display for each time range in a given schedule. For example display first ad in Adgroup for first date range, second ad for second date range, and so on. You can display more than one ad per date range by providing more than one ad ID per array. For example set time_based_ad_rotation_id_blocks to [[1], [2, 3], [1, 4]]. On the first date range show ad 1, on the second date range show ad 2 and ad 3 and on the last date range show ad 1 and ad 4. Use with time_based_ad_rotation_intervals to specify date ranges.
     * @param int[]|null                                $time_based_ad_rotation_intervals Date range when specific ad creative displays during a campaign. Provide date ranges in an array of UNIX timestamps where each timestamp represents the start time for each date range. For example a 3-day campaign from May 9 12am to May 11 11:59PM PST can have three date ranges, the first date range starts from May 9 12:00AM to May 9 11:59PM, second date range starts from May 10 12:00AM to May 10 11:59PM and last starts from May 11 12:00AM to May 11 11:59PM. The first timestamp should match the campaign start time. The last timestamp should be at least 1 hour before the campaign end time. You must provide at least two date ranges. All date ranges must cover the whole campaign length, so any date range cannot exceed campaign length. Use with time_based_ad_rotation_id_blocks to specify ad creative for each date range.
     * @param DateTimeInterface|null                    $updated_time                     Time when the Ad Set was updated
     * @param bool|null                                 $use_new_app_click                If set, allows Mobile App Engagement ads to optimize for LINK_CLICKS
     */
    public function __construct(
        public readonly string $id,
        public readonly ?string $account_id,
        public readonly ?array $adlabels,
        public readonly ?array $adset_schedule,
        public readonly ?string $asset_feed_id,
        public readonly ?array $attribution_spec,
        public readonly ?AdBidAdjustmentsDTO $bid_adjustments,
        public readonly ?int $bid_amount,
        public readonly ?AdCampaignBidConstraintDTO $bid_constraints,
        public readonly ?array $bid_info,
        public readonly ?BidStrategyEnum $bid_strategy,
        public readonly ?BillingEventEnum $billing_event,
        public readonly ?string $budget_remaining,
        public readonly ?CampaignDTO $campaign,
        public readonly ?CampaignAttributionEnum $campaign_attribution,
        public readonly ?string $campaign_id,
        public readonly ?ConfiguredStatusEnum $configured_status,
        public readonly ?ContextualBundlingSpecDTO $contextual_bundling_spec,
        public readonly ?DateTimeInterface $created_time,
        public readonly ?array $creative_sequence,
        public readonly ?string $daily_budget,
        public readonly ?string $daily_min_spend_target,
        public readonly ?string $daily_spend_cap,
        public readonly ?string $destination_type,
        public readonly ?string $dsa_beneficiary,
        public readonly ?string $dsa_payor,
        public readonly ?EffectiveStatusEnum $effective_status,
        public readonly ?DateTimeInterface $end_time,
        public readonly ?array $frequency_control_specs,
        public readonly ?string $instagram_actor_id,
        public readonly ?bool $is_dynamic_creative,
        public readonly ?array $issues_info,
        public readonly ?AdCampaignLearningStageInfoDTO $learning_stage_info,
        public readonly ?string $lifetime_budget,
        public readonly ?int $lifetime_imps,
        public readonly ?string $lifetime_min_spend_target,
        public readonly ?string $lifetime_spend_cap,
        public readonly ?string $multi_optimization_goal_weight,
        public readonly ?string $name,
        public readonly ?OptimizationGoalEnum $optimization_goal,
        public readonly ?string $optimization_sub_event,
        public readonly ?array $pacing_type,
        public readonly ?AdPromotedObjectDTO $promoted_object,
        public readonly ?array $recommendations,
        public readonly ?bool $recurring_budget_semantics,
        public readonly ?string $review_feedback,
        public readonly ?string $rf_prediction_id,
        public readonly ?AdSetDTO $source_adset,
        public readonly ?string $source_adset_id,
        public readonly ?DateTimeInterface $start_time,
        public readonly ?ConfiguredStatusEnum $status,
        public readonly ?TargetingDTO $targeting,
        public readonly ?array $targeting_optimization_types,
        public readonly ?array $time_based_ad_rotation_id_blocks,
        public readonly ?array $time_based_ad_rotation_intervals,
        public readonly ?DateTimeInterface $updated_time,
        public readonly ?bool $use_new_app_click
    ) {

    }

    /**
     * @inheritDoc
     */
    public
    function jsonSerialize(): array
    {
        return [
            'id'                               => $this->id,
            'account_id'                       => $this->account_id,
            'adlabels'                         => $this->adlabels,
            'adset_schedule'                   => $this->adset_schedule,
            'asset_feed_id'                    => $this->asset_feed_id,
            'attribution_spec'                 => $this->attribution_spec,
            'bid_adjustments'                  => $this->bid_adjustments,
            'bid_amount'                       => $this->bid_amount,
            'bid_constraints'                  => $this->bid_constraints,
            'bid_info'                         => $this->bid_info,
            'bid_strategy'                     => $this->bid_strategy,
            'billing_event'                    => $this->billing_event,
            'budget_remaining'                 => $this->budget_remaining,
            'campaign'                         => $this->campaign,
            'campaign_attribution'             => $this->campaign_attribution,
            'campaign_id'                      => $this->campaign_id,
            'configured_status'                => $this->configured_status,
            'contextual_bundling_spec'         => $this->contextual_bundling_spec,
            'created_time'                     => $this->created_time,
            'creative_sequence'                => $this->creative_sequence,
            'daily_budget'                     => $this->daily_budget,
            'daily_min_spend_target'           => $this->daily_min_spend_target,
            'daily_spend_cap'                  => $this->daily_spend_cap,
            'destination_type'                 => $this->destination_type,
            'dsa_beneficiary'                  => $this->dsa_beneficiary,
            'dsa_payor'                        => $this->dsa_payor,
            'effective_status'                 => $this->effective_status,
            'end_time'                         => $this->end_time,
            'frequency_control_specs'          => $this->frequency_control_specs,
            'instagram_actor_id'               => $this->instagram_actor_id,
            'is_dynamic_creative'              => $this->is_dynamic_creative,
            'issues_info'                      => $this->issues_info,
            'learning_stage_info'              => $this->learning_stage_info,
            'lifetime_budget'                  => $this->lifetime_budget,
            'lifetime_imps'                    => $this->lifetime_imps,
            'lifetime_min_spend_target'        => $this->lifetime_min_spend_target,
            'lifetime_spend_cap'               => $this->lifetime_spend_cap,
            'multi_optimization_goal_weight'   => $this->multi_optimization_goal_weight,
            'name'                             => $this->name,
            'optimization_goal'                => $this->optimization_goal,
            'optimization_sub_event'           => $this->optimization_sub_event,
            'pacing_type'                      => $this->pacing_type,
            'promoted_object'                  => $this->promoted_object,
            'recommendations'                  => $this->recommendations,
            'recurring_budget_semantics'       => $this->recurring_budget_semantics,
            'review_feedback'                  => $this->review_feedback,
            'rf_prediction_id'                 => $this->rf_prediction_id,
            'source_adset'                     => $this->source_adset,
            'source_adset_id'                  => $this->source_adset_id,
            'start_time'                       => $this->start_time,
            'status'                           => $this->status,
            'targeting'                        => $this->targeting,
            'targeting_optimization_types'     => $this->targeting_optimization_types,
            'time_based_ad_rotation_id_blocks' => $this->time_based_ad_rotation_id_blocks,
            'time_based_ad_rotation_intervals' => $this->time_based_ad_rotation_intervals,
            'updated_time'                     => $this->updated_time,
            'use_new_app_click'                => $this->use_new_app_click,
        ];
    }
}
