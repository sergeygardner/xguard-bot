<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class VenueDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVenue(null));

        $longitude              = 0.0;
        $latitude               = 0.0;
        $horizontal_accuracy    = 1;
        $live_period            = 300;
        $heading                = 5;
        $proximity_alert_radius = 10;
        $location               = [
            'longitude'              => $longitude,
            'latitude'               => $latitude,
            'horizontal_accuracy'    => $horizontal_accuracy,
            'live_period'            => $live_period,
            'heading'                => $heading,
            'proximity_alert_radius' => $proximity_alert_radius,
        ];
        $title                  = 'Title';
        $address                = 'Address';
        $foursquare_id          = 'foursquare_id';
        $foursquare_type        = 'park/common';
        $google_place_id        = 'google_place_id';
        $google_place_type      = 'park';
        $venueDTO               = $DTOFactoryService->createDTOFromVenue(
            $venue = [
                'location'          => $location,
                'title'             => $title,
                'address'           => $address,
                'foursquare_id'     => $foursquare_id,
                'foursquare_type'   => $foursquare_type,
                'google_place_id'   => $google_place_id,
                'google_place_type' => $google_place_type,
            ]
        );
        self::assertIsObject($venueDTO);
        self::assertEquals($location, $venueDTO->location->jsonSerialize());
        self::assertEquals($title, $venueDTO->title);
        self::assertEquals($address, $venueDTO->address);
        self::assertEquals($foursquare_id, $venueDTO->foursquare_id);
        self::assertEquals($foursquare_type, $venueDTO->foursquare_type);
        self::assertEquals($google_place_id, $venueDTO->google_place_id);
        self::assertEquals($google_place_type, $venueDTO->google_place_type);
        self::assertEquals(
            json_encode($venue, JSON_THROW_ON_ERROR),
            json_encode($venueDTO, JSON_THROW_ON_ERROR)
        );
    }
}
