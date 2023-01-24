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
use XGuard\Bot\Facebook\Domain\Enum\MessengerAdsQuickRepliesTypeEnum;
use XGuard\Bot\Facebook\Domain\Enum\PickupOptionsEnum;
use XGuard\Bot\Facebook\Domain\Enum\PlaceTypeEnum;
use XGuard\Bot\Facebook\Domain\Enum\TemporaryStatusEnum;
use XGuard\Bot\Facebook\Domain\Enum\VerificationStatusEnum;

/**
 * The class represents a Facebook Page.
 * @see https://developers.facebook.com/docs/graph-api/reference/page/
 */
class PageDTO implements JsonSerializable
{

    /**
     * @param string|null                                    $id                                         The ID representing a Facebook Page.
     * @param string|null                                    $about                                      Information about the Page. Can be read with Page Public Content Access or Page Public Metadata Access. This value maps to the Description setting in the Edit Page Info user interface. Limit of 100 characters.
     * @param string|null                                    $access_token                               The Page's access token. Only returned if the User making the request has a role (other than Live Contributor) on the Page. If your business requires two-factor authentication, the User must also be authenticated
     * @param AdSetDTO|null                                  $ad_campaign                                The Page's currently running promotion campaign
     * @param string|null                                    $affiliation                                Affiliation of this person. Applicable to Pages representing people. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $app_id                                     App ID for app-owned Pages and app Pages
     * @param string|null                                    $artists_we_like                            Artists the band likes. Applicable to Bands. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $attire                                     Dress code of the business. Applicable to Restaurants or Nightlife. It can be one of Casual, Dressy or Unspecified. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $awards                                     The awards' information of the film. Applicable to Films. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $band_interests                             Band interests. Applicable to Bands. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $band_members                               Members of the band. Applicable to Bands. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param PageDTO|null                                   $best_page                                  The best available Page on Facebook for the concept represented by this Page. The best available Page takes into account authenticity and the number of likes
     * @param string|null                                    $bio                                        Biography of the band. Applicable to Bands. Can be read with Page Public Content Access or Page Public Metadata Access. Limit of 100 characters.
     * @param string|null                                    $birthday                                   Birthday of this person. Applicable to Pages representing people. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $booking_agent                              Booking agent of the band. Applicable to Bands. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $built                                      Year the vehicle was built. Applicable to Vehicles. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param BusinessDTO|null                               $business                                   The Business associated with this Page. Requires business_management permissions, and a page or user access token. The person requesting the access token must be an admin of the page.
     * @param bool|null                                      $can_checkin                                Whether the Page has checked in functionality enabled. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $can_post                                   Indicates whether the current app user can post on this Page. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string                                         $category                                   [Core] The Page's category. e.g. Product/Service, Computers/Technology. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param PageCategoryDTO[]|null                         $category_list                              The Page's sub-categories. This field will not return to the parent category.
     * @param int                                            $checkins                                   [Core] Number of checkins at a place represented by a Page
     * @param string|null                                    $company_overview                           The company overview. Applicable to Companies. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param IGUserDTO|null                                 $connected_instagram_account                Instagram account connected to page via page settings
     * @param IGUserDTO|null                                 $connected_page_backed_instagram_account    Linked page backed instagram account for this page
     * @param MailingAddressDTO|null                         $contact_address                            The mailing or contact address for this page. This field will be blank if the contact address is the same as the physical address
     * @param CopyrightAttributionInsightsDTO|null           $copyright_attribution_insights             Insight metrics that measures performance of copyright attribution. An example metric would be the number of incremental followers from attribution
     * @param string[]|null                                  $copyright_whitelisted_ig_partners          Instagram's usernames who will not be reported in copyright match systems
     * @param int|null                                       $country_page_likes                         If this is a Page in a Global Pages hierarchy, the number of people who are being directed to this Page. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param CoverPhotoDTO|null                             $cover                                      Information about the page's cover photo
     * @param string|null                                    $culinary_team                              Culinary team of the business. Applicable to Restaurants or Nightlife. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $current_location                           Current location of the Page. Can be read with Page Public Content Access or Page Public Metadata Access. To manage a child Page's location, use the /{page-id}/locations endpoint.
     * @param string[]|null                                  $delivery_and_pickup_option_info            A Vector of url strings for delivery_and_pickup_option_info of the Page.
     * @param string                                         $description                                [Core] The description of the Page. Can be read with Page Public Content Access or Page Public Metadata Access. Note that this value is mapped to the Additional Information setting in the Edit Page Info user interface.
     * @param string|null                                    $description_html                           The description of the Page in raw HTML. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param array|null                                     $differently_open_offerings                 To be used when temporary_status is set to differently_open to indicate how the business is operating differently than usual, such as a restaurant offering takeout. Enum keys can be one or more of the following: ONLINE_SERVICES, DELIVERY, PICKUP, OTHER with the value set to true or false. For example, a business offering food pick up but pausing delivery would be differently_open_offerings:{"DELIVERY":"false", "PICKUP":"true"} TODO change the type to "map"
     * @param string|null                                    $directed_by                                The director of the film. Applicable to Films. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $display_subtext                            Subtext about the Page being viewed. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $displayed_message_response_time            Page estimated message response time displayed to user. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string[]|null                                  $emails                                     The emails listed in the About section of a Page. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param EngagementDTO|null                             $engagement                                 The social sentence and like count information for this Page. This is the same info used for the like button
     * @param int|null                                       $fan_count                                  The number of users who like the Page. For Global Pages, this is the count for all Pages across the brand. Can be read with Page Public Content Access or Page Public Metadata Access. For New Page Experience Pages, this field will return followers_count.
     * @param VideoDTO|null                                  $featured_video                             Video featured by the Page
     * @param string|null                                    $features                                   Features of the vehicle. Applicable to Vehicles. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param int|null                                       $followers_count                            Number of page followers
     * @param string[]|null                                  $food_styles                                The restaurant's food styles. Applicable to Restaurants
     * @param string|null                                    $founded                                    When the company was founded. Applicable to Pages in the Company category. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $general_info                               General information provided by the Page. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $general_manager                            General manager of the business. Applicable to Restaurants or Nightlife. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $genre                                      The genre of the film. Applicable to Films. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $global_brand_page_name                     The name of the Page with country codes appended for Global Pages. Only visible to the Page admin. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $global_brand_root_id                       This brand's global Root ID
     * @param bool|null                                      $has_added_app                              Indicates whether this Page has added the app making the query in a Page tab. Can be read with Page Public Content Access.
     * @param bool|null                                      $has_transitioned_to_new_page_experience    Indicates whether a page has transitioned to new page experience or not
     * @param bool|null                                      $has_whatsapp_business_number               Indicates whether WhatsApp number connected to this page is a WhatsApp business number. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $has_whatsapp_number                        Indicates whether WhatsApp number connected to this page is a WhatsApp number. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $hometown                                   Hometown of the band. Applicable to Bands
     * @param string[]                                       $hours                                      Indicates a single range of opening hours for a day. Each day can have 2 different hours ranges. The keys in the map are in the form of {day}_{number}_{status}. {day} should be the first 3 characters of the day of the week, {number} should be either 1 or 2 to allow for the two different hours ranges per day. {Status} should be either open or close to delineate the start or end of a time range. An example with: { "hours": { "mon_1_open": "09:00", //open at 9am on Monday "mon_1_close": "12:00", //close at 12pm "mon_2_open": "13:15", //open at 1:15pm "mon_2_close": "18:00". //close at 6pm } If one specific day is open 24 hours, the range should be specified as 00:00 to 24:00. If the place is open 24/7, use the is_always_open field instead. Note: If a business is open during the night, the closing time can not pass 6:00am. For example, "mon_2_open":"13:15" and "mon_2_close":"5:59" will work, however, "mon_close_close":"6:00" will not.
     * @param string|null                                    $impressum                                  Legal information about the Page publishers. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $influences                                 Influences on the band. Applicable to Bands. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param IGUserDTO|null                                 $instagram_business_account                 Instagram account linked to page during Instagram business conversion flow
     * @param bool|null                                      $is_always_open                             Indicates whether this location is always open. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $is_chain                                   Indicates whether location is part of a chain. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $is_community_page                          Indicates whether the Page is a community Page. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $is_eligible_for_branded_content            Indicates whether the page is eligible for the branded content tool
     * @param bool|null                                      $is_messenger_bot_get_started_enabled       Indicates whether the page is a Messenger Platform Bot with Get Started button enabled
     * @param bool|null                                      $is_messenger_platform_bot                  Indicates whether the page is a Messenger Platform Bot. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $is_owned                                   Indicates whether the Page is owned. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $is_permanently_closed                      Whether the business corresponding to this Page is permanently closed. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $is_published                               Indicates whether the Page is published and visible to non-admins
     * @param bool|null                                      $is_unclaimed                               Indicates whether the Page is unclaimed
     * @param bool|null                                      $is_verified                                [Deprecated], use "verification_status". Facebook can manually verify Pages with a large number of followers as [having an authentic identity] (https://www.facebook.com/help/196050490547892). This field indicates whether the Page is verified by this process. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $is_webhooks_subscribed                     Indicates whether the application is subscribed for real time updates from this page
     * @param mixed                                          $keywords                                   [Deprecated] Returns null
     * @param DateTimeInterface|null                         $leadgen_tos_acceptance_time                Indicates the time when the TOS for running LeadGen Ads on the page was accepted
     * @param bool|null                                      $leadgen_tos_accepted                       Indicates whether a user has accepted the TOS for running LeadGen Ads on the Page
     * @param UserDTO|null                                   $leadgen_tos_accepting_user                 Indicates the user who accepted the TOS for running LeadGen Ads on the page
     * @param string|null                                    $link                                       [Core] The Page's Facebook URL
     * @param LocationDTO|null                               $location                                   The location of this place. Applicable to all Places
     * @param string|null                                    $members                                    Members of this org. Applicable to Pages representing Team Orgs. Can be read with Page Public Content Access.
     * @param string|null                                    $merchant_id                                The instant workflow merchant ID associated with the Page. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $merchant_review_status                     Review the status of the Page against FB commerce policies, this status decides whether the Page can use component flow
     * @param MessagingFeatureStatusDTO|null                 $messaging_feature_status                   Messaging feature status
     * @param string[]|null                                  $messenger_ads_default_icebreakers          The default icebreakers for a certain page
     * @param MessengerDestinationPageWelcomeMessageDTO|null $messenger_ads_default_page_welcome_message The default page welcome message for Click to Messenger Ads
     * @param string[]|null                                  $messenger_ads_default_quick_replies        The default quick replies for a certain page
     * @param MessengerAdsQuickRepliesTypeEnum               $messenger_ads_quick_replies_type           Indicates what type this page is, and we will generate different sets of quick replies based on it. Values include UNKNOWN, PAGE_SHOP, or RETAIL.
     * @param string|null                                    $mission                                    The company mission. Applicable to Companies
     * @param string|null                                    $mpg                                        MPG of the vehicle. Applicable to Vehicles. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string                                         $name                                       [Core][Default] The name of the Page
     * @param string|null                                    $name_with_location_descriptor              The name of the Page with its location and/or global brand descriptor. Only visible to a page admin. Non-page admins will get the same value as name.
     * @param string|null                                    $network                                    The TV network for the TV show. Applicable to TV Shows. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param int|null                                       $new_like_count                             The number of people who have liked the Page, since the last login. Only visible to a Page admin. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param bool|null                                      $offer_eligible                             Offer eligibility status. Only visible to a page admin
     * @param float|null                                     $overall_star_rating                        Overall page rating based on a rating survey from users on a scale of 1-5. This value is normalized and is not guaranteed to be a strict average of user ratings. If there are 0 or a small number of ratings, this field will not be returned.
     * @param string|null                                    $page_token                                 Self-explanatory
     * @param PageDTO|null                                   $parent_page                                Parent Page of this Page. If the Page is part of a Global Root Structure and you have permission to the Global Root, the Global Root Parent Page is returned. If you do not have Global Root permission, the Market Page for your current region is returned as the Parent Page. If your Page is not part of a Global Root Structure, the Parent Page is returned.
     * @param PageParkingDTO|null                            $parking                                    Parking information. Applicable to Businesses and Places
     * @param PagePaymentOptionsDTO|null                     $payment_options                            Payment options accepted by the business. Applicable to Restaurants or Nightlife
     * @param string|null                                    $personal_info                              Personal information. Applicable to Pages representing People. Can be read with Page Public Content Access.
     * @param string|null                                    $personal_interests                         Personal interests. Applicable to Pages representing People. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $pharma_safety_info                         Pharmacy safety information. Applicable to Pharmaceutical companies. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $phone                                      Phone number provided by a Page. Can be read with Page Public Content Access.
     * @param PickupOptionsEnum[]|null                       $pickup_options                             List of pickup options available at this Page's store location. Values can include CURBSIDE, IN_STORE, and OTHER.
     * @param PlaceTypeEnum|null                             $place_type                                 For places, the category of the place. Value can be CITY, COUNTRY, EVENT, GEO_ENTITY, PLACE, RESIDENCE, STATE_PROVINCE, or TEXT.
     * @param string|null                                    $plot_outline                               The plot outline of the film. Applicable to Films. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param TargetingDTO|null                              $preferred_audience                         Group of tags describing the preferred audienceof ads created for the Page
     * @param string|null                                    $press_contact                              Press contact information of the band. Applicable to Bands
     * @param string|null                                    $price_range                                Price range of the business, such as a restaurant or salon. Values can be one of $, $$, $$$, $$$$, Not Applicable, or null if no value is set. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $privacy_info_url                           Privacy url in a page info section
     * @param string|null                                    $produced_by                                The producer of the film. Applicable to Films. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $products                                   The products of this company. Applicable to Companies
     * @param bool|null                                      $promotion_eligible                         Boosted posts eligibility status. Only visible to a page admin
     * @param string|null                                    $promotion_ineligible_reason                Reason for which boosted posts are not eligible. Only visible to a page admin
     * @param string|null                                    $public_transit                             Public transit to the business. Applicable to Restaurants or Nightlife. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param int|null                                       $rating_count                               Number of ratings for the Page (limited to ratings that are publicly accessible). Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $recipient                                  Messenger page scope id associated with page and a user using account_linking_token
     * @param string|null                                    $record_label                               Record label of the band. Applicable to Bands. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $release_date                               The film's release date. Applicable to Films. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param PageRestaurantServicesDTO|null                 $restaurant_services                        Services the restaurant provides. Applicable to Restaurants
     * @param PageRestaurantSpecialtiesDTO|null              $restaurant_specialties                     The restaurant's specialties. Applicable to Restaurants
     * @param string|null                                    $schedule                                   The air schedule of the TV show. Applicable to TV Shows. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $screenplay_by                              The screenwriter of the film. Applicable to Films. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $season                                     The season information of the TV Show. Applicable to TV Shows. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $single_line_address                        The Page address, if any, in a simple single line format. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $starring                                   The cast of the film. Applicable to Films. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param PageStartInfoDTO|null                          $start_info                                 Information about when the entity represented by the Page was started
     * @param string|null                                    $store_code                                 Unique store code for this location Page. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $store_location_descriptor                  Location Page's store location descriptor
     * @param int|null                                       $store_number                               Unique store number for this location Page
     * @param string|null                                    $studio                                     The studio for the film production. Applicable to Films
     * @param bool|null                                      $supports_donate_button_in_live_video       Whether the user can add a Donate Button to their Live Videos.
     * @param int|null                                       $talking_about_count                        The number of people talking about this Page
     * @param TemporaryStatusEnum                            $temporary_status                           Indicates how the business corresponding to this Page is operating differently than usual. Possible values: differently_open, temporarily_closed, operating_as_usual, no_data. If set to differently_open use with differently_open_offerings to set status.
     * @param int|null                                       $unread_message_count                       Unread message count for the Page. Only visible to a page admin
     * @param int|null                                       $unread_notif_count                         Number of unread notifications. Only visible to a page admin
     * @param int|null                                       $unseen_message_count                       Unseen message count for the Page. Only visible to a page admin
     * @param string                                         $username                                   [Core] The alias of the Page. For example, for www.facebook.com/platform the username is 'platform'
     * @param VerificationStatusEnum|null                    $verification_status                        Showing whether this Page is verified. Value can be blue_verified or gray_verified, which represents that Facebook has confirmed that a Page is the authentic presence of the public figure, celebrity, or global brand it represents, or not_verified. This field can be read with the Page Public Metadata Access feature.
     * @param VoipInfoDTO|null                               $voip_info                                  Voip info
     * @param string|null                                    $website                                    The URL of the Page's website. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param int|null                                       $were_here_count                            The number of visits to this Page's location. If the Page setting Show map, check-ins and star ratings on the Page (under Page Settings > Page Info > Address) is disabled, then this value will also be disabled. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $whatsapp_number                            The Page's WhatsApp number. Can be read with Page Public Content Access or Page Public Metadata Access.
     * @param string|null                                    $written_by                                 The writer of the TV show. Applicable to TV Shows. Can be read with Page Public Content Access or Page Public Metadata Access.
     */
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $about,
        public readonly ?string $access_token,
        public readonly ?AdSetDTO $ad_campaign,
        public readonly ?string $affiliation,
        public readonly ?string $app_id,
        public readonly ?string $artists_we_like,
        public readonly ?string $attire,
        public readonly ?string $awards,
        public readonly ?string $band_interests,
        public readonly ?string $band_members,
        public readonly ?PageDTO $best_page,
        public readonly ?string $bio,
        public readonly ?string $birthday,
        public readonly ?string $booking_agent,
        public readonly ?string $built,
        public readonly ?BusinessDTO $business,
        public readonly ?bool $can_checkin,
        public readonly ?bool $can_post,
        public readonly string $category,
        public readonly ?array $category_list,
        public readonly int $checkins,
        public readonly ?string $company_overview,
        public readonly ?IGUserDTO $connected_instagram_account,
        public readonly ?IGUserDTO $connected_page_backed_instagram_account,
        public readonly ?MailingAddressDTO $contact_address,
        public readonly ?CopyrightAttributionInsightsDTO $copyright_attribution_insights,
        public readonly ?array $copyright_whitelisted_ig_partners,
        public readonly ?int $country_page_likes,
        public readonly ?CoverPhotoDTO $cover,
        public readonly ?string $culinary_team,
        public readonly ?string $current_location,
        public readonly ?array $delivery_and_pickup_option_info,
        public readonly string $description,
        public readonly ?string $description_html,
        public readonly ?array $differently_open_offerings,
        public readonly ?string $directed_by,
        public readonly ?string $display_subtext,
        public readonly ?string $displayed_message_response_time,
        public readonly ?array $emails,
        public readonly ?EngagementDTO $engagement,
        public readonly ?int $fan_count,
        public readonly ?VideoDTO $featured_video,
        public readonly ?string $features,
        public readonly ?int $followers_count,
        public readonly ?array $food_styles,
        public readonly ?string $founded,
        public readonly ?string $general_info,
        public readonly ?string $general_manager,
        public readonly ?string $genre,
        public readonly ?string $global_brand_page_name,
        public readonly ?string $global_brand_root_id,
        public readonly ?bool $has_added_app,
        public readonly ?bool $has_transitioned_to_new_page_experience,
        public readonly ?bool $has_whatsapp_business_number,
        public readonly ?bool $has_whatsapp_number,
        public readonly ?string $hometown,
        public readonly array $hours,
        public readonly ?string $impressum,
        public readonly ?string $influences,
        public readonly ?IGUserDTO $instagram_business_account,
        public readonly ?bool $is_always_open,
        public readonly ?bool $is_chain,
        public readonly ?bool $is_community_page,
        public readonly ?bool $is_eligible_for_branded_content,
        public readonly ?bool $is_messenger_bot_get_started_enabled,
        public readonly ?bool $is_messenger_platform_bot,
        public readonly ?bool $is_owned,
        public readonly ?bool $is_permanently_closed,
        public readonly ?bool $is_published,
        public readonly ?bool $is_unclaimed,
        public readonly ?bool $is_verified,
        public readonly ?bool $is_webhooks_subscribed,
        public readonly mixed $keywords,
        public readonly ?DateTimeInterface $leadgen_tos_acceptance_time,
        public readonly ?bool $leadgen_tos_accepted,
        public readonly ?UserDTO $leadgen_tos_accepting_user,
        public readonly ?string $link,
        public readonly ?LocationDTO $location,
        public readonly ?string $members,
        public readonly ?string $merchant_id,
        public readonly ?string $merchant_review_status,
        public readonly ?MessagingFeatureStatusDTO $messaging_feature_status,
        public readonly ?array $messenger_ads_default_icebreakers,
        public readonly ?MessengerDestinationPageWelcomeMessageDTO $messenger_ads_default_page_welcome_message,
        public readonly ?array $messenger_ads_default_quick_replies,
        public readonly MessengerAdsQuickRepliesTypeEnum $messenger_ads_quick_replies_type,
        public readonly ?string $mission,
        public readonly ?string $mpg,
        public readonly string $name,
        public readonly ?string $name_with_location_descriptor,
        public readonly ?string $network,
        public readonly ?int $new_like_count,
        public readonly ?bool $offer_eligible,
        public readonly ?float $overall_star_rating,
        public readonly ?string $page_token,
        public readonly ?PageDTO $parent_page,
        public readonly ?PageParkingDTO $parking,
        public readonly ?PagePaymentOptionsDTO $payment_options,
        public readonly ?string $personal_info,
        public readonly ?string $personal_interests,
        public readonly ?string $pharma_safety_info,
        public readonly ?string $phone,
        public readonly ?array $pickup_options,
        public readonly ?PlaceTypeEnum $place_type,
        public readonly ?string $plot_outline,
        public readonly ?TargetingDTO $preferred_audience,
        public readonly ?string $press_contact,
        public readonly ?string $price_range,
        public readonly ?string $privacy_info_url,
        public readonly ?string $produced_by,
        public readonly ?string $products,
        public readonly ?bool $promotion_eligible,
        public readonly ?string $promotion_ineligible_reason,
        public readonly ?string $public_transit,
        public readonly ?int $rating_count,
        public readonly ?string $recipient,
        public readonly ?string $record_label,
        public readonly ?string $release_date,
        public readonly ?PageRestaurantServicesDTO $restaurant_services,
        public readonly ?PageRestaurantSpecialtiesDTO $restaurant_specialties,
        public readonly ?string $schedule,
        public readonly ?string $screenplay_by,
        public readonly ?string $season,
        public readonly ?string $single_line_address,
        public readonly ?string $starring,
        public readonly ?PageStartInfoDTO $start_info,
        public readonly ?string $store_code,
        public readonly ?string $store_location_descriptor,
        public readonly ?int $store_number,
        public readonly ?string $studio,
        public readonly ?bool $supports_donate_button_in_live_video,
        public readonly ?int $talking_about_count,
        public readonly TemporaryStatusEnum $temporary_status,
        public readonly ?int $unread_message_count,
        public readonly ?int $unread_notif_count,
        public readonly ?int $unseen_message_count,
        public readonly string $username,
        public readonly ?VerificationStatusEnum $verification_status,
        public readonly ?VoipInfoDTO $voip_info,
        public readonly ?string $website,
        public readonly ?int $were_here_count,
        public readonly ?string $whatsapp_number,
        public readonly ?string $written_by
    ) {
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                                         => $this->id,
            'about'                                      => $this->about,
            'access_token'                               => $this->access_token,
            'ad_campaign'                                => $this->ad_campaign,
            'affiliation'                                => $this->affiliation,
            'app_id'                                     => $this->app_id,
            'artists_we_like'                            => $this->artists_we_like,
            'attire'                                     => $this->attire,
            'awards'                                     => $this->awards,
            'band_interests'                             => $this->band_interests,
            'band_members'                               => $this->band_members,
            'best_page'                                  => $this->best_page,
            'bio'                                        => $this->bio,
            'birthday'                                   => $this->birthday,
            'booking_agent'                              => $this->booking_agent,
            'built'                                      => $this->built,
            'business'                                   => $this->business,
            'can_checkin'                                => $this->can_checkin,
            'can_post'                                   => $this->can_post,
            'category'                                   => $this->category,
            'category_list'                              => $this->category_list,
            'checkins'                                   => $this->checkins,
            'company_overview'                           => $this->company_overview,
            'connected_instagram_account'                => $this->connected_instagram_account,
            'connected_page_backed_instagram_account'    => $this->connected_page_backed_instagram_account,
            'contact_address'                            => $this->contact_address,
            'copyright_attribution_insights'             => $this->copyright_attribution_insights,
            'copyright_whitelisted_ig_partners'          => $this->copyright_whitelisted_ig_partners,
            'country_page_likes'                         => $this->country_page_likes,
            'cover'                                      => $this->cover,
            'culinary_team'                              => $this->culinary_team,
            'current_location'                           => $this->current_location,
            'delivery_and_pickup_option_info'            => $this->delivery_and_pickup_option_info,
            'description'                                => $this->description,
            'description_html'                           => $this->description_html,
            'differently_open_offerings'                 => $this->differently_open_offerings,
            'directed_by'                                => $this->directed_by,
            'display_subtext'                            => $this->display_subtext,
            'displayed_message_response_time'            => $this->displayed_message_response_time,
            'emails'                                     => $this->emails,
            'engagement'                                 => $this->engagement,
            'fan_count'                                  => $this->fan_count,
            'featured_video'                             => $this->featured_video,
            'features'                                   => $this->features,
            'followers_count'                            => $this->followers_count,
            'food_styles'                                => $this->food_styles,
            'founded'                                    => $this->founded,
            'general_info'                               => $this->general_info,
            'general_manager'                            => $this->general_manager,
            'genre'                                      => $this->genre,
            'global_brand_page_name'                     => $this->global_brand_page_name,
            'global_brand_root_id'                       => $this->global_brand_root_id,
            'has_added_app'                              => $this->has_added_app,
            'has_transitioned_to_new_page_experience'    => $this->has_transitioned_to_new_page_experience,
            'has_whatsapp_business_number'               => $this->has_whatsapp_business_number,
            'has_whatsapp_number'                        => $this->has_whatsapp_number,
            'hometown'                                   => $this->hometown,
            'hours'                                      => $this->hours,
            'impressum'                                  => $this->impressum,
            'influences'                                 => $this->influences,
            'instagram_business_account'                 => $this->instagram_business_account,
            'is_always_open'                             => $this->is_always_open,
            'is_chain'                                   => $this->is_chain,
            'is_community_page'                          => $this->is_community_page,
            'is_eligible_for_branded_content'            => $this->is_eligible_for_branded_content,
            'is_messenger_bot_get_started_enabled'       => $this->is_messenger_bot_get_started_enabled,
            'is_messenger_platform_bot'                  => $this->is_messenger_platform_bot,
            'is_owned'                                   => $this->is_owned,
            'is_permanently_closed'                      => $this->is_permanently_closed,
            'is_published'                               => $this->is_published,
            'is_unclaimed'                               => $this->is_unclaimed,
            'is_verified'                                => $this->is_verified,
            'is_webhooks_subscribed'                     => $this->is_webhooks_subscribed,
            'keywords'                                   => $this->keywords,
            'leadgen_tos_acceptance_time'                => $this->leadgen_tos_acceptance_time,
            'leadgen_tos_accepted'                       => $this->leadgen_tos_accepted,
            'leadgen_tos_accepting_user'                 => $this->leadgen_tos_accepting_user,
            'link'                                       => $this->link,
            'location'                                   => $this->location,
            'members'                                    => $this->members,
            'merchant_id'                                => $this->merchant_id,
            'merchant_review_status'                     => $this->merchant_review_status,
            'messaging_feature_status'                   => $this->messaging_feature_status,
            'messenger_ads_default_icebreakers'          => $this->messenger_ads_default_icebreakers,
            'messenger_ads_default_page_welcome_message' => $this->messenger_ads_default_page_welcome_message,
            'messenger_ads_default_quick_replies'        => $this->messenger_ads_default_quick_replies,
            'messenger_ads_quick_replies_type'           => $this->messenger_ads_quick_replies_type,
            'mission'                                    => $this->mission,
            'mpg'                                        => $this->mpg,
            'name'                                       => $this->name,
            'name_with_location_descriptor'              => $this->name_with_location_descriptor,
            'network'                                    => $this->network,
            'new_like_count'                             => $this->new_like_count,
            'offer_eligible'                             => $this->offer_eligible,
            'overall_star_rating'                        => $this->overall_star_rating,
            'page_token'                                 => $this->page_token,
            'parent_page'                                => $this->parent_page,
            'parking'                                    => $this->parking,
            'payment_options'                            => $this->payment_options,
            'personal_info'                              => $this->personal_info,
            'personal_interests'                         => $this->personal_interests,
            'pharma_safety_info'                         => $this->pharma_safety_info,
            'phone'                                      => $this->phone,
            'pickup_options'                             => $this->pickup_options,
            'place_type'                                 => $this->place_type,
            'plot_outline'                               => $this->plot_outline,
            'preferred_audience'                         => $this->preferred_audience,
            'press_contact'                              => $this->press_contact,
            'price_range'                                => $this->price_range,
            'privacy_info_url'                           => $this->privacy_info_url,
            'produced_by'                                => $this->produced_by,
            'products'                                   => $this->products,
            'promotion_eligible'                         => $this->promotion_eligible,
            'promotion_ineligible_reason'                => $this->promotion_ineligible_reason,
            'public_transit'                             => $this->public_transit,
            'rating_count'                               => $this->rating_count,
            'recipient'                                  => $this->recipient,
            'record_label'                               => $this->record_label,
            'release_date'                               => $this->release_date,
            'restaurant_services'                        => $this->restaurant_services,
            'restaurant_specialties'                     => $this->restaurant_specialties,
            'schedule'                                   => $this->schedule,
            'screenplay_by'                              => $this->screenplay_by,
            'season'                                     => $this->season,
            'single_line_address'                        => $this->single_line_address,
            'starring'                                   => $this->starring,
            'start_info'                                 => $this->start_info,
            'store_code'                                 => $this->store_code,
            'store_location_descriptor'                  => $this->store_location_descriptor,
            'store_number'                               => $this->store_number,
            'studio'                                     => $this->studio,
            'supports_donate_button_in_live_video'       => $this->supports_donate_button_in_live_video,
            'talking_about_count'                        => $this->talking_about_count,
            'temporary_status'                           => $this->temporary_status,
            'unread_message_count'                       => $this->unread_message_count,
            'unread_notif_count'                         => $this->unread_notif_count,
            'unseen_message_count'                       => $this->unseen_message_count,
            'username'                                   => $this->username,
            'verification_status'                        => $this->verification_status,
            'voip_info'                                  => $this->voip_info,
            'website'                                    => $this->website,
            'were_here_count'                            => $this->were_here_count,
            'whatsapp_number'                            => $this->whatsapp_number,
            'written_by'                                 => $this->written_by,
        ];
    }
}
