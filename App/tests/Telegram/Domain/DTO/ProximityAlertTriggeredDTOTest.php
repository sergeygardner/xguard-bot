<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ProximityAlertTriggeredDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromProximityAlertTriggered(null));

        $id                          = time();
        $is_bot                      = true;
        $first_name                  = 'Bot';
        $last_name                   = 'Botter';
        $username                    = 'bot';
        $language_code               = 'en';
        $is_premium                  = true;
        $added_to_attachment_menu    = true;
        $can_join_groups             = true;
        $can_read_all_group_messages = true;
        $supports_inline_queries     = true;
        $traveler                    = [
            'id'                          => $id,
            'is_bot'                      => $is_bot,
            'first_name'                  => $first_name,
            'last_name'                   => $last_name,
            'username'                    => $username,
            'language_code'               => $language_code,
            'is_premium'                  => $is_premium,
            'added_to_attachment_menu'    => $added_to_attachment_menu,
            'can_join_groups'             => $can_join_groups,
            'can_read_all_group_messages' => $can_read_all_group_messages,
            'supports_inline_queries'     => $supports_inline_queries,
        ];
        $id                          = time() + 1;
        $is_bot                      = false;
        $first_name                  = 'Bot2';
        $last_name                   = 'Botter2';
        $username                    = 'bot2';
        $language_code               = 'en';
        $is_premium                  = false;
        $added_to_attachment_menu    = false;
        $can_join_groups             = false;
        $can_read_all_group_messages = false;
        $supports_inline_queries     = false;
        $watcher                     = [
            'id'                          => $id,
            'is_bot'                      => $is_bot,
            'first_name'                  => $first_name,
            'last_name'                   => $last_name,
            'username'                    => $username,
            'language_code'               => $language_code,
            'is_premium'                  => $is_premium,
            'added_to_attachment_menu'    => $added_to_attachment_menu,
            'can_join_groups'             => $can_join_groups,
            'can_read_all_group_messages' => $can_read_all_group_messages,
            'supports_inline_queries'     => $supports_inline_queries,
        ];
        $distance                    = 100;
        $proximityAlertTriggeredDTO  = $DTOFactoryService->createDTOFromProximityAlertTriggered(
            $proximityAlertTriggered = [
                'traveler' => $traveler,
                'watcher'  => $watcher,
                'distance' => $distance,
            ]
        );
        self::assertIsObject($proximityAlertTriggeredDTO);
        self::assertEquals($traveler, $proximityAlertTriggeredDTO->traveler->jsonSerialize());
        self::assertEquals($watcher, $proximityAlertTriggeredDTO->watcher->jsonSerialize());
        self::assertEquals($distance, $proximityAlertTriggeredDTO->distance);
        self::assertEquals(
            json_encode($proximityAlertTriggered, JSON_THROW_ON_ERROR),
            json_encode($proximityAlertTriggeredDTO, JSON_THROW_ON_ERROR)
        );
    }
}
