<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class LocationDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromLocation(null));

        $longitude              = 0.0;
        $latitude               = 0.0;
        $horizontal_accuracy    = 1;
        $live_period            = 300;
        $heading                = 5;
        $proximity_alert_radius = 10;
        $locationDTO            = $DTOFactoryService->createDTOFromLocation(
            $location = [
                'longitude'              => $longitude,
                'latitude'               => $latitude,
                'horizontal_accuracy'    => $horizontal_accuracy,
                'live_period'            => $live_period,
                'heading'                => $heading,
                'proximity_alert_radius' => $proximity_alert_radius,
            ]
        );
        self::assertIsObject($locationDTO);
        self::assertEquals($longitude, $locationDTO->longitude);
        self::assertEquals($latitude, $locationDTO->latitude);
        self::assertEquals($horizontal_accuracy, $locationDTO->horizontal_accuracy);
        self::assertEquals($live_period, $locationDTO->live_period);
        self::assertEquals($heading, $locationDTO->heading);
        self::assertEquals($proximity_alert_radius, $locationDTO->proximity_alert_radius);
        self::assertEquals(
            json_encode($location, JSON_THROW_ON_ERROR),
            json_encode($locationDTO, JSON_THROW_ON_ERROR)
        );
    }
}
