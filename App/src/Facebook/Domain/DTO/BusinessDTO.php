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
 * The class represents a business
 * @see https://developers.facebook.com/docs/marketing-api/reference/business
 */
class BusinessDTO implements JsonSerializable
{

    /**
     * @param string                                    $id                                              [Default] The business account ID.
     * @param bool|null                                 $block_offline_analytics                         Specifies whether offline analytics for business is blocked.
     * @param ManagedPartnerBusinessDTO|null            $collaborative_ads_managed_partner_business_info collaborative_ads_managed_partner_business_info
     * @param BusinessManagedPartnerEligibilityDTO|null $collaborative_ads_managed_partner_eligibility   collaborative_ads_managed_partner_eligibility
     * @param BusinessUserDTO|SystemUserDTO|null        $created_by                                      The creator of this business.
     * @param DateTimeInterface|null                    $created_time                                    The creation time of this business.
     * @param DateTimeInterface|null                    $extended_updated_time                           The update time of the extended credits for this business.
     * @param bool|null                                 $is_hidden                                       If true, indicates the business is hidden.
     * @param string|null                               $link                                            URI for business profile page.
     * @param string                                    $name                                            [Default] The name of the business.
     * @param string|null                               $payment_account_id                              The ID for the payment account of this business.
     * @param PageDTO|null                              $primary_page                                    The primary Facebook Page for this business.
     * @param string|null                               $profile_picture_uri                             The profile picture URI of the business.
     * @param int|null                                  $timezone_id                                     This business's timezone.
     * @param string|null                               $two_factor_type                                 [TODO to enum ]The two factor type authentication used for this business.
     * @param BusinessUserDTO|SystemUserDTO|null        $updated_by                                      The person's name who last updated this business.
     * @param DateTimeInterface|null                    $updated_time                                    The time when this business was last updated.
     * @param string|null                               $verification_status                             Verification status for this business.
     * @param string|null                               $vertical                                        The vertical industry that this business associates with, or belongs to.
     * @param int|null                                  $vertical_id                                     The ID for the vertical industry.
     */
    public function __construct(
        public readonly string $id,
        public readonly ?bool $block_offline_analytics,
        public readonly ?ManagedPartnerBusinessDTO $collaborative_ads_managed_partner_business_info,
        public readonly ?BusinessManagedPartnerEligibilityDTO $collaborative_ads_managed_partner_eligibility,
        public readonly null|BusinessUserDTO|SystemUserDTO $created_by,
        public readonly ?DateTimeInterface $created_time,
        public readonly ?DateTimeInterface $extended_updated_time,
        public readonly ?bool $is_hidden,
        public readonly ?string $link,
        public readonly string $name,
        public readonly ?string $payment_account_id,
        public readonly ?PageDTO $primary_page,
        public readonly ?string $profile_picture_uri,
        public readonly ?int $timezone_id,
        public readonly ?string $two_factor_type,
        public readonly null|BusinessUserDTO|SystemUserDTO $updated_by,
        public readonly ?DateTimeInterface $updated_time,
        public readonly ?string $verification_status,
        public readonly ?string $vertical,
        public readonly ?int $vertical_id
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                                              => $this->id,
            'block_offline_analytics'                         => $this->block_offline_analytics,
            'collaborative_ads_managed_partner_business_info' => $this->collaborative_ads_managed_partner_business_info,
            'collaborative_ads_managed_partner_eligibility'   => $this->collaborative_ads_managed_partner_eligibility,
            'created_by'                                      => $this->created_by,
            'created_time'                                    => $this->created_time,
            'extended_updated_time'                           => $this->extended_updated_time,
            'is_hidden'                                       => $this->is_hidden,
            'link'                                            => $this->link,
            'name'                                            => $this->name,
            'payment_account_id'                              => $this->payment_account_id,
            'primary_page'                                    => $this->primary_page,
            'profile_picture_uri'                             => $this->profile_picture_uri,
            'timezone_id'                                     => $this->timezone_id,
            'two_factor_type'                                 => $this->two_factor_type,
            'updated_by'                                      => $this->updated_by,
            'updated_time'                                    => $this->updated_time,
            'verification_status'                             => $this->verification_status,
            'vertical'                                        => $this->vertical,
            'vertical_id'                                     => $this->vertical_id,
        ];
    }
}
