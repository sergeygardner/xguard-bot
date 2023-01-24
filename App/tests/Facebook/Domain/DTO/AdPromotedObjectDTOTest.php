<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Enum\CustomEventTypeEnum;

/**
 *
 */
final class AdPromotedObjectDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'RATE',//CustomEventTypeEnum::RATE
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'TUTORIAL_COMPLETION',//CustomEventTypeEnum::TUTORIAL_COMPLETION
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'CONTACT',//CustomEventTypeEnum::CONTACT
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'CUSTOMIZE_PRODUCT',//CustomEventTypeEnum::CUSTOMIZE_PRODUCT
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'DONATE',//CustomEventTypeEnum::DONATE
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'FIND_LOCATION',//CustomEventTypeEnum::FIND_LOCATION
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'SCHEDULE',//CustomEventTypeEnum::SCHEDULE
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'START_TRIAL',//CustomEventTypeEnum::START_TRIAL
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'SUBMIT_APPLICATION',//CustomEventTypeEnum::SUBMIT_APPLICATION
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'SUBSCRIBE',//CustomEventTypeEnum::SUBSCRIBE
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'ADD_TO_CART',//CustomEventTypeEnum::ADD_TO_CART
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'ADD_TO_WISHLIST',//CustomEventTypeEnum::ADD_TO_WISHLIST
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'INITIATED_CHECKOUT',//CustomEventTypeEnum::INITIATED_CHECKOUT
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'ADD_PAYMENT_INFO',//CustomEventTypeEnum::ADD_PAYMENT_INFO
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'PURCHASE',//CustomEventTypeEnum::PURCHASE
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'LEAD',//CustomEventTypeEnum::LEAD
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'COMPLETE_REGISTRATION',
                    //CustomEventTypeEnum::COMPLETE_REGISTRATION
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'CONTENT_VIEW',//CustomEventTypeEnum::CONTENT_VIEW
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'SEARCH',//CustomEventTypeEnum::SEARCH
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'SERVICE_BOOKING_REQUEST',
                    //CustomEventTypeEnum::SERVICE_BOOKING_REQUEST
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'MESSAGING_CONVERSATION_STARTED_7D',
                    //CustomEventTypeEnum::MESSAGING_CONVERSATION_STARTED_7D
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'LEVEL_ACHIEVED',//CustomEventTypeEnum::LEVEL_ACHIEVED
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'ACHIEVEMENT_UNLOCKED',
                    //CustomEventTypeEnum::ACHIEVEMENT_UNLOCKED
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'SPENT_CREDITS',//CustomEventTypeEnum::SPENT_CREDITS
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'LISTING_INTERACTION',//CustomEventTypeEnum::LISTING_INTERACTION
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'D2_RETENTION',//CustomEventTypeEnum::D2_RETENTION
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'D7_RETENTION',//CustomEventTypeEnum::D7_RETENTION
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'OTHER',//CustomEventTypeEnum::OTHER
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                '',
            ],
            [
                [
                    'application_id'                 => 'application_id',
                    'conversion_goal_id'             => 'conversion_goal_id',
                    'custom_conversion_id'           => 'custom_conversion_id',
                    'custom_event_str'               => 'custom_event_str',
                    'custom_event_type'              => 'OTHER2',//CustomEventTypeEnum::OTHER2?
                    'event_id'                       => 'event_id',
                    'object_store_url'               => 'object_store_url',
                    'offer_id'                       => 'offer_id',
                    'offline_conversion_data_set_id' => 'offline_conversion_data_set_id',
                    'offsite_conversion_event_id'    => 'offsite_conversion_event_id',
                    'page_id'                        => 'page_id',
                    'pixel_aggregation_rule'         => 'pixel_aggregation_rule',
                    'pixel_id'                       => 'pixel_id',
                    'pixel_rule'                     => 'pixel_rule',
                    'place_page_set_id'              => 'place_page_set_id',
                    'product_catalog_id'             => 'product_catalog_id',
                    'product_set_id'                 => 'product_set_id',
                    'retention_days'                 => 'retention_days',
                ],
                TypeError::class,
            ],
        ];
    }

    /**
     * @param array  $data
     * @param string $exception
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data, string $exception): void
    {
        if (!empty($exception)) {
            $this->expectException($exception);
        }

        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromAdPromotedObject(null));

        $adPromotedObjectDTO = $DTOFactoryService->createDTOFromAdPromotedObject($data);

        self::assertIsObject($adPromotedObjectDTO);
        self::assertEquals($data['application_id'], $adPromotedObjectDTO->application_id);
        self::assertEquals($data['conversion_goal_id'], $adPromotedObjectDTO->conversion_goal_id);
        self::assertEquals($data['custom_conversion_id'], $adPromotedObjectDTO->custom_conversion_id);
        self::assertEquals($data['custom_event_str'], $adPromotedObjectDTO->custom_event_str);
        self::assertEquals(
            constant((CustomEventTypeEnum::class).'::'.$data['custom_event_type']),
            $adPromotedObjectDTO->custom_event_type
        );
        self::assertEquals($data['event_id'], $adPromotedObjectDTO->event_id);
        self::assertEquals($data['object_store_url'], $adPromotedObjectDTO->object_store_url);
        self::assertEquals($data['offer_id'], $adPromotedObjectDTO->offer_id);
        self::assertEquals(
            $data['offline_conversion_data_set_id'],
            $adPromotedObjectDTO->offline_conversion_data_set_id
        );
        self::assertEquals($data['offsite_conversion_event_id'], $adPromotedObjectDTO->offsite_conversion_event_id);
        self::assertEquals($data['page_id'], $adPromotedObjectDTO->page_id);
        self::assertEquals($data['pixel_aggregation_rule'], $adPromotedObjectDTO->pixel_aggregation_rule);
        self::assertEquals($data['pixel_id'], $adPromotedObjectDTO->pixel_id);
        self::assertEquals($data['pixel_rule'], $adPromotedObjectDTO->pixel_rule);
        self::assertEquals($data['place_page_set_id'], $adPromotedObjectDTO->place_page_set_id);
        self::assertEquals($data['product_catalog_id'], $adPromotedObjectDTO->product_catalog_id);
        self::assertEquals($data['product_set_id'], $adPromotedObjectDTO->product_set_id);
        self::assertEquals($data['retention_days'], $adPromotedObjectDTO->retention_days);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adPromotedObjectDTO, JSON_THROW_ON_ERROR)
        );
    }
}
