<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Application\Service;

use DateTimeImmutable;
use DateTimeInterface;
use Error;
use Exception;
use XGuard\Bot\Facebook\Domain\DTO\AdAccountDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdAccountPromotableObjectsDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdBidAdjustmentsDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdCampaignBidConstraintDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdCampaignFrequencyControlSpecsDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdCampaignIssuesInfoDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdCampaignLearningStageInfoDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdLabelDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdPromotedObjectDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdRecommendationDataDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdRecommendationDTO;
use XGuard\Bot\Facebook\Domain\DTO\AdSetDTO;
use XGuard\Bot\Facebook\Domain\DTO\AgencyClientDeclarationDTO;
use XGuard\Bot\Facebook\Domain\DTO\AgeRangeDTO;
use XGuard\Bot\Facebook\Domain\DTO\ApplicationAppEventsConfigDTO;
use XGuard\Bot\Facebook\Domain\DTO\ApplicationDTO;
use XGuard\Bot\Facebook\Domain\DTO\ApplicationObjectStoreURLsDTO;
use XGuard\Bot\Facebook\Domain\DTO\ApplicationRestrictionInfoDTO;
use XGuard\Bot\Facebook\Domain\DTO\ApplicationSDKInfoDTO;
use XGuard\Bot\Facebook\Domain\DTO\AttributionSpecDTO;
use XGuard\Bot\Facebook\Domain\DTO\Authentication\AccessTokenDTO;
use XGuard\Bot\Facebook\Domain\DTO\BindingDTO;
use XGuard\Bot\Facebook\Domain\DTO\BusinessDTO;
use XGuard\Bot\Facebook\Domain\DTO\BusinessManagedPartnerEligibilityDTO;
use XGuard\Bot\Facebook\Domain\DTO\BusinessUserDTO;
use XGuard\Bot\Facebook\Domain\DTO\CampaignDTO;
use XGuard\Bot\Facebook\Domain\DTO\ChildEventDTO;
use XGuard\Bot\Facebook\Domain\DTO\ContextualBundlingSpecDTO;
use XGuard\Bot\Facebook\Domain\DTO\CoordinateDTO;
use XGuard\Bot\Facebook\Domain\DTO\CopyrightAttributionInsightsDTO;
use XGuard\Bot\Facebook\Domain\DTO\CoverPhotoDTO;
use XGuard\Bot\Facebook\Domain\DTO\CurrencyDTO;
use XGuard\Bot\Facebook\Domain\DTO\DeliveryCheckDTO;
use XGuard\Bot\Facebook\Domain\DTO\EngagementDTO;
use XGuard\Bot\Facebook\Domain\DTO\EventDTO;
use XGuard\Bot\Facebook\Domain\DTO\ExperienceDTO;
use XGuard\Bot\Facebook\Domain\DTO\ExtendedCreditEmailDTO;
use XGuard\Bot\Facebook\Domain\DTO\ExtendedCreditInvoiceGroupDTO;
use XGuard\Bot\Facebook\Domain\DTO\FeedTargetingDTO;
use XGuard\Bot\Facebook\Domain\DTO\FundingSourceDetailsDTO;
use XGuard\Bot\Facebook\Domain\DTO\IGUserDTO;
use XGuard\Bot\Facebook\Domain\DTO\LocationDTO;
use XGuard\Bot\Facebook\Domain\DTO\MailingAddressDTO;
use XGuard\Bot\Facebook\Domain\DTO\ManagedPartnerBusinessDTO;
use XGuard\Bot\Facebook\Domain\DTO\MessagingFeatureStatusDTO;
use XGuard\Bot\Facebook\Domain\DTO\MessengerDestinationPageWelcomeMessageDTO;
use XGuard\Bot\Facebook\Domain\DTO\MusicVideoCopyrightDTO;
use XGuard\Bot\Facebook\Domain\DTO\PageCategoryDTO;
use XGuard\Bot\Facebook\Domain\DTO\PageDTO;
use XGuard\Bot\Facebook\Domain\DTO\PageParkingDTO;
use XGuard\Bot\Facebook\Domain\DTO\PagePaymentOptionsDTO;
use XGuard\Bot\Facebook\Domain\DTO\PageRestaurantServicesDTO;
use XGuard\Bot\Facebook\Domain\DTO\PageRestaurantSpecialtiesDTO;
use XGuard\Bot\Facebook\Domain\DTO\PageStartDateDTO;
use XGuard\Bot\Facebook\Domain\DTO\PageStartInfoDTO;
use XGuard\Bot\Facebook\Domain\DTO\PaymentPricePointsDTO;
use XGuard\Bot\Facebook\Domain\DTO\PlaceDTO;
use XGuard\Bot\Facebook\Domain\DTO\PostDTO;
use XGuard\Bot\Facebook\Domain\DTO\PrivacyDTO;
use XGuard\Bot\Facebook\Domain\DTO\ProfileDTO;
use XGuard\Bot\Facebook\Domain\DTO\ReachFrequencySpecDTO;
use XGuard\Bot\Facebook\Domain\DTO\ShareDTO;
use XGuard\Bot\Facebook\Domain\DTO\SystemUserDTO;
use XGuard\Bot\Facebook\Domain\DTO\TargetingDTO;
use XGuard\Bot\Facebook\Domain\DTO\UserDTO;
use XGuard\Bot\Facebook\Domain\DTO\VideoDTO;
use XGuard\Bot\Facebook\Domain\DTO\VideoFormatDTO;
use XGuard\Bot\Facebook\Domain\DTO\VideoStatusDTO;
use XGuard\Bot\Facebook\Domain\DTO\VideoUploadLimitsDTO;
use XGuard\Bot\Facebook\Domain\DTO\VoipInfoDTO;
use XGuard\Bot\Facebook\Domain\Enum\AdCampaignFrequencyControlSpecsEnum;
use XGuard\Bot\Facebook\Domain\Enum\AdCampaignLearningStageInfoStatusEnum;
use XGuard\Bot\Facebook\Domain\Enum\AdRecommendationConfidenceEnum;
use XGuard\Bot\Facebook\Domain\Enum\AdRecommendationImportanceEnum;
use XGuard\Bot\Facebook\Domain\Enum\BidStrategyEnum;
use XGuard\Bot\Facebook\Domain\Enum\BillingEventEnum;
use XGuard\Bot\Facebook\Domain\Enum\CampaignAttributionEnum;
use XGuard\Bot\Facebook\Domain\Enum\CategoryEventEnum;
use XGuard\Bot\Facebook\Domain\Enum\ConfiguredStatusEnum;
use XGuard\Bot\Facebook\Domain\Enum\CustomEventTypeEnum;
use XGuard\Bot\Facebook\Domain\Enum\DayPartEnum;
use XGuard\Bot\Facebook\Domain\Enum\EffectiveStatusEnum;
use XGuard\Bot\Facebook\Domain\Enum\InstagramEligibilityEnum;
use XGuard\Bot\Facebook\Domain\Enum\MessengerAdsQuickRepliesTypeEnum;
use XGuard\Bot\Facebook\Domain\Enum\OnlineEventFormatEnum;
use XGuard\Bot\Facebook\Domain\Enum\OptimizationGoalEnum;
use XGuard\Bot\Facebook\Domain\Enum\PickupOptionsEnum;
use XGuard\Bot\Facebook\Domain\Enum\PlaceTypeEnum;
use XGuard\Bot\Facebook\Domain\Enum\SupportedPlatformsEnum;
use XGuard\Bot\Facebook\Domain\Enum\TemporaryStatusEnum;
use XGuard\Bot\Facebook\Domain\Enum\TypeEventEnum;
use XGuard\Bot\Facebook\Domain\Enum\VerificationStatusEnum;
use XGuard\Bot\Facebook\Domain\Enum\VideoStatusEnum;

/**
 *
 */
final class DTOFactoryService implements DTOFactoryServiceInterface
{

    /**
     * @inheritDoc
     */
    public function createDTOFromAdSet(?array $adSet): ?AdSetDTO
    {
        if (null === $adSet) {
            return null;
        }

        return new AdSetDTO(
            $adSet['id'],
            $adSet['account_id'] ?? null,
            $this->createDTOFromAdLabels($adSet['adlabels'] ?? null),
            $this->createArrayOfEnum(DayPartEnum::class, $adSet['adset_schedule'] ?? null),
            $adSet['asset_feed_id'] ?? null,
            $this->checkArrayOfStrings(...($adSet['attribution_spec'] ?? [null])),
            $this->createDTOFromAdBidAdjustments($adSet['bid_adjustments'] ?? null),
            $adSet['bid_amount'] ?? null,
            $this->createDTOFromAdCampaignBidConstraint($adSet['bid_constraints'] ?? null),
            $this->checkArrayOfIntegers(...($adSet['bid_info'] ?? [null])),
            $this->createEnum(BidStrategyEnum::class, $adSet['bid_strategy']),
            $this->createEnum(BillingEventEnum::class, $adSet['billing_event']),
            $adSet['budget_remaining'] ?? null,
            $this->createDTOFromCampaign($adSet['campaign'] ?? null),
            $this->createEnum(CampaignAttributionEnum::class, $adSet['campaign_attribution']),
            $adSet['campaign_id'] ?? null,
            $this->createEnum(ConfiguredStatusEnum::class, $adSet['configured_status']),
            $this->createDTOFromContextualBundlingSpec($adSet['contextual_bundling_spec'] ?? null),
            $this->createDateTimeImmutableFromDateTime($adSet['created_time'] ?? null),
            $this->checkArrayOfStrings(...($adSet['creative_sequence'] ?? [null])),
            $adSet['daily_budget'] ?? null,
            $adSet['daily_min_spend_target'] ?? null,
            $adSet['daily_spend_cap'] ?? null,
            $adSet['destination_type'] ?? null,
            $adSet['dsa_beneficiary'] ?? null,
            $adSet['dsa_payor'] ?? null,
            $this->createEnum(EffectiveStatusEnum::class, $adSet['effective_status']),
            $this->createDateTimeImmutableFromDateTime($adSet['end_time'] ?? null),
            $this->createDTOFromAdCampaignFrequencyControlSpecs($adSet['frequency_control_specs'] ?? null),
            $adSet['instagram_actor_id'] ?? null,
            $adSet['is_dynamic_creative'] ?? null,
            $this->createDTOFromAdCampaignIssuesInfo($adSet['issues_info'] ?? null),
            $this->createDTOFromAdCampaignLearningStageInfo($adSet['learning_stage_info'] ?? null),
            $adSet['lifetime_budget'] ?? null,
            $adSet['lifetime_imps'] ?? null,
            $adSet['lifetime_min_spend_target'] ?? null,
            $adSet['lifetime_spend_cap'] ?? null,
            $adSet['multi_optimization_goal_weight'] ?? null,
            $adSet['name'] ?? null,
            $this->createEnum(OptimizationGoalEnum::class, $adSet['optimization_goal']),
            $adSet['optimization_sub_event'] ?? null,
            $this->checkArrayOfStrings(...($adSet['pacing_type'] ?? [null])),
            $this->createDTOFromAdPromotedObject($adSet['promoted_object'] ?? null),
            $this->createDTOFromAdRecommendations($adSet['recommendations'] ?? null),
            $adSet['recurring_budget_semantics'] ?? null,
            $adSet['review_feedback'] ?? null,
            $adSet['rf_prediction_id'] ?? null,
            $this->createDTOFromAdSet($adSet['source_adset'] ?? null),
            $adSet['source_adset_id'] ?? null,
            $this->createDateTimeImmutableFromDateTime($adSet['start_time'] ?? null),
            $this->createEnum(ConfiguredStatusEnum::class, $adSet['status']),
            $this->createDTOFromTargeting($adSet['targeting'] ?? null),
            $this->checkArrayOfIntegers(...($adSet['targeting_optimization_types'] ?? [null])),
            $this->checkArrayOfIntegers(...($adSet['time_based_ad_rotation_id_blocks'] ?? [null])),
            $this->checkArrayOfIntegers(...($adSet['time_based_ad_rotation_intervals'] ?? [null])),
            $this->createDateTimeImmutableFromDateTime($adSet['updated_time'] ?? null),
            $adSet['use_new_app_click'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdLabels(?array $adLabels): ?array
    {
        return array_reduce(
            $adLabels ?? [],
            function ($carry, $item): ?array {
                $result = $this->createDTOFromAdLabel($item);

                if (null !== $result) {
                    $carry   ??= [];
                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdLabel(?array $adLabel): ?AdLabelDTO
    {
        if (null === $adLabel) {
            return null;
        }

        return new AdLabelDTO(
            $adLabel['id'] ?? null,
            $this->createDTOFromAdAccount($adLabel['account'] ?? null),
            $this->createDateTimeImmutableFromDateTime($adLabel['created_time'] ?? null),
            $adLabel['name'],
            $this->createDateTimeImmutableFromDateTime($adLabel['updated_time'] ?? null),
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdAccount(?array $adAccount): ?AdAccountDTO
    {
        if (null === $adAccount) {
            return null;
        }

        return new AdAccountDTO(
            $adAccount['id'],
            $adAccount['account_id'],
            $adAccount['account_status'] ?? null,
            $this->createDTOFromAdAccountPromotableObjects($adAccount['ad_account_promotable_objects'] ?? null),
            $adAccount['age'] ?? null,
            $this->createDTOFromAgencyClientDeclaration($adAccount['agency_client_declaration'] ?? null),
            $adAccount['amount_spent'] ?? null,
            $this->createDTOFromAttributionSpec($adAccount['attribution_spec'] ?? null),
            $adAccount['balance'] ?? null,
            $this->createDTOFromBusiness($adAccount['business'] ?? null),
            $adAccount['business_city'] ?? null,
            $adAccount['business_country_code'] ?? null,
            $adAccount['business_name'] ?? null,
            $adAccount['business_state'] ?? null,
            $adAccount['business_street'] ?? null,
            $adAccount['business_street2'] ?? null,
            $adAccount['business_zip'] ?? null,
            $adAccount['can_create_brand_lift_study'] ?? null,
            $this->checkArrayOfStrings(...($adAccount['capabilities'] ?? [null])),
            $this->createDateTimeImmutableFromDateTime($adAccount['created_time']),
            $adAccount['currency'] ?? null,
            $adAccount['direct_deals_tos_accepted'] ?? null,
            $adAccount['disable_reason'] ?? null,
            $adAccount['end_advertiser'] ?? null,
            $adAccount['end_advertiser_name'] ?? null,
            $this->checkArrayOfStrings(...($adAccount['existing_customers'] ?? [null])),
            $this->createDTOFromExtendedCreditInvoiceGroup($adAccount['extended_credit_invoice_group'] ?? null),
            $this->createDTOFromDeliveryCheck($adAccount['failed_delivery_checks'] ?? null),
            $adAccount['fb_entity'] ?? null,
            $adAccount['funding_source'] ?? null,
            $this->createDTOFromFundingSourceDetails($adAccount['funding_source_details'] ?? null),
            $adAccount['has_migrated_permissions'] ?? null,
            $adAccount['has_page_authorized_adaccount'] ?? null,
            $adAccount['io_number'] ?? null,
            $adAccount['is_attribution_spec_system_default'] ?? null,
            $adAccount['is_direct_deals_enabled'] ?? null,
            $adAccount['is_in_3ds_authorization_enabled_market'] ?? null,
            $adAccount['is_notifications_enabled'] ?? null,
            $adAccount['is_personal'] ?? null,
            $adAccount['is_prepay_account'] ?? null,
            $adAccount['is_tax_id_required'] ?? null,
            $this->checkArrayOfIntegers(...($adAccount['line_numbers'] ?? [null])),
            $adAccount['media_agency'] ?? null,
            $adAccount['min_campaign_group_spend_cap'] ?? null,
            $adAccount['min_daily_budget'] ?? null,
            $adAccount['name'] ?? null,
            $adAccount['offsite_pixels_tos_accepted'] ?? null,
            $adAccount['owner'] ?? null,
            $adAccount['partner'] ?? null,
            $this->createDTOFromReachFrequencySpec($adAccount['rf_spec'] ?? null),
            $adAccount['show_checkout_experience'] ?? null,
            $adAccount['spend_cap'] ?? null,
            $adAccount['tax_id'] ?? null,
            $adAccount['tax_id_status'] ?? null,
            $adAccount['tax_id_type'] ?? null,
            $adAccount['timezone_id'],
            $adAccount['timezone_name'] ?? null,
            $adAccount['timezone_offset_hours_utc'] ?? null,
            $this->checkArrayOfIntegers(...($adAccount['tos_accepted'] ?? [null])),
            $this->checkArrayOfStrings(...($adAccount['user_tasks'] ?? [null])),
            $this->checkArrayOfIntegers(...($adAccount['user_tos_accepted'] ?? [null])),
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdAccountPromotableObjects(
        ?array $adAccountPromotableObjects
    ): ?AdAccountPromotableObjectsDTO {
        if (null === $adAccountPromotableObjects) {
            return null;
        }

        return new AdAccountPromotableObjectsDTO(
            $adAccountPromotableObjects
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAgencyClientDeclaration(?array $agencyClientDeclaration): ?AgencyClientDeclarationDTO
    {
        if (null === $agencyClientDeclaration) {
            return null;
        }

        return new AgencyClientDeclarationDTO(
            $agencyClientDeclaration['agency_representing_client'],
            $agencyClientDeclaration['client_based_in_france'],
            $agencyClientDeclaration['client_city'],
            $agencyClientDeclaration['client_country_code'],
            $agencyClientDeclaration['client_email_address'],
            $agencyClientDeclaration['client_name'],
            $agencyClientDeclaration['client_postal_code'],
            $agencyClientDeclaration['client_province'],
            $agencyClientDeclaration['client_street'],
            $agencyClientDeclaration['client_street2'],
            $agencyClientDeclaration['has_written_mandate_from_advertiser'],
            $agencyClientDeclaration['is_client_paying_invoices']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAttributionSpec(?array $attributionSpec): ?AttributionSpecDTO
    {
        if (null === $attributionSpec) {
            return null;
        }

        return new AttributionSpecDTO(
            $attributionSpec
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromBusiness(?array $business): ?BusinessDTO
    {
        if (null === $business) {
            return null;
        }

        return new BusinessDTO(
            $business['id'],
            $business['block_offline_analytics'] ?? null,
            $this->createDTOFromManagedPartnerBusiness(
                $business['collaborative_ads_managed_partner_business_info'] ?? null
            ),
            $this->createDTOFromBusinessManagedPartnerEligibility(
                $business['collaborative_ads_managed_partner_eligibility'] ?? null
            ),
            $this->createDTOFromBusinessUserSystemUser($business['created_by'] ?? null),
            $this->createDateTimeImmutableFromDateTime($business['created_time'] ?? null),
            $this->createDateTimeImmutableFromDateTime($business['extended_updated_time'] ?? null),
            $business['is_hidden'] ?? null,
            $business['link'] ?? null,
            $business['name'],
            $business['payment_account_id'] ?? null,
            $this->createDTOFromPage($business['primary_page'] ?? null),
            $business['profile_picture_uri'] ?? null,
            $business['timezone_id'] ?? null,
            $business['two_factor_type'] ?? null,
            $this->createDTOFromBusinessUserSystemUser($business['updated_by'] ?? null),
            $this->createDateTimeImmutableFromDateTime($business['updated_time'] ?? null),
            $business['verification_status'] ?? null,
            $business['vertical'] ?? null,
            $business['vertical_id'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromManagedPartnerBusiness(?array $managedPartnerBusiness): ?ManagedPartnerBusinessDTO
    {
        if (null === $managedPartnerBusiness) {
            return null;
        }

        return new ManagedPartnerBusinessDTO($managedPartnerBusiness);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromBusinessManagedPartnerEligibility(
        ?array $businessManagedPartnerEligibility
    ): ?BusinessManagedPartnerEligibilityDTO {
        if (null === $businessManagedPartnerEligibility) {
            return null;
        }

        return new BusinessManagedPartnerEligibilityDTO(
            $businessManagedPartnerEligibility
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromBusinessUserSystemUser(
        ?array $businessUserSystemUser
    ): null|BusinessUserDTO|SystemUserDTO {
        if (null === $businessUserSystemUser) {
            return null;
        }

        try {
            return $this->createDTOFromBusinessUser($businessUserSystemUser);
        } catch (Error|Exception $eBusinessUser) {
            // TODO catch the error or the exception
            try {
                return $this->createDTOFromSystemUser($businessUserSystemUser);
            } catch (Error|Exception $eSystemUser) {
                // TODO catch the error or the exception
            }
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromBusinessUser(?array $businessUser): ?BusinessUserDTO
    {
        if (null === $businessUser) {
            return null;
        }

        return new BusinessUserDTO(
            $businessUser['id'],
            $this->createDTOFromBusiness($businessUser['business']),
            $businessUser['email'] ?? null,
            $businessUser['finance_permission'] ?? null,
            $businessUser['first_name'] ?? null,
            $businessUser['ip_permission'] ?? null,
            $businessUser['last_name'] ?? null,
            $businessUser['name'],
            $businessUser['pending_email'] ?? null,
            $businessUser['role'] ?? null,
            $businessUser['title'] ?? null,
            $businessUser['two_fac_status'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromSystemUser(?array $systemUser): ?SystemUserDTO
    {
        if (null === $systemUser) {
            return null;
        }

        return new SystemUserDTO($systemUser);
    }

    /**
     * @param mixed $datetime
     *
     * @return DateTimeInterface|null
     */
    private function createDateTimeImmutableFromDateTime(mixed $datetime): ?DateTimeInterface
    {
        $result = null;

        try {
            if (!empty($datetime)) {
                if (is_numeric($datetime)) {
                    $result = (new DateTimeImmutable)->setTimestamp($datetime);
                } elseif (is_string($datetime)) {
                    $result = new DateTimeImmutable($datetime);
                }
            }
        } catch (Error|Exception $e) {
            // TODO catch the error or the exception

        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPage(?array $page): ?PageDTO
    {
        if (null === $page) {
            return null;
        }

        return new PageDTO(
            $page['id'] ?? null,
            $page['about'] ?? null,
            $page['access_token'] ?? null,
            $this->createDTOFromAdSet($page['ad_campaign'] ?? null),
            $page['affiliation'] ?? null,
            $page['app_id'] ?? null,
            $page['artists_we_like'] ?? null,
            $page['attire'] ?? null,
            $page['awards'] ?? null,
            $page['band_interests'] ?? null,
            $page['band_members'] ?? null,
            $this->createDTOFromPage($page['best_page'] ?? null),
            $page['bio'] ?? null,
            $page['birthday'] ?? null,
            $page['booking_agent'] ?? null,
            $page['built'] ?? null,
            $this->createDTOFromBusiness($page['business'] ?? null),
            $page['can_checkin'] ?? null,
            $page['can_post'] ?? null,
            $page['category'],
            $this->createDTOFromPageCategories($page['category_list']),
            $page['checkins'],
            $page['company_overview'] ?? null,
            $this->createDTOFromIGUser($page['connected_instagram_account'] ?? null),
            $this->createDTOFromIGUser($page['connected_page_backed_instagram_account'] ?? null),
            $this->createDTOFromMailingAddress($page['contact_address'] ?? null),
            $this->createDTOFromCopyrightAttributionInsights($page['copyright_attribution_insights'] ?? null),
            $this->checkArrayOfStrings(...($page['copyright_whitelisted_ig_partners'] ?? [null])),
            $page['country_page_likes'] ?? null,
            $this->createDTOFromCoverPhoto($page['cover'] ?? null),
            $page['culinary_team'] ?? null,
            $page['current_location'] ?? null,
            $this->checkArrayOfStrings(...($page['delivery_and_pickup_option_info'] ?? [null])),
            $page['description'],
            $page['description_html'] ?? null,
            $page['differently_open_offerings'] ?? null,
            $page['directed_by'] ?? null,
            $page['display_subtext'] ?? null,
            $page['displayed_message_response_time'] ?? null,
            $this->checkArrayOfStrings(...($page['emails'] ?? [null])),
            $this->createDTOFromEngagement($page['engagement'] ?? null),
            $page['fan_count'] ?? null,
            $this->createDTOFromVideo($page['featured_video'] ?? null),
            $page['features'] ?? null,
            $page['followers_count'] ?? null,
            $this->checkArrayOfStrings(...($page['food_styles'] ?? [null])),
            $page['founded'] ?? null,
                $page['general_info'] ?? null,
                $page['general_manager'] ?? null,
                $page['genre'] ?? null,
                $page['global_brand_page_name'] ?? null,
                $page['global_brand_root_id'] ?? null,
                $page['has_added_app'] ?? null,
                $page['has_transitioned_to_new_page_experience'] ?? null,
                $page['has_whatsapp_business_number'] ?? null,
                $page['has_whatsapp_number'] ?? null,
                $page['hometown'] ?? null,
                $this->checkArrayAsMap($page['hours'] ?? null),
                $page['impressum'] ?? null,
                $page['influences'] ?? null,
                $this->createDTOFromIGUser($page['instagram_business_account'] ?? null),
                $page['is_always_open'] ?? null,
                $page['is_chain'] ?? null,
                $page['is_community_page'] ?? null,
                $page['is_eligible_for_branded_content'] ?? null,
                $page['is_messenger_bot_get_started_enabled'] ?? null,
                $page['is_messenger_platform_bot'] ?? null,
                $page['is_owned'] ?? null,
            $page['is_permanently_closed'] ?? null,
            $page['is_published'] ?? null,
            $page['is_unclaimed'] ?? null,
            $page['is_verified'] ?? null,
            $page['is_webhooks_subscribed'] ?? null,
            $page['keywords'],
            $this->createDateTimeImmutableFromDateTime($page['leadgen_tos_acceptance_time'] ?? null),
            $page['leadgen_tos_accepted'] ?? null,
            $this->createDTOFromUser($page['leadgen_tos_accepting_user'] ?? null),
            $page['link'] ?? null,
            $this->createDTOFromLocation($page['location'] ?? null),
            $page['members'] ?? null,
            $page['merchant_id'] ?? null,
            $page['merchant_review_status'] ?? null,
            $this->createDTOFromMessagingFeatureStatus($page['messaging_feature_status'] ?? null),
            $this->checkArrayOfStrings(...($page['messenger_ads_default_icebreakers'] ?? [null])),
            $this->createDTOFromMessengerDestinationPageWelcomeMessage(
                $page['messenger_ads_default_page_welcome_message'] ?? null
            ),
            $this->checkArrayOfStrings(...($page['messenger_ads_default_quick_replies'] ?? [null])),
            $this->createEnum(
                MessengerAdsQuickRepliesTypeEnum::class,
                $page['messenger_ads_quick_replies_type'] ?? null
            ),
            $page['mission'] ?? null,
            $page['mpg'] ?? null,
            $page['name'],
            $page['name_with_location_descriptor'] ?? null,
            $page['network'] ?? null,
            $page['new_like_count'] ?? null,
            $page['offer_eligible'] ?? null,
            $page['overall_star_rating'] ?? null,
            $page['page_token'] ?? null,
            $this->createDTOFromPage($page['parent_page'] ?? null),
            $this->createDTOFromPageParking($page['parking'] ?? null),
            $this->createDTOFromPagePaymentOptions($page['payment_options'] ?? null),
            $page['personal_info'] ?? null,
            $page['personal_interests'] ?? null,
            $page['pharma_safety_info'] ?? null,
            $page['phone'] ?? null,
            $this->createArrayOfEnum(PickupOptionsEnum::class, $page['pickup_options'] ?? null),
            $this->createEnum(PlaceTypeEnum::class, $page['place_type'] ?? null),
            $page['plot_outline'] ?? null,
            $this->createDTOFromTargeting($page['preferred_audience'] ?? null),
            $page['press_contact'] ?? null,
            $page['price_range'] ?? null,
            $page['privacy_info_url'] ?? null,
            $page['produced_by'] ?? null,
            $page['products'] ?? null,
            $page['promotion_eligible'] ?? null,
            $page['promotion_ineligible_reason'] ?? null,
            $page['public_transit'] ?? null,
            $page['rating_count'] ?? null,
            $page['recipient'] ?? null,
            $page['record_label'] ?? null,
            $page['release_date'] ?? null,
            $this->createDTOFromPageRestaurantServices($page['restaurant_services'] ?? null),
            $this->createDTOFromPageRestaurantSpecialties($page['restaurant_specialties'] ?? null),
            $page['schedule'] ?? null,
            $page['screenplay_by'] ?? null,
            $page['season'] ?? null,
            $page['single_line_address'] ?? null,
            $page['starring'] ?? null,
            $this->createDTOFromPageStartInfo($page['start_info'] ?? null),
            $page['store_code'] ?? null,
            $page['store_location_descriptor'] ?? null,
            $page['store_number'] ?? null,
            $page['studio'] ?? null,
            $page['supports_donate_button_in_live_video'] ?? null,
            $page['talking_about_count'] ?? null,
            $this->createEnum(TemporaryStatusEnum::class, $page['temporary_status'] ?? null),
            $page['unread_message_count'] ?? null,
            $page['unread_notif_count'] ?? null,
            $page['unseen_message_count'] ?? null,
            $page['username'],
            $this->createEnum(VerificationStatusEnum::class, $page['verification_status'] ?? null),
            $this->createDTOFromVoipInfo($page['voip_info'] ?? null),
            $page['website'] ?? null,
            $page['were_here_count'] ?? null,
            $page['whatsapp_number'] ?? null,
            $page['written_by'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPageCategories(?array $pageCategories): ?array
    {
        return array_reduce(
            $pageCategories ?? [],
            function ($carry, $item): ?array {
                $result = $this->createDTOFromPageCategory($item);

                if (null !== $result) {
                    $carry   ??= [];
                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPageCategory(?array $pageCategory): ?PageCategoryDTO
    {
        if (null === $pageCategory) {
            return null;
        }

        return new PageCategoryDTO(
            $pageCategory['id'],
            $pageCategory['api_enum'],
            $this->createDTOFromPageCategories($pageCategory['fb_page_categories'] ?? null),
            $pageCategory['name']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromIGUser(?array $iGUser): ?IGUserDTO
    {
        if (null === $iGUser) {
            return null;
        }

        return new IGUserDTO($iGUser);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromMailingAddress(?array $mailingAddress): ?MailingAddressDTO
    {
        if (null === $mailingAddress) {
            return null;
        }

        return new MailingAddressDTO(
            $mailingAddress['id'] ?? null,
            $mailingAddress['city'],
            $this->createDTOFromPage($mailingAddress['city_page'] ?? null),
            $mailingAddress['country'],
            $mailingAddress['postal_code'],
            $mailingAddress['region'],
            $mailingAddress['street1'],
            $mailingAddress['street2'],
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromCopyrightAttributionInsights(
        ?array $copyrightAttributionInsights
    ): ?CopyrightAttributionInsightsDTO {
        if (null === $copyrightAttributionInsights) {
            return null;
        }

        return new CopyrightAttributionInsightsDTO(
            $copyrightAttributionInsights
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromCoverPhoto(?array $coverPhoto): ?CoverPhotoDTO
    {
        if (null === $coverPhoto) {
            return null;
        }

        return new CoverPhotoDTO(
            $coverPhoto['id'],
            $coverPhoto['cover_id'],
            $coverPhoto['offset_x'],
            $coverPhoto['offset_y'],
            $coverPhoto['source']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromEngagement(?array $engagement): ?EngagementDTO
    {
        if (null === $engagement) {
            return null;
        }

        return new EngagementDTO(
            $engagement['count'],
            $engagement['count_string'] ?? null,
            $engagement['count_string_with_like'] ?? null,
            $engagement['count_string_without_like'] ?? null,
            $engagement['social_sentence'],
            $engagement['social_sentence_with_like'] ?? null,
            $engagement['social_sentence_without_like'] ?? null,
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideo(?array $video): ?VideoDTO
    {
        if (null === $video) {
            return null;
        }

        return new VideoDTO(
            $video['id'] ?? null,
            $this->checkArrayOfIntegers(...($video['ad_breaks'] ?? [null])),
            $this->createDateTimeImmutableFromDateTime($video['backdated_time'] ?? null),
            $video['backdated_time_granularity'] ?? null,
            $video['content_category'] ?? null,
            $this->checkArrayOfStrings(...($video['content_tags'] ?? [null])),
            $this->createDateTimeImmutableFromDateTime($video['created_time'] ?? null),
            $this->checkArrayOfStrings(...($video['custom_labels'] ?? [null])),
            $video['description'],
            $video['embed_html'] ?? null,
            $video['embeddable'] ?? null,
            $this->createDTOFromEvent($video['event'] ?? null),
            $this->createDTOFromVideoFormats($video['format'] ?? null),
            $this->createDTOFromUserPage($video['from'] ?? null),
            $video['icon'] ?? null,
            $video['is_crosspost_video'] ?? null,
            $video['is_crossposting_eligible'] ?? null,
            $video['is_episode'] ?? null,
            $video['is_instagram_eligible'] ?? null,
            $video['is_reference_only'] ?? null,
            $video['length'] ?? null,
            $video['live_status'] ?? null,
            $this->createDTOFromMusicVideoCopyright($video['music_video_copyright'] ?? null),
            $video['permalink_url'] ?? null,
            $this->createDTOFromPlace($video['place'] ?? null),
            $video['post_views'] ?? null,
            $video['premiere_living_room_status'] ?? null,
            $this->createDTOFromPrivacy($video['privacy'] ?? null),
            $video['published'] ?? null,
            $this->createDateTimeImmutableFromDateTime($video['scheduled_publish_time'] ?? null),
            $video['source'] ?? null,
            $this->createDTOFromVideoStatus($video['status'] ?? null),
            $video['title'] ?? null,
            $video['universal_video_id'] ?? null,
            $this->createDateTimeImmutableFromDateTime($video['updated_time']),
            $video['views'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromEvent(?array $event): ?EventDTO
    {
        if (null === $event) {
            return null;
        }

        return new EventDTO(
            $event['id'] ?? null,
            $event['attending_count'] ?? null,
            $event['can_guests_invite'] ?? null,
            $this->createEnum(CategoryEventEnum::class, $event['category']),
            $this->createDTOFromCoverPhoto($event['cover'] ?? null),
            $this->createDateTimeImmutableFromDateTime($event['created_time'] ?? null),
            $event['declined_count'] ?? null,
            $event['description'],
            $event['discount_code_enabled'] ?? null,
            $event['end_time'],
            $this->createDTOFromChildEvents($event['event_times'] ?? null),
            $event['guest_list_enabled'] ?? null,
            $event['interested_count'] ?? null,
            $event['is_canceled'] ?? null,
            $event['is_draft'] ?? null,
            $event['is_online'] ?? null,
            $event['is_page_owned'] ?? null,
            $event['maybe_count'] ?? null,
            $event['name'],
            $event['noreply_count'] ?? null,
            $this->createEnum(OnlineEventFormatEnum::class, $event['online_event_format']),
            $event['online_event_third_party_url'] ?? null,
            $event['owner'],
            $this->createDTOFromPlace($event['place'] ?? null),
            $event['scheduled_publish_time'] ?? null,
            $event['start_time'],
            $event['ticket_uri'] ?? null,
            $event['ticket_uri_start_sales_time'] ?? null,
            $event['ticketing_privacy_uri'] ?? null,
            $event['ticketing_terms_uri'] ?? null,
            $event['timezone'] ?? null,
            $this->createEnum(TypeEventEnum::class, $event['type']),
            $this->createDateTimeImmutableFromDateTime($event['updated_time'] ?? null),
        );
    }

    /**
     * @param string $enumClass
     * @param mixed  $value
     *
     * @return mixed
     */
    private function createEnum(string $enumClass, mixed $value): mixed
    {
        if (null === $value || !enum_exists($enumClass)) {
            return null;
        }

        try {
            return constant($enumClass.'::'.$value);
        } catch (Error|Exception $e) {
            // TODO catch the error or the exception
            return null;
        }
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromChildEvents(?array $childEvents): ?array
    {
        return array_reduce(
            $childEvents ?? [],
            function ($carry, $item): ?array {
                $result = $this->createDTOFromChildEvent($item);

                if (null !== $result) {
                    $carry   ??= [];
                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromChildEvent(?array $childEvent): ?ChildEventDTO
    {
        if (null === $childEvent) {
            return null;
        }

        return new ChildEventDTO(
            $childEvent
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPlace(?array $place): ?PlaceDTO
    {
        if (null === $place) {
            return null;
        }

        return new PlaceDTO(
            $place['id'] ?? null,
            $this->createDTOFromLocation($place['location']),
            $place['name'],
            $place['overall_rating'] ?? null,
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromLocation(?array $location): ?LocationDTO
    {
        if (null === $location) {
            return null;
        }

        return new LocationDTO(
            $location['city'],
            $location['city_id'] ?? null,
            $location['country'],
            $location['country_code'] ?? null,
            $location['latitude'],
            $location['located_in'],
            $location['longitude'],
            $location['name'],
            $location['region'] ?? null,
            $location['region_id'] ?? null,
            $location['state'],
            $location['street'],
            $location['zip']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoFormats(?array $videoFormats): ?array
    {
        return array_reduce(
            $videoFormats ?? [],
            function ($carry, $item): ?array {
                $result = $this->createDTOFromVideoFormat($item);

                if (null !== $result) {
                    $carry   ??= [];
                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoFormat(?array $videoFormat): ?VideoFormatDTO
    {
        if (null === $videoFormat) {
            return null;
        }

        return new VideoFormatDTO(
            $videoFormat['embed_html'],
            $videoFormat['filter'],
            $videoFormat['height'],
            $videoFormat['picture'],
            $videoFormat['width']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromUserPage(?array $userPage): null|UserDTO|PageDTO
    {
        if (null === $userPage) {
            return null;
        }

        try {
            return $this->createDTOFromUser($userPage);
        } catch (Error|Exception $eBusinessUser) {
            // TODO catch the error or the exception
            try {
                return $this->createDTOFromPage($userPage);
            } catch (Error|Exception $eSystemUser) {
                // TODO catch the error or the exception
            }
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromUser(?array $user): ?UserDTO
    {
        if (null === $user) {
            return null;
        }

        return new UserDTO(
            $user['id'],
            $user['about'] ?? null,
            $this->createDTOFromAgeRange($user['age_range'] ?? null),
            $user['birthday'],
            $this->createDTOFromCurrency($user['currency'] ?? null),
            $this->createDTOFromExperiences($user['education'] ?? null),
            $user['email'],
            $this->createDTOFromExperiences($user['favorite_athletes'] ?? null),
            $this->createDTOFromExperiences($user['favorite_teams'] ?? null),
            $user['first_name'],
            $user['gender'],
            $this->createDTOFromPage($user['hometown'] ?? null),
            $user['id_for_avatars'] ?? null,
            $this->createDTOFromExperiences($user['inspirational_people'] ?? null),
            $user['install_type'] ?? null,
            $user['installed'] ?? null,
            $user['is_guest_user'] ?? null,
            $this->createDTOFromExperiences($user['languages'] ?? null),
            $user['last_name'],
            $user['link'],
            $user['local_news_megaphone_dismiss_status'] ?? null,
            $user['local_news_subscription_status'] ?? null,
            $user['locale'] ?? null,
            $this->createDTOFromPage($user['location'] ?? null),
            $this->checkArrayOfStrings(...($user['meeting_for'] ?? [null])),
            $user['middle_name'],
            $user['name'],
            $user['name_format'] ?? null,
            $this->createDTOFromPaymentPricepoints($user['payment_pricepoints'] ?? null),
            $user['political'] ?? null,
            $user['profile_pic'] ?? null,
            $user['quotes'] ?? null,
            $user['relationship_status'] ?? null,
            $user['shared_login_upgrade_required_by'] ?? null,
            $user['short_name'] ?? null,
            $this->createDTOFromUser($user['significant_other'] ?? null),
            $this->createDTOFromExperiences($user['sports'] ?? null),
            $user['supports_donate_button_in_live_video'] ?? null,
            $user['third_party_id'] ?? null,
            $user['timezone'] ?? null,
            $user['token_for_business'] ?? null,
            $this->createDateTimeImmutableFromDateTime($user['updated_time'] ?? null),
            $user['verified'] ?? null,
            $this->createDTOFromVideoUploadLimits($user['video_upload_limits'] ?? null),
            $user['website'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAgeRange(?array $ageRange): ?AgeRangeDTO
    {
        if (null === $ageRange) {
            return null;
        }

        return new AgeRangeDTO(
            $ageRange['max'],
            $ageRange['min']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromCurrency(?array $currency): ?CurrencyDTO
    {
        if (null === $currency) {
            return null;
        }

        return new CurrencyDTO(
            $currency['currency_offset'],
            $currency['usd_exchange'],
            $currency['usd_exchange_inverse'],
            $currency['user_currency']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromExperiences(?array $experiences): ?array
    {
        return array_reduce(
            $experiences ?? [],
            function ($carry, $item): ?array {
                $result = $this->createDTOFromExperience($item);

                if (null !== $result) {
                    $carry   ??= [];
                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromExperience(?array $experience): ?ExperienceDTO
    {
        if (null === $experience) {
            return null;
        }

        return new ExperienceDTO(
            $experience['id'],
            $experience['description'],
            $experience['from'],
            $experience['name'],
            $this->createDTOFromUsers($experience['with'])
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromUsers(?array $users): ?array
    {
        return array_reduce(
            $users ?? [],
            function ($carry, $item): ?array {
                $result = $this->createDTOFromUser($item);

                if (null !== $result) {
                    $carry   ??= [];
                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPaymentPricePoints(?array $paymentPricePoints): ?PaymentPricePointsDTO
    {
        if (null === $paymentPricePoints) {
            return null;
        }

        return new PaymentPricePointsDTO($paymentPricePoints);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoUploadLimits(?array $videoUploadLimits): ?VideoUploadLimitsDTO
    {
        if (null === $videoUploadLimits) {
            return null;
        }

        return new VideoUploadLimitsDTO($videoUploadLimits);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromMusicVideoCopyright(?array $musicVideoCopyright): ?MusicVideoCopyrightDTO
    {
        if (null === $musicVideoCopyright) {
            return null;
        }

        return new MusicVideoCopyrightDTO($musicVideoCopyright);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPrivacy(?array $privacy): ?PrivacyDTO
    {
        if (null === $privacy) {
            return null;
        }

        return new PrivacyDTO(
            $privacy['allow'],
            $privacy['deny'],
            $privacy['description'],
            $privacy['friends'],
            $privacy['networks'],
            $privacy['value']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVideoStatus(?array $videoStatus): ?VideoStatusDTO
    {
        if (null === $videoStatus) {
            return null;
        }

        return new VideoStatusDTO(
            $videoStatus['processing_progress'],
            $this->createEnum(VideoStatusEnum::class, $videoStatus['video_status'])
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromMessagingFeatureStatus(?array $messagingFeatureStatus): ?MessagingFeatureStatusDTO
    {
        if (null === $messagingFeatureStatus) {
            return null;
        }

        return new MessagingFeatureStatusDTO($messagingFeatureStatus);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromMessengerDestinationPageWelcomeMessage(
        ?array $messengerDestinationPageWelcomeMessage
    ): ?MessengerDestinationPageWelcomeMessageDTO {
        if (null === $messengerDestinationPageWelcomeMessage) {
            return null;
        }

        return new MessengerDestinationPageWelcomeMessageDTO($messengerDestinationPageWelcomeMessage);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPageParking(?array $pageParking): ?PageParkingDTO
    {
        if (null === $pageParking) {
            return null;
        }

        return new PageParkingDTO(
            $pageParking['lot'],
            $pageParking['street'],
            $pageParking['valet']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPagePaymentOptions(?array $pagePaymentOptions): ?PagePaymentOptionsDTO
    {
        if (null === $pagePaymentOptions) {
            return null;
        }

        return new PagePaymentOptionsDTO(
            $pagePaymentOptions['amex'],
            $pagePaymentOptions['cash_only'],
            $pagePaymentOptions['discover'],
            $pagePaymentOptions['mastercard'],
            $pagePaymentOptions['visa'],
        );
    }

    /**
     * @param string $enumClass
     * @param mixed  $value
     *
     * @return mixed
     */
    private function createArrayOfEnum(string $enumClass, ?array $value): mixed
    {
        if (null === $value || !enum_exists($enumClass)) {
            return null;
        }

        return array_reduce(
            $value,
            function ($carry, mixed $item) use ($enumClass): ?array {
                $result = $this->createEnum($enumClass, $item);

                if (null !== $result) {
                    $carry ??= [];

                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromTargeting(?array $targeting): ?TargetingDTO
    {
        if (null === $targeting) {
            return null;
        }

        return new TargetingDTO(
            $targeting['country'] ?? null,
            $targeting['cities'] ?? null,
            $targeting['regions'] ?? null,
            $targeting['zips'] ?? null,
            $targeting['genders'] ?? null,
            $targeting['college_networks'] ?? null,
            $targeting['work_networks'] ?? null,
            $targeting['age_min'] ?? null,
            $targeting['age_max'] ?? null,
            $targeting['education_statuses'] ?? null,
            $targeting['college_years'] ?? null,
            $targeting['college_majors'] ?? null,
            $targeting['political_views'] ?? null,
            $targeting['relationship_statuses'] ?? null,
            $targeting['interests'] ?? null,
            $targeting['keywords'] ?? null,
            $targeting['interested_in'] ?? null,
            $targeting['user_clusters'] ?? null,
            $targeting['user_clusters2'] ?? null,
            $targeting['user_clusters3'] ?? null,
            $targeting['user_adclusters'] ?? null,
            $targeting['excluded_user_adclusters'] ?? null,
            $targeting['custom_audiences'] ?? null,
            $targeting['excluded_custom_audiences'] ?? null,
            $targeting['locales'] ?? null,
            $targeting['radius'] ?? null,
            $targeting['connections'] ?? null,
            $targeting['excluded_connections'] ?? null,
            $targeting['friends_of_connections'] ?? null,
            $targeting['countries'] ?? null,
            $targeting['excluded_user_clusters'] ?? null,
            $targeting['adgroup_id'] ?? null,
            $targeting['user_event'] ?? null,
            $targeting['qrt_versions'] ?? null,
            $targeting['page_types'] ?? null,
            $targeting['user_os'] ?? null,
            $targeting['user_device'] ?? null,
            $targeting['action_spec'] ?? null,
            $targeting['action_spec_friend'] ?? null,
            $targeting['action_spec_excluded'] ?? null,
            $targeting['geo_locations'] ?? null,
            $targeting['excluded_geo_locations'] ?? null,
            $targeting['targeted_entities'] ?? null,
            $targeting['conjunctive_user_adclusters'] ?? null,
            $targeting['wireless_carrier'] ?? null,
            $targeting['site_category'] ?? null,
            $targeting['work_positions'] ?? null,
            $targeting['work_employers'] ?? null,
            $targeting['education_majors'] ?? null,
            $targeting['education_schools'] ?? null,
            $targeting['family_statuses'] ?? null,
            $targeting['life_events'] ?? null,
            $targeting['behaviors'] ?? null,
            $targeting['travel_status'] ?? null,
            $targeting['industries'] ?? null,
            $targeting['politics'] ?? null,
            $targeting['markets'] ?? null,
            $targeting['income'] ?? null,
            $targeting['net_worth'] ?? null,
            $targeting['home_type'] ?? null,
            $targeting['home_ownership'] ?? null,
            $targeting['home_value'] ?? null,
            $targeting['ethnic_affinity'] ?? null,
            $targeting['generation'] ?? null,
            $targeting['household_composition'] ?? null,
            $targeting['moms'] ?? null,
            $targeting['office_type'] ?? null,
            $targeting['interest_clusters_expansion'] ?? null,
            $targeting['dynamic_audience_ids'] ?? null,
            $targeting['product_audience_specs'] ?? null,
            $targeting['excluded_product_audience_specs'] ?? null,
            $targeting['exclusions'] ?? null,
            $targeting['flexible_spec'] ?? null,
            $targeting['engagement_specs'] ?? null,
            $targeting['excluded_engagement_specs'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPageRestaurantServices(?array $pageRestaurantServices): ?PageRestaurantServicesDTO
    {
        if (null === $pageRestaurantServices) {
            return null;
        }

        return new PageRestaurantServicesDTO(
            $pageRestaurantServices['catering'],
            $pageRestaurantServices['delivery'],
            $pageRestaurantServices['groups'],
            $pageRestaurantServices['kids'],
            $pageRestaurantServices['outdoor'],
            $pageRestaurantServices['pickup'],
            $pageRestaurantServices['reserve'],
            $pageRestaurantServices['takeout'],
            $pageRestaurantServices['waiter'],
            $pageRestaurantServices['walkins']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPageRestaurantSpecialties(
        ?array $pageRestaurantSpecialties
    ): ?PageRestaurantSpecialtiesDTO {
        if (null === $pageRestaurantSpecialties) {
            return null;
        }

        return new PageRestaurantSpecialtiesDTO(
            $pageRestaurantSpecialties['breakfast'],
            $pageRestaurantSpecialties['coffee'],
            $pageRestaurantSpecialties['dinner'],
            $pageRestaurantSpecialties['drinks'],
            $pageRestaurantSpecialties['lunch']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPageStartInfo(?array $pageStartInfo): ?PageStartInfoDTO
    {
        if (null === $pageStartInfo) {
            return null;
        }

        return new PageStartInfoDTO(
            $this->createDTOFromPageStartDate($pageStartInfo['date']),
            $pageStartInfo['type']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPageStartDate(?array $pageStartDate): ?PageStartDateDTO
    {
        if (null === $pageStartDate) {
            return null;
        }

        return new PageStartDateDTO(
            $pageStartDate['day'],
            $pageStartDate['month'],
            $pageStartDate['year']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromVoipInfo(?array $voipInfo): ?VoipInfoDTO
    {
        if (null === $voipInfo) {
            return null;
        }

        return new VoipInfoDTO(
            $voipInfo['has_mobile_app'],
            $voipInfo['has_permission'],
            $voipInfo['is_callable'],
            $voipInfo['is_callable_webrtc'],
            $voipInfo['is_pushable'],
            $voipInfo['reason_code'],
            $voipInfo['reason_description']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromExtendedCreditInvoiceGroup(
        ?array $extendedCreditInvoiceGroup
    ): ?ExtendedCreditInvoiceGroupDTO {
        if (null === $extendedCreditInvoiceGroup) {
            return null;
        }

        return new ExtendedCreditInvoiceGroupDTO(
            $extendedCreditInvoiceGroup['id'],
            $extendedCreditInvoiceGroup['auto_enroll'] ?? null,
            $extendedCreditInvoiceGroup['customer_po_number'] ?? null,
            $this->createDTOFromExtendedCreditEmail($extendedCreditInvoiceGroup['email'] ?? null),
            $this->checkArrayOfStrings(...($extendedCreditInvoiceGroup['emails'] ?? [null])),
            $extendedCreditInvoiceGroup['name'],
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromExtendedCreditEmail(?array $extendedCreditEmail): ?ExtendedCreditEmailDTO
    {
        if (null === $extendedCreditEmail) {
            return null;
        }

        return new ExtendedCreditEmailDTO(
            $extendedCreditEmail
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromDeliveryCheck(?array $deliveryCheck): ?DeliveryCheckDTO
    {
        if (null === $deliveryCheck) {
            return null;
        }

        return new DeliveryCheckDTO(
            $deliveryCheck
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromFundingSourceDetails(?array $fundingSourceDetails): ?FundingSourceDetailsDTO
    {
        if (null === $fundingSourceDetails) {
            return null;
        }

        return new FundingSourceDetailsDTO($fundingSourceDetails);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromReachFrequencySpec(?array $reachFrequencySpec): ?ReachFrequencySpecDTO
    {
        if (null === $reachFrequencySpec) {
            return null;
        }

        return new ReachFrequencySpecDTO($reachFrequencySpec);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdBidAdjustments(?array $adBidAdjustments): ?AdBidAdjustmentsDTO
    {
        if (null === $adBidAdjustments) {
            return null;
        }

        return new AdBidAdjustmentsDTO(
            $adBidAdjustments
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdCampaignBidConstraint(?array $adCampaignBidConstraint): ?AdCampaignBidConstraintDTO
    {
        if (null === $adCampaignBidConstraint) {
            return null;
        }

        return new AdCampaignBidConstraintDTO(
            $adCampaignBidConstraint
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromCampaign(?array $campaign): ?CampaignDTO
    {
        if (null === $campaign) {
            return null;
        }

        return new CampaignDTO(
            $campaign
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromContextualBundlingSpec(?array $contextualBundlingSpec): ?ContextualBundlingSpecDTO
    {
        if (null === $contextualBundlingSpec) {
            return null;
        }

        return new ContextualBundlingSpecDTO(
            $contextualBundlingSpec
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdCampaignFrequencyControlSpecs(
        ?array $adCampaignFrequencyControlSpecs
    ): ?AdCampaignFrequencyControlSpecsDTO {
        if (null === $adCampaignFrequencyControlSpecs) {
            return null;
        }

        return new AdCampaignFrequencyControlSpecsDTO(
            $this->createEnum(AdCampaignFrequencyControlSpecsEnum::class, $adCampaignFrequencyControlSpecs['event']),
            $adCampaignFrequencyControlSpecs['interval_days'],
            $adCampaignFrequencyControlSpecs['max_frequency'],
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdCampaignIssuesInfo(?array $adCampaignIssuesInfo): ?AdCampaignIssuesInfoDTO
    {
        if (null === $adCampaignIssuesInfo) {
            return null;
        }

        return new AdCampaignIssuesInfoDTO(
            $adCampaignIssuesInfo['error_code'],
            $adCampaignIssuesInfo['error_message'],
            $adCampaignIssuesInfo['error_summary'],
            $adCampaignIssuesInfo['error_type'],
            $adCampaignIssuesInfo['level']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdCampaignLearningStageInfo(
        ?array $adCampaignLearningStageInfo
    ): ?AdCampaignLearningStageInfoDTO {
        if (null === $adCampaignLearningStageInfo) {
            return null;
        }

        return new AdCampaignLearningStageInfoDTO(
            $this->checkArrayOfStrings(...$adCampaignLearningStageInfo['attribution_windows']),
            $adCampaignLearningStageInfo['conversions'],
            $adCampaignLearningStageInfo['last_sig_edit_ts'],
            $this->createEnum(AdCampaignLearningStageInfoStatusEnum::class, $adCampaignLearningStageInfo['status'])
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdPromotedObject(?array $adPromotedObject): ?AdPromotedObjectDTO
    {
        if (null === $adPromotedObject) {
            return null;
        }

        return new AdPromotedObjectDTO(
            $adPromotedObject['application_id'],
            $adPromotedObject['conversion_goal_id'],
            $adPromotedObject['custom_conversion_id'],
            $adPromotedObject['custom_event_str'],
            $this->createEnum(CustomEventTypeEnum::class, $adPromotedObject['custom_event_type']),
            $adPromotedObject['event_id'],
            $adPromotedObject['object_store_url'],
            $adPromotedObject['offer_id'],
            $adPromotedObject['offline_conversion_data_set_id'],
            $adPromotedObject['offsite_conversion_event_id'],
            $adPromotedObject['page_id'],
            $adPromotedObject['pixel_aggregation_rule'],
            $adPromotedObject['pixel_id'],
            $adPromotedObject['pixel_rule'],
            $adPromotedObject['place_page_set_id'],
            $adPromotedObject['product_catalog_id'],
            $adPromotedObject['product_set_id'],
            $adPromotedObject['retention_days']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdRecommendations(?array $adRecommendations): ?array
    {
        return array_reduce(
            $adRecommendations ?? [],
            function ($carry, $item): ?array {
                $result = $this->createDTOFromAdRecommendation($item);

                if (null !== $result) {
                    $carry   ??= [];
                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdRecommendation(?array $adRecommendation): ?AdRecommendationDTO
    {
        if (null === $adRecommendation) {
            return null;
        }

        return new AdRecommendationDTO(
            $adRecommendation['blame_field'],
            $adRecommendation['code'],
            $this->createEnum(AdRecommendationConfidenceEnum::class, $adRecommendation['confidence']),
            $this->createEnum(AdRecommendationImportanceEnum::class, $adRecommendation['importance']),
            $adRecommendation['message'],
            $this->createDTOFromAdRecommendationData($adRecommendation['recommendation_data']),
            $adRecommendation['title'],
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAdRecommendationData(?array $adRecommendationData): ?AdRecommendationDataDTO
    {
        if (null === $adRecommendationData) {
            return null;
        }

        return new AdRecommendationDataDTO(
            $adRecommendationData
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromPost(?array $post): ?PostDTO
    {
        if (null === $post) {
            return null;
        }

        return new PostDTO(
            $post['id'] ?? null,
            $post['actions'] ?? null,
            $this->createDTOFromUserApplicationBusinessUser($post['admin_creator'] ?? null),
            $post['allowed_advertising_objectives'] ?? null,
            $this->createDTOFromApplication($post['application'] ?? null),
            $this->createDateTimeImmutableFromDateTime($post['backdated_time'] ?? null),
            $post['call_to_action'] ?? null,
            $post['can_reply_privately'] ?? null,
            $post['caption'] ?? null,
            $post['child_attachments'] ?? null,
            $post['comments_mirroring_domain'] ?? null,
            $this->createDTOFromCoordinate($post['coordinates'] ?? null),
            $this->createDateTimeImmutableFromDateTime($post['created_time'] ?? null),
            $post['description'] ?? null,
            $this->createDTOFromEvent($post['event'] ?? null),
            $post['expanded_height'] ?? null,
            $post['expanded_width'] ?? null,
            $this->createDTOFromFeedTargeting($post['feed_targeting'] ?? null),
            $this->createDTOFromUserPage($post['from'] ?? null),
            $post['full_picture'] ?? null,
            $post['height'] ?? null,
            $post['icon'] ?? null,
            $this->createEnum(InstagramEligibilityEnum::class, $post['instagram_eligibility'] ?? null),
            $post['is_app_share'] ?? null,
            $post['is_eligible_for_promotion'] ?? null,
            $post['is_expired'] ?? null,
            $post['is_hidden'] ?? null,
            $post['is_inline_created'] ?? null,
            $post['is_instagram_eligible'] ?? null,
            $post['is_popular'] ?? null,
            $post['is_published'] ?? null,
            $post['is_spherical'] ?? null,
            $post['link'] ?? null,
            $post['message'] ?? null,
            $post['message_tags'] ?? null,
            $post['multi_share_end_card'] ?? null,
            $post['multi_share_optimized'] ?? null,
            $post['name'] ?? null,
            $post['object_id'] ?? null,
            $post['parent_id'] ?? null,
            $post['permalink_url'] ?? null,
            $this->createDTOFromPlace($post['place'] ?? null),
            $this->createDTOFromPrivacy($post['privacy'] ?? null),
            $post['promotable_id'] ?? null,
            $post['properties'] ?? null,
            $post['scheduled_publish_time'] ?? null,
            $this->createDTOFromShare($post['shares'] ?? null),
            $post['source'] ?? null,
            $post['status_type'] ?? null,
            $post['story'] ?? null,
            $post['story_tags'] ?? null,
            $post['subscribed'] ?? null,
            $this->createDTOFromProfile($post['target'] ?? null),
            $this->createDTOFromTargeting($post['targeting'] ?? null),
            $post['timeline_visibility'] ?? null,
            $post['type'] ?? null,
            $this->createDateTimeImmutableFromDateTime($post['updated_time'] ?? null),
            $this->createDTOFromUserPage($post['via'] ?? null),
            $post['video_buying_eligibility'] ?? null,
            $post['width'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromUserApplicationBusinessUser(
        ?array $userApplicationBusinessUser
    ): null|UserDTO|ApplicationDTO|BusinessUserDTO {
        if (null === $userApplicationBusinessUser) {
            return null;
        }

        try {
            return $this->createDTOFromApplication($userApplicationBusinessUser);
        } catch (Error|Exception $eApplication) {
            // TODO catch the error or the exception
            try {
                return $this->createDTOFromBusinessUser($userApplicationBusinessUser);
            } catch (Error|Exception $eBusinessUser) {
                // TODO catch the error or the exception
                try {
                    return $this->createDTOFromUser($userApplicationBusinessUser);
                } catch (Error|Exception $eUser) {
                    // TODO catch the error or the exception
                }
            }
        }

        return null;
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromApplication(?array $application): ?ApplicationDTO
    {
        if (null === $application) {
            return null;
        }

        return new ApplicationDTO(
            $application['id'],
            $application['aam_rules'] ?? null,
            $application['an_ad_space_limit'] ?? null,
            $this->checkArrayOfStrings(...($application['an_platforms'] ?? [null])),
            $this->checkArrayOfStrings(...($application['app_domains'] ?? [null])),
            $this->createDTOFromApplicationAppEventsConfig($application['app_events_config'] ?? null),
            $application['app_install_tracked'] ?? null,
            $application['app_name'] ?? null,
            $this->createDTOFromBindings($application['app_signals_binding_ios'] ?? null),
            $application['app_type'] ?? null,
            $application['auth_dialog_data_help_url'] ?? null,
            $application['auth_dialog_headline'] ?? null,
            $application['auth_dialog_perms_explanation'] ?? null,
            $application['auth_referral_default_activity_privacy'] ?? null,
            $application['auth_referral_enabled'] ?? null,
            $this->checkArrayOfStrings(...($application['auth_referral_extended_perms'] ?? [null])),
            $this->checkArrayOfStrings(...($application['auth_referral_friend_perms'] ?? [null])),
            $application['auth_referral_response_type'] ?? null,
            $this->checkArrayOfStrings(...($application['auth_referral_user_perms'] ?? [null])),
            $application['canvas_fluid_height'] ?? null,
            $application['canvas_fluid_width'] ?? null,
            $application['canvas_url'] ?? null,
            $application['category'],
            $application['client_config'] ?? null,
            $application['company'] ?? null,
            $application['configured_ios_sso'] ?? null,
            $application['contact_email'] ?? null,
            $this->createDateTimeImmutableFromDateTime($application['created_time'] ?? null),
            $application['creator_uid'] ?? null,
            $application['daily_active_users'] ?? null,
            $application['daily_active_users_rank'] ?? null,
            $application['deauth_callback_url'] ?? null,
            $application['default_share_mode'] ?? null,
            $application['description'],
            $application['financial_id'] ?? null,
            $application['hosting_url'] ?? null,
            $application['icon_url'] ?? null,
            $this->checkArrayOfStrings(...($application['ios_bundle_id'] ?? [null])),
            $application['ios_supports_native_proxy_auth_flow'] ?? null,
            $application['ios_supports_system_auth'] ?? null,
            $application['ipad_app_store_id'] ?? null,
            $application['iphone_app_store_id'] ?? null,
            $this->createDTOFromApplicationSDKInfo($application['latest_sdk_version'] ?? null),
            $application['link'],
            $application['logging_token'] ?? null,
            $application['logo_url'] ?? null,
            $this->checkArrayOfBooleans(...($application['migrations'] ?? [null])),
            $application['mobile_profile_section_url'] ?? null,
            $application['mobile_web_url'] ?? null,
            $application['monthly_active_users'] ?? null,
            $application['monthly_active_users_rank'] ?? null,
            $application['name'],
            $application['namespace'],
            $this->createDTOFromApplicationObjectStoreURLs($application['object_store_urls'] ?? null),
            $application['page_tab_default_name'] ?? null,
            $application['page_tab_url'] ?? null,
            $application['photo_url'] ?? null,
            $application['privacy_policy_url'] ?? null,
            $application['profile_section_url'] ?? null,
            $application['property_id'] ?? null,
            $this->checkArrayOfStrings(...($application['real_time_mode_devices'] ?? [null])),
            $this->createDTOFromApplicationRestrictionInfo($application['restrictions'] ?? null),
            $application['restrictive_data_filter_params'] ?? null,
            $application['secure_canvas_url'] ?? null,
            $application['secure_page_tab_url'] ?? null,
            $application['server_ip_whitelist'] ?? null,
            $application['social_discovery'] ?? null,
            $application['subcategory'] ?? null,
            $application['suggested_events_setting'] ?? null,
            $this->createEnum(SupportedPlatformsEnum::class, $application['supported_platforms'] ?? null),
            $application['terms_of_service_url'] ?? null,
            $application['url_scheme_suffix'] ?? null,
            $application['user_support_email'] ?? null,
            $application['user_support_url'] ?? null,
            $application['website_url'] ?? null,
            $application['weekly_active_users'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromApplicationAppEventsConfig(
        ?array $applicationAppEventsConfig
    ): ?ApplicationAppEventsConfigDTO {
        if (null === $applicationAppEventsConfig) {
            return null;
        }

        return new ApplicationAppEventsConfigDTO(
            $applicationAppEventsConfig
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromBindings(?array $bindings): ?array
    {
        return array_reduce(
            $bindings ?? [],
            function ($carry, $item): ?array {
                $result = $this->createDTOFromBinding($item);

                if (null !== $result) {
                    $carry   ??= [];
                    $carry[] = $result;
                }

                return $carry;
            }
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromBinding(?array $binding): ?BindingDTO
    {
        if (null === $binding) {
            return null;
        }

        return new BindingDTO(
            $binding
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromApplicationSDKInfo(?array $applicationSDKInfo): ?ApplicationSDKInfoDTO
    {
        if (null === $applicationSDKInfo) {
            return null;
        }

        return new ApplicationSDKInfoDTO(
            $applicationSDKInfo
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromApplicationObjectStoreURLs(
        ?array $applicationObjectStoreURLs
    ): ?ApplicationObjectStoreURLsDTO {
        if (null === $applicationObjectStoreURLs) {
            return null;
        }

        return new ApplicationObjectStoreURLsDTO(
            $applicationObjectStoreURLs['amazon_app_store'],
            $applicationObjectStoreURLs['fb_canvas'],
            $applicationObjectStoreURLs['fb_gameroom'],
            $applicationObjectStoreURLs['google_play'],
            $applicationObjectStoreURLs['instant_game'],
            $applicationObjectStoreURLs['itunes'],
            $applicationObjectStoreURLs['itunes_ipad'],
            $applicationObjectStoreURLs['windows_10_store']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromApplicationRestrictionInfo(
        ?array $applicationRestrictionInfo
    ): ?ApplicationRestrictionInfoDTO {
        if (null === $applicationRestrictionInfo) {
            return null;
        }

        return new ApplicationRestrictionInfoDTO(
            $applicationRestrictionInfo['age'],
            $applicationRestrictionInfo['age_distribution'],
            $applicationRestrictionInfo['location'],
            $applicationRestrictionInfo['type']
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromCoordinate(?array $coordinate): ?CoordinateDTO
    {
        if (null === $coordinate) {
            return null;
        }

        return new CoordinateDTO(
            $coordinate['checkin_id'] ?? null,
            $coordinate['author_uid'] ?? null,
            $coordinate['page_id'] ?? null,
            $coordinate['target_id'] ?? null,
            $coordinate['target_href'] ?? null,
            $coordinate['coords'] ?? null,
            $coordinate['tagged_uids'] ?? null,
            $coordinate['timestamp'] ?? null,
            $coordinate['message'] ?? null,
            $coordinate['target_type'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromFeedTargeting(?array $feedTargeting): ?FeedTargetingDTO
    {
        if (null === $feedTargeting) {
            return null;
        }

        return new FeedTargetingDTO(
            $feedTargeting['country'] ?? null,
            $feedTargeting['cities'] ?? null,
            $feedTargeting['regions'] ?? null,
            $feedTargeting['genders'] ?? null,
            $feedTargeting['age_min'] ?? null,
            $feedTargeting['age_max'] ?? null,
            $feedTargeting['education_statuses'] ?? null,
            $feedTargeting['college_years'] ?? null,
            $feedTargeting['relationship_statuses'] ?? null,
            $feedTargeting['interests'] ?? null,
            $feedTargeting['interested_in'] ?? null,
            $feedTargeting['user_adclusters'] ?? null,
            $feedTargeting['locales'] ?? null,
            $feedTargeting['countries'] ?? null,
            $feedTargeting['geo_locations'] ?? null,
            $feedTargeting['work_positions'] ?? null,
            $feedTargeting['work_employers'] ?? null,
            $feedTargeting['education_majors'] ?? null,
            $feedTargeting['education_schools'] ?? null,
            $feedTargeting['family_statuses'] ?? null,
            $feedTargeting['life_events'] ?? null,
            $feedTargeting['industries'] ?? null,
            $feedTargeting['politics'] ?? null,
            $feedTargeting['ethnic_affinity'] ?? null,
            $feedTargeting['generation'] ?? null,
            $feedTargeting['fan_of'] ?? null,
            $feedTargeting['relevant_until_ts'] ?? null
        );
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromShare(?array $share): ?ShareDTO
    {
        if (null === $share) {
            return null;
        }

        return new ShareDTO($share['count']);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromProfile(?array $profile): ?ProfileDTO
    {
        if (null === $profile) {
            return null;
        }

        return new ProfileDTO($profile);
    }

    /**
     * @inheritDoc
     */
    public function createDTOFromAccessToken(?array $accessToken): ?AccessTokenDTO
    {
        if (null === $accessToken) {
            return null;
        }

        return new AccessTokenDTO($accessToken['access_token'], $accessToken['token_type']);
    }

    /**
     * @inheritDoc
     */
    public function checkArrayOfStrings(?string ...$arrayOfStrings): ?array
    {
        return array_reduce($arrayOfStrings, static function (?array $carry, ?string $item): ?array {
            if (null !== $item) {
                $carry   ??= [];
                $carry[] = $item;
            }

            return $carry;
        });
    }

    /**
     * @inheritDoc
     */
    public function checkArrayOfIntegers(?int ...$arrayOfIntegers): ?array
    {
        return array_reduce($arrayOfIntegers, static function (?array $carry, ?int $item): ?array {
            if (null !== $item) {
                $carry   ??= [];
                $carry[] = $item;
            }

            return $carry;
        });
    }

    /**
     * @inheritDoc
     */
    public function checkArrayOfBooleans(?bool ...$arrayOfBooleans): ?array
    {
        return array_reduce($arrayOfBooleans, static function (?array $carry, ?bool $item): ?array {
            if (null !== $item) {
                $carry   ??= [];
                $carry[] = $item;
            }

            return $carry;
        });
    }

    /**
     * @param array|null $map
     *
     * @return array|string[]|null
     */
    public function checkArrayAsMap(?array $map): ?array
    {
        foreach ($map ?? [] as $key => $item) {
            if (is_numeric($key) || !is_string($item)) {
                return null;
            }
        }

        return $map;
    }
}
