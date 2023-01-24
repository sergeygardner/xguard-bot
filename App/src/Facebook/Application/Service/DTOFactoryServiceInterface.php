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

/**
 *
 */
interface DTOFactoryServiceInterface
{

    /**
     * @param array|null $adAccount
     *
     * @return AdAccountDTO|null
     */
    public function createDTOFromAdAccount(?array $adAccount): ?AdAccountDTO;

    /**
     * @param array|null $adAccountPromotableObjects
     *
     * @return AdAccountPromotableObjectsDTO|null
     */
    public function createDTOFromAdAccountPromotableObjects(
        ?array $adAccountPromotableObjects
    ): ?AdAccountPromotableObjectsDTO;

    /**
     * @param array|null $adBidAdjustments
     *
     * @return AdBidAdjustmentsDTO|null
     */
    public function createDTOFromAdBidAdjustments(?array $adBidAdjustments): ?AdBidAdjustmentsDTO;

    /**
     * @param array|null $adCampaignBidConstraint
     *
     * @return AdCampaignBidConstraintDTO|null
     */
    public function createDTOFromAdCampaignBidConstraint(?array $adCampaignBidConstraint): ?AdCampaignBidConstraintDTO;

    /**
     * @param array|null $adCampaignFrequencyControlSpecs
     *
     * @return AdCampaignFrequencyControlSpecsDTO|null
     */
    public function createDTOFromAdCampaignFrequencyControlSpecs(
        ?array $adCampaignFrequencyControlSpecs
    ): ?AdCampaignFrequencyControlSpecsDTO;

    /**
     * @param array|null $adCampaignIssuesInfo
     *
     * @return AdCampaignIssuesInfoDTO|null
     */
    public function createDTOFromAdCampaignIssuesInfo(?array $adCampaignIssuesInfo): ?AdCampaignIssuesInfoDTO;

    /**
     * @param array|null $adCampaignLearningStageInfo
     *
     * @return AdCampaignLearningStageInfoDTO|null
     */
    public function createDTOFromAdCampaignLearningStageInfo(
        ?array $adCampaignLearningStageInfo
    ): ?AdCampaignLearningStageInfoDTO;

    /**
     * @param array|null $adLabel
     *
     * @return AdLabelDTO|null
     */
    public function createDTOFromAdLabel(?array $adLabel): ?AdLabelDTO;

    /**
     * @param array|null $adLabels
     *
     * @return AdLabelDTO[]|null
     */
    public function createDTOFromAdLabels(?array $adLabels): ?array;

    /**
     * @param array|null $adPromotedObject
     *
     * @return AdPromotedObjectDTO|null
     */
    public function createDTOFromAdPromotedObject(?array $adPromotedObject): ?AdPromotedObjectDTO;

    /**
     * @param array|null $adRecommendationData
     *
     * @return AdRecommendationDataDTO|null
     */
    public function createDTOFromAdRecommendationData(?array $adRecommendationData): ?AdRecommendationDataDTO;

    /**
     * @param array|null $adRecommendation
     *
     * @return AdRecommendationDTO|null
     */
    public function createDTOFromAdRecommendation(?array $adRecommendation): ?AdRecommendationDTO;

    /**
     * @param array|null $adRecommendations
     *
     * @return AdRecommendationDTO[]|null
     */
    public function createDTOFromAdRecommendations(?array $adRecommendations): ?array;

    /**
     * @param array|null $adSet
     *
     * @return AdSetDTO|null
     */
    public function createDTOFromAdSet(?array $adSet): ?AdSetDTO;

    /**
     * @param array|null $agencyClientDeclaration
     *
     * @return AgencyClientDeclarationDTO|null
     */
    public function createDTOFromAgencyClientDeclaration(?array $agencyClientDeclaration): ?AgencyClientDeclarationDTO;

    /**
     * @param array|null $ageRange
     *
     * @return AgeRangeDTO|null
     */
    public function createDTOFromAgeRange(?array $ageRange): ?AgeRangeDTO;

    /**
     * @param array|null $applicationAppEventsConfig
     *
     * @return ApplicationAppEventsConfigDTO|null
     */
    public function createDTOFromApplicationAppEventsConfig(
        ?array $applicationAppEventsConfig
    ): ?ApplicationAppEventsConfigDTO;

    /**
     * @param array|null $application
     *
     * @return ApplicationDTO|null
     */
    public function createDTOFromApplication(?array $application): ?ApplicationDTO;

    /**
     * @param array|null $applicationObjectStoreURLs
     *
     * @return ApplicationObjectStoreURLsDTO|null
     */
    public function createDTOFromApplicationObjectStoreURLs(
        ?array $applicationObjectStoreURLs
    ): ?ApplicationObjectStoreURLsDTO;

    /**
     * @param array|null $applicationRestrictionInfo
     *
     * @return ApplicationRestrictionInfoDTO|null
     */
    public function createDTOFromApplicationRestrictionInfo(
        ?array $applicationRestrictionInfo
    ): ?ApplicationRestrictionInfoDTO;

    /**
     * @param array|null $applicationSDKInfo
     *
     * @return ApplicationSDKInfoDTO|null
     */
    public function createDTOFromApplicationSDKInfo(?array $applicationSDKInfo): ?ApplicationSDKInfoDTO;

    /**
     * @param array|null $attributionSpec
     *
     * @return AttributionSpecDTO|null
     */
    public function createDTOFromAttributionSpec(?array $attributionSpec): ?AttributionSpecDTO;

    /**
     * @param array|null $binding
     *
     * @return BindingDTO|null
     */
    public function createDTOFromBinding(?array $binding): ?BindingDTO;

    /**
     * @param array|null $bindings
     *
     * @return BindingDTO[]|null
     */
    public function createDTOFromBindings(?array $bindings): ?array;

    /**
     * @param array|null $business
     *
     * @return BusinessDTO|null
     */
    public function createDTOFromBusiness(?array $business): ?BusinessDTO;

    /**
     * @param array|null $businessManagedPartnerEligibility
     *
     * @return BusinessManagedPartnerEligibilityDTO|null
     */
    public function createDTOFromBusinessManagedPartnerEligibility(
        ?array $businessManagedPartnerEligibility
    ): ?BusinessManagedPartnerEligibilityDTO;

    /**
     * @param array|null $businessUser
     *
     * @return BusinessUserDTO|null
     */
    public function createDTOFromBusinessUser(?array $businessUser): ?BusinessUserDTO;

    /**
     * @param array|null $campaign
     *
     * @return CampaignDTO|null
     */
    public function createDTOFromCampaign(?array $campaign): ?CampaignDTO;

    /**
     * @param array|null $childEvent
     *
     * @return ChildEventDTO|null
     */
    public function createDTOFromChildEvent(?array $childEvent): ?ChildEventDTO;

    /**
     * @param array|null $childEvents
     *
     * @return ChildEventDTO[]|null
     */
    public function createDTOFromChildEvents(?array $childEvents): ?array;

    /**
     * @param array|null $contextualBundlingSpec
     *
     * @return ContextualBundlingSpecDTO|null
     */
    public function createDTOFromContextualBundlingSpec(?array $contextualBundlingSpec): ?ContextualBundlingSpecDTO;

    /**
     * @param array|null $coordinate
     *
     * @return CoordinateDTO|null
     */
    public function createDTOFromCoordinate(?array $coordinate): ?CoordinateDTO;

    /**
     * @param array|null $copyrightAttributionInsights
     *
     * @return CopyrightAttributionInsightsDTO|null
     */
    public function createDTOFromCopyrightAttributionInsights(
        ?array $copyrightAttributionInsights
    ): ?CopyrightAttributionInsightsDTO;

    /**
     * @param array|null $coverPhoto
     *
     * @return CoverPhotoDTO|null
     */
    public function createDTOFromCoverPhoto(?array $coverPhoto): ?CoverPhotoDTO;

    /**
     * @param array|null $currency
     *
     * @return CurrencyDTO|null
     */
    public function createDTOFromCurrency(?array $currency): ?CurrencyDTO;

    /**
     * @param array|null $deliveryCheck
     *
     * @return DeliveryCheckDTO|null
     */
    public function createDTOFromDeliveryCheck(?array $deliveryCheck): ?DeliveryCheckDTO;

    /**
     * @param array|null $engagement
     *
     * @return EngagementDTO|null
     */
    public function createDTOFromEngagement(?array $engagement): ?EngagementDTO;

    /**
     * @param array|null $event
     *
     * @return EventDTO|null
     */
    public function createDTOFromEvent(?array $event): ?EventDTO;

    /**
     * @param array|null $experience
     *
     * @return ExperienceDTO|null
     */
    public function createDTOFromExperience(?array $experience): ?ExperienceDTO;

    /**
     * @param array|null $experiences
     *
     * @return ExperienceDTO[]|null
     */
    public function createDTOFromExperiences(?array $experiences): ?array;

    /**
     * @param array|null $extendedCreditEmail
     *
     * @return ExtendedCreditEmailDTO|null
     */
    public function createDTOFromExtendedCreditEmail(?array $extendedCreditEmail): ?ExtendedCreditEmailDTO;

    /**
     * @param array|null $extendedCreditInvoiceGroup
     *
     * @return ExtendedCreditInvoiceGroupDTO|null
     */
    public function createDTOFromExtendedCreditInvoiceGroup(
        ?array $extendedCreditInvoiceGroup
    ): ?ExtendedCreditInvoiceGroupDTO;

    /**
     * @param array|null $feedTargeting
     *
     * @return FeedTargetingDTO|null
     */
    public function createDTOFromFeedTargeting(?array $feedTargeting): ?FeedTargetingDTO;

    /**
     * @param array|null $fundingSourceDetails
     *
     * @return FundingSourceDetailsDTO|null
     */
    public function createDTOFromFundingSourceDetails(?array $fundingSourceDetails): ?FundingSourceDetailsDTO;

    /**
     * @param array|null $iGUser
     *
     * @return IGUserDTO|null
     */
    public function createDTOFromIGUser(?array $iGUser): ?IGUserDTO;

    /**
     * @param array|null $location
     *
     * @return LocationDTO|null
     */
    public function createDTOFromLocation(?array $location): ?LocationDTO;

    /**
     * @param array|null $mailingAddress
     *
     * @return MailingAddressDTO|null
     */
    public function createDTOFromMailingAddress(?array $mailingAddress): ?MailingAddressDTO;

    /**
     * @param array|null $managedPartnerBusiness
     *
     * @return ManagedPartnerBusinessDTO|null
     */
    public function createDTOFromManagedPartnerBusiness(?array $managedPartnerBusiness): ?ManagedPartnerBusinessDTO;

    /**
     * @param array|null $messagingFeatureStatus
     *
     * @return MessagingFeatureStatusDTO|null
     */
    public function createDTOFromMessagingFeatureStatus(?array $messagingFeatureStatus): ?MessagingFeatureStatusDTO;

    /**
     * @param array|null $messengerDestinationPageWelcomeMessage
     *
     * @return MessengerDestinationPageWelcomeMessageDTO|null
     */
    public function createDTOFromMessengerDestinationPageWelcomeMessage(
        ?array $messengerDestinationPageWelcomeMessage
    ): ?MessengerDestinationPageWelcomeMessageDTO;

    /**
     * @param array|null $musicVideoCopyright
     *
     * @return MusicVideoCopyrightDTO|null
     */
    public function createDTOFromMusicVideoCopyright(?array $musicVideoCopyright): ?MusicVideoCopyrightDTO;

    /**
     * @param array|null $pageCategory
     *
     * @return PageCategoryDTO|null
     */
    public function createDTOFromPageCategory(?array $pageCategory): ?PageCategoryDTO;

    /**
     * @param array|null $pageCategories
     *
     * @return PageCategoryDTO[]|null
     */
    public function createDTOFromPageCategories(?array $pageCategories): ?array;

    /**
     * @param array|null $page
     *
     * @return PageDTO|null
     */
    public function createDTOFromPage(?array $page): ?PageDTO;

    /**
     * @param array|null $pageParking
     *
     * @return PageParkingDTO|null
     */
    public function createDTOFromPageParking(?array $pageParking): ?PageParkingDTO;

    /**
     * @param array|null $pagePaymentOptions
     *
     * @return PagePaymentOptionsDTO|null
     */
    public function createDTOFromPagePaymentOptions(?array $pagePaymentOptions): ?PagePaymentOptionsDTO;

    /**
     * @param array|null $pageRestaurantServices
     *
     * @return PageRestaurantServicesDTO|null
     */
    public function createDTOFromPageRestaurantServices(?array $pageRestaurantServices): ?PageRestaurantServicesDTO;

    /**
     * @param array|null $pageRestaurantSpecialties
     *
     * @return PageRestaurantSpecialtiesDTO|null
     */
    public function createDTOFromPageRestaurantSpecialties(
        ?array $pageRestaurantSpecialties
    ): ?PageRestaurantSpecialtiesDTO;

    /**
     * @param array|null $pageStartDate
     *
     * @return PageStartDateDTO|null
     */
    public function createDTOFromPageStartDate(?array $pageStartDate): ?PageStartDateDTO;

    /**
     * @param array|null $pageStartInfo
     *
     * @return PageStartInfoDTO|null
     */
    public function createDTOFromPageStartInfo(?array $pageStartInfo): ?PageStartInfoDTO;

    /**
     * @param array|null $paymentPricePoints
     *
     * @return PaymentPricePointsDTO|null
     */
    public function createDTOFromPaymentPricePoints(?array $paymentPricePoints): ?PaymentPricePointsDTO;

    /**
     * @param array|null $place
     *
     * @return PlaceDTO|null
     */
    public function createDTOFromPlace(?array $place): ?PlaceDTO;

    /**
     * @param array|null $post
     *
     * @return PostDTO|null
     */
    public function createDTOFromPost(?array $post): ?PostDTO;

    /**
     * @param array|null $privacy
     *
     * @return PrivacyDTO|null
     */
    public function createDTOFromPrivacy(?array $privacy): ?PrivacyDTO;

    /**
     * @param array|null $profile
     *
     * @return ProfileDTO|null
     */
    public function createDTOFromProfile(?array $profile): ?ProfileDTO;

    /**
     * @param array|null $reachFrequencySpec
     *
     * @return ReachFrequencySpecDTO|null
     */
    public function createDTOFromReachFrequencySpec(?array $reachFrequencySpec): ?ReachFrequencySpecDTO;

    /**
     * @param array|null $share
     *
     * @return ShareDTO|null
     */
    public function createDTOFromShare(?array $share): ?ShareDTO;

    /**
     * @param array|null $systemUser
     *
     * @return SystemUserDTO|null
     */
    public function createDTOFromSystemUser(?array $systemUser): ?SystemUserDTO;

    /**
     * @param array|null $targeting
     *
     * @return TargetingDTO|null
     */
    public function createDTOFromTargeting(?array $targeting): ?TargetingDTO;

    /**
     * @param array|null $user
     *
     * @return UserDTO|null
     */
    public function createDTOFromUser(?array $user): ?UserDTO;

    /**
     * @param array|null $users
     *
     * @return UserDTO[]|null
     */
    public function createDTOFromUsers(?array $users): ?array;

    /**
     * @param array|null $video
     *
     * @return VideoDTO|null
     */
    public function createDTOFromVideo(?array $video): ?VideoDTO;

    /**
     * @param array|null $videoFormat
     *
     * @return VideoFormatDTO|null
     */
    public function createDTOFromVideoFormat(?array $videoFormat): ?VideoFormatDTO;

    /**
     * @param array|null $videoFormats
     *
     * @return VideoFormatDTO[]|null
     */
    public function createDTOFromVideoFormats(?array $videoFormats): ?array;

    /**
     * @param array|null $videoStatus
     *
     * @return VideoStatusDTO|null
     */
    public function createDTOFromVideoStatus(?array $videoStatus): ?VideoStatusDTO;

    /**
     * @param array|null $videoUploadLimits
     *
     * @return VideoUploadLimitsDTO|null
     */
    public function createDTOFromVideoUploadLimits(?array $videoUploadLimits): ?VideoUploadLimitsDTO;

    /**
     * @param array|null $voipInfo
     *
     * @return VoipInfoDTO|null
     */
    public function createDTOFromVoipInfo(?array $voipInfo): ?VoipInfoDTO;

    /**
     * @param array|null $userApplicationBusinessUser
     *
     * @return UserDTO|ApplicationDTO|BusinessUserDTO|null
     */
    public function createDTOFromUserApplicationBusinessUser(
        ?array $userApplicationBusinessUser
    ): null|UserDTO|ApplicationDTO|BusinessUserDTO;

    /**
     * @param array|null $businessUserSystemUser
     *
     * @return BusinessUserDTO|SystemUserDTO|null
     */
    public function createDTOFromBusinessUserSystemUser(
        ?array $businessUserSystemUser
    ): null|BusinessUserDTO|SystemUserDTO;

    /**
     * @param array|null $userPage
     *
     * @return UserDTO|PageDTO|null
     */
    public function createDTOFromUserPage(?array $userPage): null|UserDTO|PageDTO;

    /**
     * @param array|null $accessToken
     *
     * @return AccessTokenDTO|null
     */
    public function createDTOFromAccessToken(?array $accessToken): ?AccessTokenDTO;

    /**
     * @param string|null ...$arrayOfStrings
     *
     * @return string[]|null
     */
    public function checkArrayOfStrings(?string ...$arrayOfStrings): ?array;

    /**
     * @param int|null ...$arrayOfIntegers
     *
     * @return int[]|null
     */
    public function checkArrayOfIntegers(?int ...$arrayOfIntegers): ?array;

    /**
     * @param bool|null ...$arrayOfBooleans
     *
     * @return bool[]|null
     */
    public function checkArrayOfBooleans(?bool ...$arrayOfBooleans): ?array;

    /**
     * @param array|null $map
     *
     * @return string[]|null
     * @example ['KEY'=>'VALUE']
     */
    public function checkArrayAsMap(?array $map): ?array;
}
