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
use XGuard\Bot\Facebook\Domain\Enum\SupportedPlatformsEnum;

/**
 * The class represents a Facebook app.
 * @see https://developers.facebook.com/docs/graph-api/reference/application/
 */
class ApplicationDTO implements JsonSerializable
{

    /**
     * @param string                             $id                                     [Core] The app ID
     * @param string|null                        $aam_rules                              Rules of Auto Advanced Matching in FB SDKs
     * @param int|null                           $an_ad_space_limit                      The maximum number of Ad Spaces allowed for each Audience Network supported platform
     * @param string[]|null                      $an_platforms                           The platforms associated with the app in the Audience Network product. Not enforced, but when present, it can be used to provide the user with platform specific information for the app and its placements
     * @param string[]|null                      $app_domains                            Domains and subdomains this app can use
     * @param ApplicationAppEventsConfigDTO|null $app_events_config                      Configuration for app events
     * @param bool|null                          $app_install_tracked                    Whether the app install is trackable or not
     * @param string|null                        $app_name                               App name
     * @param BindingDTO[]|null                  $app_signals_binding_ios                List of app event bindings for iOS app
     * @param int|null                           $app_type                               App type
     * @param string|null                        $auth_dialog_data_help_url              The URL of a special landing page that helps people who are using an app begin publishing Open Graph activity
     * @param string|null                        $auth_dialog_headline                   One line description of an app that appears in the Login Dialog
     * @param string|null                        $auth_dialog_perms_explanation          The text to explain why an app needs additional permissions. This appears in the Login Dialog
     * @param string|null                        $auth_referral_default_activity_privacy The default privacy setting selected for Open Graph activities in the Auth Dialog
     * @param int|null                           $auth_referral_enabled                  Indicates whether Authenticated Referrals are enabled
     * @param string[]|null                      $auth_referral_extended_perms           Extended permissions that a person can choose to grant when Authenticated Referrals are enabled
     * @param string[]|null                      $auth_referral_friend_perms             Basic friends permissions that a user must grant when Authenticated Referrals are enabled
     * @param string|null                        $auth_referral_response_type            The format that an app receives for the authentication token from the Login Dialog
     * @param string[]|null                      $auth_referral_user_perms               Basic user permissions that a user must grant when Authenticated Referrals are enabled
     * @param bool|null                          $canvas_fluid_height                    Indicates whether the app uses fluid or settable height values for Canvas
     * @param int|null                           $canvas_fluid_width                     Indicates whether the app uses fluid or fixed width values for Canvas
     * @param string|null                        $canvas_url                             The non-secure URL from which Canvas app content is loaded
     * @param string                             $category                               [Default] The category of the app
     * @param array|null                         $client_config                          Config data for the client TODO change the type to "map"
     * @param string|null                        $company                                The company the app belongs to
     * @param bool|null                          $configured_ios_sso                     True if the app has configured Single Sign On on iOS
     * @param string|null                        $contact_email                          Email address listed for people using the app to contact developers
     * @param DateTimeInterface|null             $created_time                           Timestamp that indicates when the app was created
     * @param string|null                        $creator_uid                            User ID of the creator of this app
     * @param string|null                        $daily_active_users                     The number of daily active users the app has
     * @param int|null                           $daily_active_users_rank                Ranking of this app vs other apps comparing daily active users
     * @param string|null                        $deauth_callback_url                    URL that is pinged whenever a person removes the app
     * @param string|null                        $default_share_mode                     The platform that should be used to share content
     * @param string                             $description                            [Core] The description of the app, as provided by the developer
     * @param string|null                        $financial_id                           The ID for the corresponding audience network financial entity.
     * @param string|null                        $hosting_url                            Webspace created with one of our hosting partners for this app
     * @param string|null                        $icon_url                               The URL of this app's icon
     * @param string[]|null                      $ios_bundle_id                          Bundle ID of the associated iOS app
     * @param bool|null                          $ios_supports_native_proxy_auth_flow    Whether to support the native proxy login flow
     * @param bool|null                          $ios_supports_system_auth               Whether to support the iOS integrated Login Dialog
     * @param string|null                        $ipad_app_store_id                      ID of the app in the iPad App Store
     * @param string|null                        $iphone_app_store_id                    ID of the app in the iPhone App Store
     * @param ApplicationSDKInfoDTO|null         $latest_sdk_version                     App latest sdk version
     * @param string                             $link                                   [Core][Default] A link to the app on Facebook
     * @param string|null                        $logging_token                          To use for logging purposes
     * @param string|null                        $logo_url                               The URL of the app's logo
     * @param bool[]|null                        $migrations                             Status of migrations for this app
     * @param string|null                        $mobile_profile_section_url             Mobile URL of the app section on a person's profile
     * @param string|null                        $mobile_web_url                         URL to which Mobile users will be directed when using the app
     * @param string|null                        $monthly_active_users                   The number of monthly active users the app has
     * @param int|null                           $monthly_active_users_rank              Ranking of this app vs other apps comparing monthly active users
     * @param string                             $name                                   [Core][Default] The name of the app
     * @param string                             $namespace                              [Core][Default] The string appended to apps.facebook.com/ to navigate to the app's canvas page
     * @param ApplicationObjectStoreURLsDTO|null $object_store_urls                      Mobile store URLs for the app
     * @param string|null                        $page_tab_default_name                  The title of the app when used in a Page Tab
     * @param string|null                        $page_tab_url                           The non-secure URL from which Page Tab app content is loaded
     * @param string|null                        $photo_url                              The URL of the app photo
     * @param string|null                        $privacy_policy_url                     The URL that links to a Privacy Policy for the app
     * @param string|null                        $profile_section_url                    URL of the app section on a user's profile for the desktop site
     * @param string|null                        $property_id                            The monetization property which owns this app
     * @param string[]|null                      $real_time_mode_devices                 List of real time hashed device
     * @param ApplicationRestrictionInfoDTO|null $restrictions                           Demographic restrictions for the app
     * @param string|null                        $restrictive_data_filter_params         Params used to filter out restrictive data
     * @param string|null                        $secure_canvas_url                      The secure URL from which Canvas app content is loaded
     * @param string|null                        $secure_page_tab_url                    The secure URL from which Page Tab app content is loaded
     * @param string|null                        $server_ip_whitelist                    App requests must originate from this comma-separated list of IP addresses
     * @param int|null                           $social_discovery                       Indicates whether app usage stories show up in the Ticker or Feed
     * @param string|null                        $subcategory                            The subcategory the app can be found under
     * @param string|null                        $suggested_events_setting               Settings for suggested events
     * @param SupportedPlatformsEnum|null        $supported_platforms                    All the platform the app supports
     * @param string|null                        $terms_of_service_url                   URL to Terms of Service that appears in the Login Dialog
     * @param string|null                        $url_scheme_suffix                      URL scheme suffix
     * @param string|null                        $user_support_email                     Main contact email for this app where people can receive support
     * @param string|null                        $user_support_url                       URL shown in the Canvas footer that people can visit to get support for the app
     * @param string|null                        $website_url                            URL of a website that integrates with this app
     * @param string|null                        $weekly_active_users                    The number of weekly active users the app has
     */
    public function __construct(
        public readonly string $id,
        public readonly ?string $aam_rules,
        public readonly ?int $an_ad_space_limit,
        public readonly ?array $an_platforms,
        public readonly ?array $app_domains,
        public readonly ?ApplicationAppEventsConfigDTO $app_events_config,
        public readonly ?bool $app_install_tracked,
        public readonly ?string $app_name,
        public readonly ?array $app_signals_binding_ios,
        public readonly ?int $app_type,
        public readonly ?string $auth_dialog_data_help_url,
        public readonly ?string $auth_dialog_headline,
        public readonly ?string $auth_dialog_perms_explanation,
        public readonly ?string $auth_referral_default_activity_privacy,
        public readonly ?int $auth_referral_enabled,
        public readonly ?array $auth_referral_extended_perms,
        public readonly ?array $auth_referral_friend_perms,
        public readonly ?string $auth_referral_response_type,
        public readonly ?array $auth_referral_user_perms,
        public readonly ?bool $canvas_fluid_height,
        public readonly ?int $canvas_fluid_width,
        public readonly ?string $canvas_url,
        public readonly string $category,
        public readonly ?array $client_config,
        public readonly ?string $company,
        public readonly ?bool $configured_ios_sso,
        public readonly ?string $contact_email,
        public readonly ?DateTimeInterface $created_time,
        public readonly ?string $creator_uid,
        public readonly ?string $daily_active_users,
        public readonly ?int $daily_active_users_rank,
        public readonly ?string $deauth_callback_url,
        public readonly ?string $default_share_mode,
        public readonly string $description,
        public readonly ?string $financial_id,
        public readonly ?string $hosting_url,
        public readonly ?string $icon_url,
        public readonly ?array $ios_bundle_id,
        public readonly ?bool $ios_supports_native_proxy_auth_flow,
        public readonly ?bool $ios_supports_system_auth,
        public readonly ?string $ipad_app_store_id,
        public readonly ?string $iphone_app_store_id,
        public readonly ?ApplicationSDKInfoDTO $latest_sdk_version,
        public readonly string $link,
        public readonly ?string $logging_token,
        public readonly ?string $logo_url,
        public readonly ?array $migrations,
        public readonly ?string $mobile_profile_section_url,
        public readonly ?string $mobile_web_url,
        public readonly ?string $monthly_active_users,
        public readonly ?int $monthly_active_users_rank,
        public readonly string $name,
        public readonly string $namespace,
        public readonly ?ApplicationObjectStoreURLsDTO $object_store_urls,
        public readonly ?string $page_tab_default_name,
        public readonly ?string $page_tab_url,
        public readonly ?string $photo_url,
        public readonly ?string $privacy_policy_url,
        public readonly ?string $profile_section_url,
        public readonly ?string $property_id,
        public readonly ?array $real_time_mode_devices,
        public readonly ?ApplicationRestrictionInfoDTO $restrictions,
        public readonly ?string $restrictive_data_filter_params,
        public readonly ?string $secure_canvas_url,
        public readonly ?string $secure_page_tab_url,
        public readonly ?string $server_ip_whitelist,
        public readonly ?int $social_discovery,
        public readonly ?string $subcategory,
        public readonly ?string $suggested_events_setting,
        public readonly ?SupportedPlatformsEnum $supported_platforms,
        public readonly ?string $terms_of_service_url,
        public readonly ?string $url_scheme_suffix,
        public readonly ?string $user_support_email,
        public readonly ?string $user_support_url,
        public readonly ?string $website_url,
        public readonly ?string $weekly_active_users
    ) {
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                                     => $this->id,
            'aam_rules'                              => $this->aam_rules,
            'an_ad_space_limit'                      => $this->an_ad_space_limit,
            'an_platforms'                           => $this->an_platforms,
            'app_domains'                            => $this->app_domains,
            'app_events_config'                      => $this->app_events_config,
            'app_install_tracked'                    => $this->app_install_tracked,
            'app_name'                               => $this->app_name,
            'app_signals_binding_ios'                => $this->app_signals_binding_ios,
            'app_type'                               => $this->app_type,
            'auth_dialog_data_help_url'              => $this->auth_dialog_data_help_url,
            'auth_dialog_headline'                   => $this->auth_dialog_headline,
            'auth_dialog_perms_explanation'          => $this->auth_dialog_perms_explanation,
            'auth_referral_default_activity_privacy' => $this->auth_referral_default_activity_privacy,
            'auth_referral_enabled'                  => $this->auth_referral_enabled,
            'auth_referral_extended_perms'           => $this->auth_referral_extended_perms,
            'auth_referral_friend_perms'             => $this->auth_referral_friend_perms,
            'auth_referral_response_type'            => $this->auth_referral_response_type,
            'auth_referral_user_perms'               => $this->auth_referral_user_perms,
            'canvas_fluid_height'                    => $this->canvas_fluid_height,
            'canvas_fluid_width'                     => $this->canvas_fluid_width,
            'canvas_url'                             => $this->canvas_url,
            'category'                               => $this->category,
            'client_config'                          => $this->client_config,
            'company'                                => $this->company,
            'configured_ios_sso'                     => $this->configured_ios_sso,
            'contact_email'                          => $this->contact_email,
            'created_time'                           => $this->created_time,
            'creator_uid'                            => $this->creator_uid,
            'daily_active_users'                     => $this->daily_active_users,
            'daily_active_users_rank'                => $this->daily_active_users_rank,
            'deauth_callback_url'                    => $this->deauth_callback_url,
            'default_share_mode'                     => $this->default_share_mode,
            'description'                            => $this->description,
            'financial_id'                           => $this->financial_id,
            'hosting_url'                            => $this->hosting_url,
            'icon_url'                               => $this->icon_url,
            'ios_bundle_id'                          => $this->ios_bundle_id,
            'ios_supports_native_proxy_auth_flow'    => $this->ios_supports_native_proxy_auth_flow,
            'ios_supports_system_auth'               => $this->ios_supports_system_auth,
            'ipad_app_store_id'                      => $this->ipad_app_store_id,
            'iphone_app_store_id'                    => $this->iphone_app_store_id,
            'latest_sdk_version'                     => $this->latest_sdk_version,
            'link'                                   => $this->link,
            'logging_token'                          => $this->logging_token,
            'logo_url'                               => $this->logo_url,
            'migrations'                             => $this->migrations,
            'mobile_profile_section_url'             => $this->mobile_profile_section_url,
            'mobile_web_url'                         => $this->mobile_web_url,
            'monthly_active_users'                   => $this->monthly_active_users,
            'monthly_active_users_rank'              => $this->monthly_active_users_rank,
            'name'                                   => $this->name,
            'namespace'                              => $this->namespace,
            'object_store_urls'                      => $this->object_store_urls,
            'page_tab_default_name'                  => $this->page_tab_default_name,
            'page_tab_url'                           => $this->page_tab_url,
            'photo_url'                              => $this->photo_url,
            'privacy_policy_url'                     => $this->privacy_policy_url,
            'profile_section_url'                    => $this->profile_section_url,
            'property_id'                            => $this->property_id,
            'real_time_mode_devices'                 => $this->real_time_mode_devices,
            'restrictions'                           => $this->restrictions,
            'restrictive_data_filter_params'         => $this->restrictive_data_filter_params,
            'secure_canvas_url'                      => $this->secure_canvas_url,
            'secure_page_tab_url'                    => $this->secure_page_tab_url,
            'server_ip_whitelist'                    => $this->server_ip_whitelist,
            'social_discovery'                       => $this->social_discovery,
            'subcategory'                            => $this->subcategory,
            'suggested_events_setting'               => $this->suggested_events_setting,
            'supported_platforms'                    => $this->supported_platforms,
            'terms_of_service_url'                   => $this->terms_of_service_url,
            'url_scheme_suffix'                      => $this->url_scheme_suffix,
            'user_support_email'                     => $this->user_support_email,
            'user_support_url'                       => $this->user_support_url,
            'website_url'                            => $this->website_url,
            'weekly_active_users'                    => $this->weekly_active_users,
        ];
    }
}
