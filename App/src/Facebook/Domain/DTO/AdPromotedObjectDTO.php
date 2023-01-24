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

use JsonSerializable;
use XGuard\Bot\Facebook\Domain\Enum\CustomEventTypeEnum;

/**
 * This class represents an object an ad set promotes, such as a Page or app.
 * @see https://developers.facebook.com/docs/marketing-api/reference/ad-promoted-object/
 */
class AdPromotedObjectDTO implements JsonSerializable
{

    /**
     * @param string              $application_id                 [Default] The ID of a Facebook Application. Usually related to mobile or canvas games being promoted on Facebook for installs or engagement
     * @param string              $conversion_goal_id             [Default] The ID of conversion goal used for conversion specs and tracking specs generation
     * @param string              $custom_conversion_id           [Default] The ID of a Custom Conversion.
     * @param string              $custom_event_str               [Default] The event from an App Event of a mobile app, which is not in the standard event list. A custom_event_type = OTHER is required
     * @param CustomEventTypeEnum $custom_event_type              [Default] The event from an App Event of a mobile app, (Purchase, Lead or CompleteRegistration) event from Offline Conversion data, or tag of a conversion pixel.
     * @param string              $event_id                       [Default] The ID of a Facebook Event
     * @param string              $object_store_url               [Default] The uri of the mobile / digital store where an application can be bought / downloaded.
     *                                                            This is platform-specific. When combined with the "aplication_id" this uniquely specifies an object which can be the subject of a Facebook advertising campaign.
     * @param string              $offer_id                       [Default] The ID of an Offer from a Facebook Page.
     * @param string              $offline_conversion_data_set_id [Default] The ID of the offline dataset.
     * @param string              $offsite_conversion_event_id    [Default] offsite_conversion_event_id
     * @param string              $page_id                        [Default] The ID of a Facebook Page
     * @param string              $pixel_aggregation_rule         [Default] A JSON rule that will decide whether an action from a pixel matches this promoted object spec based on aggregated results from previous pixel fires.
     * @param string              $pixel_id                       [Default] The ID of a Facebook conversion pixel. Used with offsite conversion campaigns.
     * @param string              $pixel_rule                     [Default] A JSON rule that will decide whether an action from a pixel matches this promoted object spec
     * @param string              $place_page_set_id              [Default] The ID of a Place Page Set for Dynamic Local Ads.
     * @param string              $product_catalog_id             [Default] The ID of a Product Catalog. Used with Dynamic Product Ads.
     * @param string              $product_set_id                 [Default] The ID of a Product Set within an Ad Set level Product Catalog. Used with Dynamic Product Ads.
     * @param string              $retention_days                 [Default] Value for a retention period for aggregation-based rule for the promoted object.
     */
    public function __construct(
        public readonly string $application_id,
        public readonly string $conversion_goal_id,
        public readonly string $custom_conversion_id,
        public readonly string $custom_event_str,
        public readonly CustomEventTypeEnum $custom_event_type,
        public readonly string $event_id,
        public readonly string $object_store_url,
        public readonly string $offer_id,
        public readonly string $offline_conversion_data_set_id,
        public readonly string $offsite_conversion_event_id,
        public readonly string $page_id,
        public readonly string $pixel_aggregation_rule,
        public readonly string $pixel_id,
        public readonly string $pixel_rule,
        public readonly string $place_page_set_id,
        public readonly string $product_catalog_id,
        public readonly string $product_set_id,
        public readonly string $retention_days
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'application_id'                 => $this->application_id,
            'conversion_goal_id'             => $this->conversion_goal_id,
            'custom_conversion_id'           => $this->custom_conversion_id,
            'custom_event_str'               => $this->custom_event_str,
            'custom_event_type'              => $this->custom_event_type,
            'event_id'                       => $this->event_id,
            'object_store_url'               => $this->object_store_url,
            'offer_id'                       => $this->offer_id,
            'offline_conversion_data_set_id' => $this->offline_conversion_data_set_id,
            'offsite_conversion_event_id'    => $this->offsite_conversion_event_id,
            'page_id'                        => $this->page_id,
            'pixel_aggregation_rule'         => $this->pixel_aggregation_rule,
            'pixel_id'                       => $this->pixel_id,
            'pixel_rule'                     => $this->pixel_rule,
            'place_page_set_id'              => $this->place_page_set_id,
            'product_catalog_id'             => $this->product_catalog_id,
            'product_set_id'                 => $this->product_set_id,
            'retention_days'                 => $this->retention_days,
        ];
    }
}
