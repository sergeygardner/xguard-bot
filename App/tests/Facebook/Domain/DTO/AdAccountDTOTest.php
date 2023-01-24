<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class AdAccountDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'                                     => '1111',
                    'account_id'                             => '22222',
                    'account_status'                         => null,
                    'ad_account_promotable_objects'          => null,
                    'age'                                    => null,
                    'agency_client_declaration'              => null,
                    'amount_spent'                           => null,
                    'attribution_spec'                       => null,
                    'balance'                                => null,
                    'business'                               => null,
                    'business_city'                          => null,
                    'business_country_code'                  => null,
                    'business_name'                          => null,
                    'business_state'                         => null,
                    'business_street'                        => null,
                    'business_street2'                       => null,
                    'business_zip'                           => null,
                    'can_create_brand_lift_study'            => null,
                    'capabilities'                           => null,
                    'created_time'                           => null,
                    'currency'                               => null,
                    'direct_deals_tos_accepted'              => null,
                    'disable_reason'                         => null,
                    'end_advertiser'                         => null,
                    'end_advertiser_name'                    => null,
                    'existing_customers'                     => null,
                    'extended_credit_invoice_group'          => null,
                    'failed_delivery_checks'                 => null,
                    'fb_entity'                              => null,
                    'funding_source'                         => null,
                    'funding_source_details'                 => null,
                    'has_migrated_permissions'               => null,
                    'has_page_authorized_adaccount'          => null,
                    'io_number'                              => null,
                    'is_attribution_spec_system_default'     => null,
                    'is_direct_deals_enabled'                => null,
                    'is_in_3ds_authorization_enabled_market' => null,
                    'is_notifications_enabled'               => null,
                    'is_personal'                            => null,
                    'is_prepay_account'                      => null,
                    'is_tax_id_required'                     => null,
                    'line_numbers'                           => null,
                    'media_agency'                           => null,
                    'min_campaign_group_spend_cap'           => null,
                    'min_daily_budget'                       => null,
                    'name'                                   => null,
                    'offsite_pixels_tos_accepted'            => null,
                    'owner'                                  => null,
                    'partner'                                => null,
                    'rf_spec'                                => null,
                    'show_checkout_experience'               => null,
                    'spend_cap'                              => null,
                    'tax_id'                                 => null,
                    'tax_id_status'                          => null,
                    'tax_id_type'                            => null,
                    'timezone_id'                            => 1,
                    'timezone_name'                          => null,
                    'timezone_offset_hours_utc'              => null,
                    'tos_accepted'                           => null,
                    'user_tasks'                             => null,
                    'user_tos_accepted'                      => null,
                ],
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromAdAccount(null));

        $adAccountDTO = $DTOFactoryService->createDTOFromAdAccount($data);

        self::assertIsObject($adAccountDTO);
        self::assertEquals($data['id'], $adAccountDTO->id);
        self::assertEquals($data['account_id'], $adAccountDTO->account_id);
        self::assertEquals($data['account_status'], $adAccountDTO->account_status);
        self::assertEquals($data['ad_account_promotable_objects'], $adAccountDTO->ad_account_promotable_objects);
        self::assertEquals($data['age'], $adAccountDTO->age);
        self::assertEquals($data['agency_client_declaration'], $adAccountDTO->agency_client_declaration);
        self::assertEquals($data['amount_spent'], $adAccountDTO->amount_spent);
        self::assertEquals($data['attribution_spec'], $adAccountDTO->attribution_spec);
        self::assertEquals($data['balance'], $adAccountDTO->balance);
        self::assertEquals($data['business'], $adAccountDTO->business);
        self::assertEquals($data['business_city'], $adAccountDTO->business_city);
        self::assertEquals($data['business_country_code'], $adAccountDTO->business_country_code);
        self::assertEquals($data['business_name'], $adAccountDTO->business_name);
        self::assertEquals($data['business_state'], $adAccountDTO->business_state);
        self::assertEquals($data['business_street'], $adAccountDTO->business_street);
        self::assertEquals($data['business_street2'], $adAccountDTO->business_street2);
        self::assertEquals($data['business_zip'], $adAccountDTO->business_zip);
        self::assertEquals($data['can_create_brand_lift_study'], $adAccountDTO->can_create_brand_lift_study);
        self::assertEquals($data['capabilities'], $adAccountDTO->capabilities);
        self::assertEquals($data['created_time'], $adAccountDTO->created_time);
        self::assertEquals($data['currency'], $adAccountDTO->currency);
        self::assertEquals($data['direct_deals_tos_accepted'], $adAccountDTO->direct_deals_tos_accepted);
        self::assertEquals($data['disable_reason'], $adAccountDTO->disable_reason);
        self::assertEquals($data['end_advertiser'], $adAccountDTO->end_advertiser);
        self::assertEquals($data['end_advertiser_name'], $adAccountDTO->end_advertiser_name);
        self::assertEquals($data['existing_customers'], $adAccountDTO->existing_customers);
        self::assertEquals($data['extended_credit_invoice_group'], $adAccountDTO->extended_credit_invoice_group);
        self::assertEquals($data['failed_delivery_checks'], $adAccountDTO->failed_delivery_checks);
        self::assertEquals($data['fb_entity'], $adAccountDTO->fb_entity);
        self::assertEquals($data['funding_source'], $adAccountDTO->funding_source);
        self::assertEquals($data['funding_source_details'], $adAccountDTO->funding_source_details);
        self::assertEquals($data['has_migrated_permissions'], $adAccountDTO->has_migrated_permissions);
        self::assertEquals($data['has_page_authorized_adaccount'], $adAccountDTO->has_page_authorized_adaccount);
        self::assertEquals($data['io_number'], $adAccountDTO->io_number);
        self::assertEquals(
            $data['is_attribution_spec_system_default'],
            $adAccountDTO->is_attribution_spec_system_default
        );
        self::assertEquals($data['is_direct_deals_enabled'], $adAccountDTO->is_direct_deals_enabled);
        self::assertEquals(
            $data['is_in_3ds_authorization_enabled_market'],
            $adAccountDTO->is_in_3ds_authorization_enabled_market
        );
        self::assertEquals($data['is_notifications_enabled'], $adAccountDTO->is_notifications_enabled);
        self::assertEquals($data['is_personal'], $adAccountDTO->is_personal);
        self::assertEquals($data['is_prepay_account'], $adAccountDTO->is_prepay_account);
        self::assertEquals($data['is_tax_id_required'], $adAccountDTO->is_tax_id_required);
        self::assertEquals($data['line_numbers'], $adAccountDTO->line_numbers);
        self::assertEquals($data['media_agency'], $adAccountDTO->media_agency);
        self::assertEquals($data['min_campaign_group_spend_cap'], $adAccountDTO->min_campaign_group_spend_cap);
        self::assertEquals($data['min_daily_budget'], $adAccountDTO->min_daily_budget);
        self::assertEquals($data['name'], $adAccountDTO->name);
        self::assertEquals($data['offsite_pixels_tos_accepted'], $adAccountDTO->offsite_pixels_tos_accepted);
        self::assertEquals($data['owner'], $adAccountDTO->owner);
        self::assertEquals($data['partner'], $adAccountDTO->partner);
        self::assertEquals($data['rf_spec'], $adAccountDTO->rf_spec);
        self::assertEquals($data['show_checkout_experience'], $adAccountDTO->show_checkout_experience);
        self::assertEquals($data['spend_cap'], $adAccountDTO->spend_cap);
        self::assertEquals($data['tax_id'], $adAccountDTO->tax_id);
        self::assertEquals($data['tax_id_status'], $adAccountDTO->tax_id_status);
        self::assertEquals($data['tax_id_type'], $adAccountDTO->tax_id_type);
        self::assertEquals($data['timezone_id'], $adAccountDTO->timezone_id);
        self::assertEquals($data['timezone_name'], $adAccountDTO->timezone_name);
        self::assertEquals($data['timezone_offset_hours_utc'], $adAccountDTO->timezone_offset_hours_utc);
        self::assertEquals($data['tos_accepted'], $adAccountDTO->tos_accepted);
        self::assertEquals($data['user_tasks'], $adAccountDTO->user_tasks);
        self::assertEquals($data['user_tos_accepted'], $adAccountDTO->user_tos_accepted);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adAccountDTO, JSON_THROW_ON_ERROR)
        );
    }
}
