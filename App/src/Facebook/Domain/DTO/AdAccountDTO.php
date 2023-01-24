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
 * This class represents a business, person or other entity who creates and manages ads on Facebook.
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-account/
 */
class AdAccountDTO implements JsonSerializable
{

    /**
     * @param string                             $id
     * @param string                             $account_id
     * @param int|null                           $account_status
     * @param AdAccountPromotableObjectsDTO|null $ad_account_promotable_objects
     * @param float|null                         $age
     * @param AgencyClientDeclarationDTO|null    $agency_client_declaration
     * @param string|null                        $amount_spent
     * @param AttributionSpecDTO[]|null          $attribution_spec
     * @param string|null                        $balance
     * @param BusinessDTO|null                   $business
     * @param string|null                        $business_city
     * @param string|null                        $business_country_code
     * @param string|null                        $business_name
     * @param string|null                        $business_state
     * @param string|null                        $business_street
     * @param string|null                        $business_street2
     * @param string|null                        $business_zip
     * @param bool|null                          $can_create_brand_lift_study
     * @param string[]|null                      $capabilities
     * @param DateTimeInterface|null             $created_time
     * @param string|null                        $currency
     * @param bool|null                          $direct_deals_tos_accepted
     * @param int|null                           $disable_reason
     * @param string|null                        $end_advertiser
     * @param string|null                        $end_advertiser_name
     * @param string[]|null                      $existing_customers
     * @param ExtendedCreditInvoiceGroupDTO|null $extended_credit_invoice_group
     * @param DeliveryCheckDTO[]|null            $failed_delivery_checks
     * @param int|null                           $fb_entity
     * @param string|null                        $funding_source
     * @param FundingSourceDetailsDTO|null       $funding_source_details
     * @param bool|null                          $has_migrated_permissions
     * @param bool|null                          $has_page_authorized_adaccount
     * @param string|null                        $io_number
     * @param bool|null                          $is_attribution_spec_system_default
     * @param bool|null                          $is_direct_deals_enabled
     * @param bool|null                          $is_in_3ds_authorization_enabled_market
     * @param bool|null                          $is_notifications_enabled
     * @param int|null                           $is_personal
     * @param bool|null                          $is_prepay_account
     * @param bool|null                          $is_tax_id_required
     * @param int[]|null                         $line_numbers
     * @param string|null                        $media_agency
     * @param string|null                        $min_campaign_group_spend_cap
     * @param int|null                           $min_daily_budget
     * @param string|null                        $name
     * @param bool|null                          $offsite_pixels_tos_accepted
     * @param string|null                        $owner
     * @param string|null                        $partner
     * @param ReachFrequencySpecDTO|null         $rf_spec
     * @param bool|null                          $show_checkout_experience
     * @param string|null                        $spend_cap
     * @param string|null                        $tax_id
     * @param int|null                           $tax_id_status
     * @param string|null                        $tax_id_type
     * @param int                                $timezone_id
     * @param string|null                        $timezone_name
     * @param float|null                         $timezone_offset_hours_utc
     * @param int[]|null                         $tos_accepted
     * @param string[]|null                      $user_tasks
     * @param int[]|null                         $user_tos_accepted
     */
    public function __construct(
        public readonly string $id,
        public readonly string $account_id,
        public readonly ?int $account_status,
        public readonly ?AdAccountPromotableObjectsDTO $ad_account_promotable_objects,
        public readonly ?float $age,
        public readonly ?AgencyClientDeclarationDTO $agency_client_declaration,
        public readonly ?string $amount_spent,
        public readonly ?array $attribution_spec,
        public readonly ?string $balance,
        public readonly ?BusinessDTO $business,
        public readonly ?string $business_city,
        public readonly ?string $business_country_code,
        public readonly ?string $business_name,
        public readonly ?string $business_state,
        public readonly ?string $business_street,
        public readonly ?string $business_street2,
        public readonly ?string $business_zip,
        public readonly ?bool $can_create_brand_lift_study,
        public readonly ?array $capabilities,
        public readonly ?DateTimeInterface $created_time,
        public readonly ?string $currency,
        public readonly ?bool $direct_deals_tos_accepted,
        public readonly ?int $disable_reason,
        public readonly ?string $end_advertiser,
        public readonly ?string $end_advertiser_name,
        public readonly ?array $existing_customers,
        public readonly ?ExtendedCreditInvoiceGroupDTO $extended_credit_invoice_group,
        public readonly ?array $failed_delivery_checks,
        public readonly ?int $fb_entity,
        public readonly ?string $funding_source,
        public readonly ?FundingSourceDetailsDTO $funding_source_details,
        public readonly ?bool $has_migrated_permissions,
        public readonly ?bool $has_page_authorized_adaccount,
        public readonly ?string $io_number,
        public readonly ?bool $is_attribution_spec_system_default,
        public readonly ?bool $is_direct_deals_enabled,
        public readonly ?bool $is_in_3ds_authorization_enabled_market,
        public readonly ?bool $is_notifications_enabled,
        public readonly ?int $is_personal,
        public readonly ?bool $is_prepay_account,
        public readonly ?bool $is_tax_id_required,
        public readonly ?array $line_numbers,
        public readonly ?string $media_agency,
        public readonly ?string $min_campaign_group_spend_cap,
        public readonly ?int $min_daily_budget,
        public readonly ?string $name,
        public readonly ?bool $offsite_pixels_tos_accepted,
        public readonly ?string $owner,
        public readonly ?string $partner,
        public readonly ?ReachFrequencySpecDTO $rf_spec,
        public readonly ?bool $show_checkout_experience,
        public readonly ?string $spend_cap,
        public readonly ?string $tax_id,
        public readonly ?int $tax_id_status,
        public readonly ?string $tax_id_type,
        public readonly int $timezone_id,
        public readonly ?string $timezone_name,
        public readonly ?float $timezone_offset_hours_utc,
        public readonly ?array $tos_accepted,
        public readonly ?array $user_tasks,
        public readonly ?array $user_tos_accepted
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                                     => $this->id,
            'account_id'                             => $this->account_id,
            'account_status'                         => $this->account_status,
            'ad_account_promotable_objects'          => $this->ad_account_promotable_objects,
            'age'                                    => $this->age,
            'agency_client_declaration'              => $this->agency_client_declaration,
            'amount_spent'                           => $this->amount_spent,
            'attribution_spec'                       => $this->attribution_spec,
            'balance'                                => $this->balance,
            'business'                               => $this->business,
            'business_city'                          => $this->business_city,
            'business_country_code'                  => $this->business_country_code,
            'business_name'                          => $this->business_name,
            'business_state'                         => $this->business_state,
            'business_street'                        => $this->business_street,
            'business_street2'                       => $this->business_street2,
            'business_zip'                           => $this->business_zip,
            'can_create_brand_lift_study'            => $this->can_create_brand_lift_study,
            'capabilities'                           => $this->capabilities,
            'created_time'                           => $this->created_time,
            'currency'                               => $this->currency,
            'direct_deals_tos_accepted'              => $this->direct_deals_tos_accepted,
            'disable_reason'                         => $this->disable_reason,
            'end_advertiser'                         => $this->end_advertiser,
            'end_advertiser_name'                    => $this->end_advertiser_name,
            'existing_customers'                     => $this->existing_customers,
            'extended_credit_invoice_group'          => $this->extended_credit_invoice_group,
            'failed_delivery_checks'                 => $this->failed_delivery_checks,
            'fb_entity'                              => $this->fb_entity,
            'funding_source'                         => $this->funding_source,
            'funding_source_details'                 => $this->funding_source_details,
            'has_migrated_permissions'               => $this->has_migrated_permissions,
            'has_page_authorized_adaccount'          => $this->has_page_authorized_adaccount,
            'io_number'                              => $this->io_number,
            'is_attribution_spec_system_default'     => $this->is_attribution_spec_system_default,
            'is_direct_deals_enabled'                => $this->is_direct_deals_enabled,
            'is_in_3ds_authorization_enabled_market' => $this->is_in_3ds_authorization_enabled_market,
            'is_notifications_enabled'               => $this->is_notifications_enabled,
            'is_personal'                            => $this->is_personal,
            'is_prepay_account'                      => $this->is_prepay_account,
            'is_tax_id_required'                     => $this->is_tax_id_required,
            'line_numbers'                           => $this->line_numbers,
            'media_agency'                           => $this->media_agency,
            'min_campaign_group_spend_cap'           => $this->min_campaign_group_spend_cap,
            'min_daily_budget'                       => $this->min_daily_budget,
            'name'                                   => $this->name,
            'offsite_pixels_tos_accepted'            => $this->offsite_pixels_tos_accepted,
            'owner'                                  => $this->owner,
            'partner'                                => $this->partner,
            'rf_spec'                                => $this->rf_spec,
            'show_checkout_experience'               => $this->show_checkout_experience,
            'spend_cap'                              => $this->spend_cap,
            'tax_id'                                 => $this->tax_id,
            'tax_id_status'                          => $this->tax_id_status,
            'tax_id_type'                            => $this->tax_id_type,
            'timezone_id'                            => $this->timezone_id,
            'timezone_name'                          => $this->timezone_name,
            'timezone_offset_hours_utc'              => $this->timezone_offset_hours_utc,
            'tos_accepted'                           => $this->tos_accepted,
            'user_tasks'                             => $this->user_tasks,
            'user_tos_accepted'                      => $this->user_tos_accepted,
        ];
    }
}
