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

/**
 * The class represents a Facebook user
 * @see https://developers.facebook.com/docs/graph-api/reference/user/
 */
class UserDTO implements JsonSerializable
{

    /**
     * @param string                     $id                                   [Core] The app user's App-Scoped User ID. This ID is unique to the app and cannot be used by other apps.
     * @param string|null                $about                                [Deprecated] Returns no data as of April 4, 2018.
     * @param AgeRangeDTO                $age_range                            [Core] The age segment for this person expressed as a minimum and maximum age. For example, more than 18, less than 21.
     * @param string                     $birthday                             [Core] The person's birthday. This is a fixed format string, like MM/DD/YYYY. However, people can control who can see the year they were born separately from the month and day so this string can be only the year (YYYY) or the month + day (MM/DD)
     * @param CurrencyDTO|null           $currency                             [Deprecated] The person's local currency information
     * @param ExperienceDTO[]|null       $education                            [Deprecated] Returns no data as of April 4, 2018.
     * @param string                     $email                                [Core] The User's primary email address listed on their profile. This field will not be returned if no valid email address is available.
     * @param ExperienceDTO[]|null       $favorite_athletes                    Athletes the User likes.
     * @param ExperienceDTO[]|null       $favorite_teams                       Sports teams the User likes.
     * @param string                     $first_name                           [Core] The person's first name
     * @param string                     $gender                               [Core] The gender selected by this person, male or female. If the gender is set to a custom value, this value will be based off of the selected pronoun; it will be omitted if the pronoun is neutral.
     * @param PageDTO|null               $hometown                             The person's hometown
     * @param string|null                $id_for_avatars                       A profile-based app scoped ID. It is used to query avatars
     * @param ExperienceDTO[]|null       $inspirational_people                 The person's inspirational people
     * @param string|null                $install_type                         Install type
     * @param bool|null                  $installed                            Is the app making the request installed?
     * @param bool|null                  $is_guest_user                        if the current user is a guest user. should always return false.
     * @param ExperienceDTO[]|null       $languages                            Facebook Pages representing the languages this person knows
     * @param string                     $last_name                            [Core] The person's last name
     * @param string                     $link                                 [Core] A link to the person's Timeline. The link will only resolve if the person clicking the link is logged into Facebook and is a friend of the person whose profile is being viewed.
     * @param bool|null                  $local_news_megaphone_dismiss_status  [Deprecated] Display megaphone for local news bookmark
     * @param bool|null                  $local_news_subscription_status       [Deprecated] Daily local news notification
     * @param string|null                $locale                               [Deprecated][Core] The person's locale
     * @param PageDTO|null               $location                             [Core] The person's current location as entered by them on their profile. This field requires the user_location permission.
     * @param string[]|null              $meeting_for                          What the person is interested in meeting for
     * @param string                     $middle_name                          [Core] The person's middle name
     * @param string                     $name                                 [Core][Default] The person's full name
     * @param string|null                $name_format                          The person's name formatted to correctly handle Chinese, Japanese, or Korean ordering
     * @param PaymentPricepointsDTO|null $payment_pricepoints                  The person's payment pricepoints
     * @param string|null                $political                            Returns no data as of April 4, 2018.
     * @param string|null                $profile_pic                          The profile of picture URL of the Messenger user. The URL will expire.
     * @param string|null                $quotes                               The person's favorite quotes
     * @param string|null                $relationship_status                  Returns no data as of April 4, 2018.
     * @param int|null                   $shared_login_upgrade_required_by     The time that the shared login needs to be upgraded to Business Manager by
     * @param string|null                $short_name                           Shortened, locale-aware name for the person
     * @param UserDTO|null               $significant_other                    The person's significant other
     * @param ExperienceDTO[]|null       $sports                               Sports played by the person
     * @param bool|null                  $supports_donate_button_in_live_video Whether the user can add a Donate Button to their Live Videos
     * @param string|null                $third_party_id                       [Deprecated] A string containing an anonymous, unique identifier for the User, for use with third-parties. Deprecated for versions 3.0+. Apps using older versions of the API can get this field until January 8, 2019. Apps installed by the User on or after May 1st, 2018, cannot get this field.
     * @param float|null                 $timezone                             [Deprecated][Core] The person's current timezone offset from UTC
     * @param string|null                $token_for_business                   A token that is the same across a business's apps. Access to this token requires that the person be logged into your app or have a role on your app. This token will change if the business owning the app changes
     * @param DateTimeInterface|null     $updated_time                         [Deprecated] Updated time
     * @param bool|null                  $verified                             [Deprecated] Indicates whether the account has been verified. This is distinct from the is_verified field. Someone is considered verified if they take any of the following actions: no actions presented
     * @param VideoUploadLimitsDTO|null  $video_upload_limits                  Video upload limits
     * @param string|null                $website                              [Deprecated] Returns no data as of April 4, 2018.
     */
    public function __construct(
        public readonly string $id,
        public readonly ?string $about,//deprecated
        public readonly AgeRangeDTO $age_range,
        public readonly string $birthday,
        public readonly ?CurrencyDTO $currency,//deprecated
        public readonly ?array $education,     //deprecated
        public readonly string $email,
        public readonly ?array $favorite_athletes,
        public readonly ?array $favorite_teams,
        public readonly string $first_name,
        public readonly string $gender,
        public readonly ?PageDTO $hometown,
        public readonly ?string $id_for_avatars,
        public readonly ?array $inspirational_people,
        public readonly ?string $install_type,
        public readonly ?bool $installed,
        public readonly ?bool $is_guest_user,
        public readonly ?array $languages,
        public readonly string $last_name,
        public readonly string $link,
        public readonly ?bool $local_news_megaphone_dismiss_status,//deprecated
        public readonly ?bool $local_news_subscription_status,     //deprecated
        public readonly ?string $locale,                           //deprecated
        public readonly ?PageDTO $location,
        public readonly ?array $meeting_for,
        public readonly string $middle_name,
        public readonly string $name,
        public readonly ?string $name_format,
        public readonly ?PaymentPricepointsDTO $payment_pricepoints,
        public readonly ?string $political,//deprecated
        public readonly ?string $profile_pic,
        public readonly ?string $quotes,
        public readonly ?string $relationship_status,//deprecated
        public readonly ?int $shared_login_upgrade_required_by,
        public readonly ?string $short_name,
        public readonly ?UserDTO $significant_other,
        public readonly ?array $sports,
        public readonly ?bool $supports_donate_button_in_live_video,
        public readonly ?string $third_party_id,//deprecated
        public readonly ?float $timezone,       //deprecated
        public readonly ?string $token_for_business,
        public readonly ?DateTimeInterface $updated_time,//deprecated
        public readonly ?bool $verified,                 //deprecated
        public readonly ?VideoUploadLimitsDTO $video_upload_limits,
        public readonly ?string $website//deprecated
    )
    {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                                   => $this->id,
            'about'                                => $this->about,
            'age_range'                            => $this->age_range,
            'birthday'                             => $this->birthday,
            'currency'                             => $this->currency,
            'education'                            => $this->education,
            'email'                                => $this->email,
            'favorite_athletes'                    => $this->favorite_athletes,
            'favorite_teams'                       => $this->favorite_teams,
            'first_name'                           => $this->first_name,
            'gender'                               => $this->gender,
            'hometown'                             => $this->hometown,
            'id_for_avatars'                       => $this->id_for_avatars,
            'inspirational_people'                 => $this->inspirational_people,
            'install_type'                         => $this->install_type,
            'installed'                            => $this->installed,
            'is_guest_user'                        => $this->is_guest_user,
            'languages'                            => $this->languages,
            'last_name'                            => $this->last_name,
            'link'                                 => $this->link,
            'local_news_megaphone_dismiss_status'  => $this->local_news_megaphone_dismiss_status,
            'local_news_subscription_status'       => $this->local_news_subscription_status,
            'locale'                               => $this->locale,
            'location'                             => $this->location,
            'meeting_for'                          => $this->meeting_for,
            'middle_name'                          => $this->middle_name,
            'name'                                 => $this->name,
            'name_format'                          => $this->name_format,
            'payment_pricepoints'                  => $this->payment_pricepoints,
            'political'                            => $this->political,
            'profile_pic'                          => $this->profile_pic,
            'quotes'                               => $this->quotes,
            'relationship_status'                  => $this->relationship_status,
            'shared_login_upgrade_required_by'     => $this->shared_login_upgrade_required_by,
            'short_name'                           => $this->short_name,
            'significant_other'                    => $this->significant_other,
            'sports'                               => $this->sports,
            'supports_donate_button_in_live_video' => $this->supports_donate_button_in_live_video,
            'third_party_id'                       => $this->third_party_id,
            'timezone'                             => $this->timezone,
            'token_for_business'                   => $this->token_for_business,
            'updated_time'                         => $this->updated_time,
            'verified'                             => $this->verified,
            'video_upload_limits'                  => $this->video_upload_limits,
            'website'                              => $this->website,
        ];
    }
}
