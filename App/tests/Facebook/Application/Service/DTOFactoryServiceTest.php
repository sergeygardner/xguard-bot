<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Application\Service;

use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdAccountDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdAccountPromotableObjectsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdBidAdjustmentsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdCampaignBidConstraintDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdCampaignFrequencyControlSpecsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdCampaignIssuesInfoDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdCampaignLearningStageInfoDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdLabelDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdPromotedObjectDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdRecommendationDataDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdRecommendationDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AdSetDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AgencyClientDeclarationDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AgeRangeDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ApplicationAppEventsConfigDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ApplicationDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ApplicationObjectStoreURLsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ApplicationRestrictionInfoDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ApplicationSDKInfoDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\AttributionSpecDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\Authentication\AccessTokenDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\BindingDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\BusinessDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\BusinessManagedPartnerEligibilityDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\BusinessUserDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\CampaignDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ChildEventDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ContextualBundlingSpecDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\CoordinateDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\CopyrightAttributionInsightsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\CoverPhotoDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\CurrencyDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\DeliveryCheckDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\EngagementDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\EventDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ExperienceDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ExtendedCreditEmailDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ExtendedCreditInvoiceGroupDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\FeedTargetingDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\FundingSourceDetailsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\IGUserDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\LocationDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\MailingAddressDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ManagedPartnerBusinessDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\MessagingFeatureStatusDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\MessengerDestinationPageWelcomeMessageDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\MusicVideoCopyrightDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PageCategoryDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PageDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PageParkingDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PagePaymentOptionsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PageRestaurantServicesDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PageRestaurantSpecialtiesDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PageStartDateDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PageStartInfoDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PaymentPricePointsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PlaceDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PostDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\PrivacyDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ProfileDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ReachFrequencySpecDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\ShareDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\SystemUserDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\TargetingDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\UserDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\VideoDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\VideoFormatDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\VideoStatusDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\VideoUploadLimitsDTOTest;
use Test\XGuard\Bot\Facebook\Domain\DTO\VoipInfoDTOTest;
use Throwable;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class DTOFactoryServiceTest extends TestCase
{

    /**
     * @var string|null
     */
    private ?string $name;

    /**
     * @var array
     */
    private array $data;

    /**
     * @var mixed
     */
    private mixed $dataName;

    /**
     * @param string|null $name
     * @param array       $data
     * @param mixed       $dataName
     */
    public function __construct(?string $name = null, array $data = [], mixed $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->name     = 'testConstruct';
        $this->data     = $data;
        $this->dataName = $dataName;
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdAccount(): void
    {
        $testCase = (new AdAccountDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdAccountDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdAccountPromotableObjects(): void
    {
        $testCase = (new AdAccountPromotableObjectsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdAccountPromotableObjectsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdBidAdjustments(): void
    {
        $testCase = (new AdBidAdjustmentsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdBidAdjustmentsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdCampaignBidConstraint(): void
    {
        $testCase = (new AdCampaignBidConstraintDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdCampaignBidConstraintDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdCampaignFrequencyControlSpecs(): void
    {
        $testCase = (new AdCampaignFrequencyControlSpecsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdCampaignFrequencyControlSpecsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdCampaignIssuesInfo(): void
    {
        $testCase = (new AdCampaignIssuesInfoDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdCampaignIssuesInfoDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdCampaignLearningStageInfo(): void
    {
        $testCase = (new AdCampaignLearningStageInfoDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdCampaignLearningStageInfoDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdLabels(): void
    {
        $this->testCreateDTOFromAdLabel();
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdLabel(): void
    {
        $testCase = (new AdLabelDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdLabelDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdPromotedObject(): void
    {
        $testCase = (new AdPromotedObjectDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdPromotedObjectDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdRecommendationData(): void
    {
        $testCase = (new AdRecommendationDataDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdRecommendationDataDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdRecommendations(): void
    {
        $this->testCreateDTOFromAdRecommendation();
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdRecommendation(): void
    {
        $testCase = (new AdRecommendationDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdRecommendationDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAdSet(): void
    {
        $testCase = (new AdSetDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AdSetDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAgencyClientDeclaration(): void
    {
        $testCase = (new AgencyClientDeclarationDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AgencyClientDeclarationDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAgeRange(): void
    {
        $testCase = (new AgeRangeDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AgeRangeDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromApplicationAppEventsConfig(): void
    {
        $testCase = (new ApplicationAppEventsConfigDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ApplicationAppEventsConfigDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromApplication(): void
    {
        $testCase = (new ApplicationDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ApplicationDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromApplicationObjectStoreURLs(): void
    {
        $testCase = (new ApplicationObjectStoreURLsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ApplicationObjectStoreURLsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromApplicationRestrictionInfo(): void
    {
        $testCase = (new ApplicationRestrictionInfoDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ApplicationRestrictionInfoDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromApplicationSDKInfo(): void
    {
        $testCase = (new ApplicationSDKInfoDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ApplicationSDKInfoDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAttributionSpec(): void
    {
        $testCase = (new AttributionSpecDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AttributionSpecDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromBindings(): void
    {
        $this->testCreateDTOFromBinding();
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromBinding(): void
    {
        $testCase = (new BindingDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new BindingDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromBusiness(): void
    {
        $testCase = (new BusinessDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new BusinessDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromBusinessManagedPartnerEligibility(): void
    {
        $testCase = (new BusinessManagedPartnerEligibilityDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new BusinessManagedPartnerEligibilityDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromBusinessUser(): void
    {
        $testCase = (new BusinessUserDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new BusinessUserDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromCampaign(): void
    {
        $testCase = (new CampaignDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new CampaignDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromChildEvents(): void
    {
        $this->testCreateDTOFromChildEvent();
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromChildEvent(): void
    {
        $testCase = (new ChildEventDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ChildEventDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromContextualBundlingSpec(): void
    {
        $testCase = (new ContextualBundlingSpecDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ContextualBundlingSpecDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromCoordinate(): void
    {
        $testCase = (new CoordinateDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new CoordinateDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromCopyrightAttributionInsights(): void
    {
        $testCase = (new CopyrightAttributionInsightsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new CopyrightAttributionInsightsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromCoverPhoto(): void
    {
        $testCase = (new CoverPhotoDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new CoverPhotoDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromCurrency(): void
    {
        $testCase = (new CurrencyDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new CurrencyDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromDeliveryCheck(): void
    {
        $testCase = (new DeliveryCheckDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new DeliveryCheckDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromEngagement(): void
    {
        $testCase = (new EngagementDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new EngagementDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromEvent(): void
    {
        $testCase = (new EventDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new EventDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromExperiences(): void
    {
        $this->testCreateDTOFromExperience();
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromExperience(): void
    {
        $testCase = (new ExperienceDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ExperienceDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromExtendedCreditEmail(): void
    {
        $testCase = (new ExtendedCreditEmailDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ExtendedCreditEmailDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromExtendedCreditInvoiceGroup(): void
    {
        $testCase = (new ExtendedCreditInvoiceGroupDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ExtendedCreditInvoiceGroupDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromFeedTargeting(): void
    {
        $testCase = (new FeedTargetingDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new FeedTargetingDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromFundingSourceDetails(): void
    {
        $testCase = (new FundingSourceDetailsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new FundingSourceDetailsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromIGUser(): void
    {
        $testCase = (new IGUserDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new IGUserDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromLocation(): void
    {
        $testCase = (new LocationDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new LocationDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMailingAddress(): void
    {
        $testCase = (new MailingAddressDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new MailingAddressDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromManagedPartnerBusiness(): void
    {
        $testCase = (new ManagedPartnerBusinessDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ManagedPartnerBusinessDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMessagingFeatureStatus(): void
    {
        $testCase = (new MessagingFeatureStatusDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new MessagingFeatureStatusDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMessengerDestinationPageWelcomeMessage(): void
    {
        $testCase = (new MessengerDestinationPageWelcomeMessageDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new MessengerDestinationPageWelcomeMessageDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromMusicVideoCopyright(): void
    {
        $testCase = (new MusicVideoCopyrightDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new MusicVideoCopyrightDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPageCategories(): void
    {
        $this->testCreateDTOFromPageCategory();
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPageCategory(): void
    {
        $testCase = (new PageCategoryDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PageCategoryDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPage(): void
    {
        $testCase = (new PageDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PageDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPageParking(): void
    {
        $testCase = (new PageParkingDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PageParkingDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPagePaymentOptions(): void
    {
        $testCase = (new PagePaymentOptionsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PagePaymentOptionsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPageRestaurantServices(): void
    {
        $testCase = (new PageRestaurantServicesDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PageRestaurantServicesDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPageRestaurantSpecialties(): void
    {
        $testCase = (new PageRestaurantSpecialtiesDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PageRestaurantSpecialtiesDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPageStartDate(): void
    {
        $testCase = (new PageStartDateDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PageStartDateDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPageStartInfo(): void
    {
        $testCase = (new PageStartInfoDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PageStartInfoDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPaymentPricePoints(): void
    {
        $testCase = (new PaymentPricePointsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PaymentPricePointsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPlace(): void
    {
        $testCase = (new PlaceDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PlaceDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPost(): void
    {
        $testCase = (new PostDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PostDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromPrivacy(): void
    {
        $testCase = (new PrivacyDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new PrivacyDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromProfile(): void
    {
        $testCase = (new ProfileDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ProfileDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromReachFrequencySpec(): void
    {
        $testCase = (new ReachFrequencySpecDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ReachFrequencySpecDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromShare(): void
    {
        $testCase = (new ShareDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new ShareDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromSystemUser(): void
    {
        $testCase = (new SystemUserDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new SystemUserDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromTargeting(): void
    {
        $testCase = (new TargetingDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new TargetingDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromUsers(): void
    {
        $this->testCreateDTOFromUser();
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromUser(): void
    {
        $testCase = (new UserDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new UserDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideo(): void
    {
        $testCase = (new VideoDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new VideoDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoFormats(): void
    {
        $this->testCreateDTOFromVideoFormat();
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoFormat(): void
    {
        $testCase = (new VideoFormatDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new VideoFormatDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }

    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoStatus(): void
    {
        $testCase = (new VideoStatusDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new VideoStatusDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVideoUploadLimits(): void
    {
        $testCase = (new VideoUploadLimitsDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new VideoUploadLimitsDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromVoipInfo(): void
    {
        $testCase = (new VoipInfoDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new VoipInfoDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }


    /**
     * @return void
     */
    public function testCreateDTOFromUserApplicationBusinessUser(): void
    {
        $this->markTestSkipped();
    }


    /**
     * @return void
     */
    public function testCreateDTOFromBusinessUserSystemUser(): void
    {
        $this->markTestSkipped();
    }


    /**
     * @return void
     */
    public function testCreateDTOFromUserPage(): void
    {
        $this->markTestSkipped();
    }


    /**
     * @return void
     */
    public function testCheckArrayOfStrings(): void
    {
        $dtoFactoryService = new DTOFactoryService();
        $request           = ['', '11', 'test'];
        $responseNull      = $dtoFactoryService->checkArrayOfStrings(null);
        $response          = $dtoFactoryService->checkArrayOfStrings(...$request);

        self::assertEquals(null, $responseNull);
        self::assertEquals($request, $response);
    }


    /**
     * @return void
     */
    public function testCheckArrayOfIntegers(): void
    {
        $dtoFactoryService = new DTOFactoryService();
        $request           = [0, 11, -12, PHP_INT_MAX, PHP_INT_MIN];
        $responseNull      = $dtoFactoryService->checkArrayOfIntegers(null);
        $response          = $dtoFactoryService->checkArrayOfIntegers(...$request);

        self::assertEquals(null, $responseNull);
        self::assertEquals($request, $response);
    }


    /**
     * @return void
     */
    public function testCheckArrayOfBooleans(): void
    {
        $dtoFactoryService = new DTOFactoryService();
        $request           = [true, false];
        $responseNull      = $dtoFactoryService->checkArrayOfBooleans(null);
        $response          = $dtoFactoryService->checkArrayOfBooleans(...$request);

        self::assertEquals(null, $responseNull);
        self::assertEquals($request, $response);
    }


    /**
     * @return void
     * @throws Throwable
     */
    public function testCreateDTOFromAccessToken(): void
    {
        $testCase = (new AccessTokenDTOTest($this->name, $this->data, $this->dataName));

        foreach ($testCase->dataProvider() as $dataProvider) {
            (new AccessTokenDTOTest($this->name, $dataProvider, 'dataProvider'))->runTest();
        }
    }
}
