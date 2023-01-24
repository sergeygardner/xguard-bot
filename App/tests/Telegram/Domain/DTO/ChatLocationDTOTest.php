<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ChatLocationDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromChatLocation(null));

        $longitude              = 0.0;
        $latitude               = 0.0;
        $horizontal_accuracy    = 100;
        $live_period            = 1000;
        $heading                = 10;
        $proximity_alert_radius = 100;
        $address                = 'test';
        $chatLocationDTO        = $DTOFactoryService->createDTOFromChatLocation(
            $chatLocation = [
                'location' => [
                    'longitude'              => $longitude,
                    'latitude'               => $latitude,
                    'horizontal_accuracy'    => $horizontal_accuracy,
                    'live_period'            => $live_period,
                    'heading'                => $heading,
                    'proximity_alert_radius' => $proximity_alert_radius,
                ],
                'address'  => $address,
            ]
        );

        self::assertIsObject($chatLocationDTO);
        self::assertEquals($longitude, $chatLocationDTO->location->longitude);
        self::assertEquals($latitude, $chatLocationDTO->location->latitude);
        self::assertEquals($horizontal_accuracy, $chatLocationDTO->location->horizontal_accuracy);
        self::assertEquals($live_period, $chatLocationDTO->location->live_period);
        self::assertEquals($heading, $chatLocationDTO->location->heading);
        self::assertEquals($proximity_alert_radius, $chatLocationDTO->location->proximity_alert_radius);
        self::assertEquals($address, $chatLocationDTO->address);
        self::assertEquals(
            json_encode($chatLocation, JSON_THROW_ON_ERROR),
            json_encode($chatLocationDTO, JSON_THROW_ON_ERROR)
        );
    }
}
