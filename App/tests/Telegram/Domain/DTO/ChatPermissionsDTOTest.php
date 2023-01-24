<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ChatPermissionsDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromChatPermissions(null));

        $can_send_messages         = true;
        $can_send_media_messages   = true;
        $can_send_polls            = true;
        $can_send_other_messages   = true;
        $can_add_web_page_previews = true;
        $can_change_info           = true;
        $can_invite_users          = true;
        $can_pin_messages          = true;
        $can_manage_topics         = true;
        $chatPermissionsDTO        = $DTOFactoryService->createDTOFromChatPermissions(
            $chatPermissions = [
                'can_send_messages'         => $can_send_messages,
                'can_send_media_messages'   => $can_send_media_messages,
                'can_send_polls'            => $can_send_polls,
                'can_send_other_messages'   => $can_send_other_messages,
                'can_add_web_page_previews' => $can_add_web_page_previews,
                'can_change_info'           => $can_change_info,
                'can_invite_users'          => $can_invite_users,
                'can_pin_messages'          => $can_pin_messages,
                'can_manage_topics'         => $can_manage_topics,
            ]
        );

        self::assertIsObject($chatPermissionsDTO);
        self::assertEquals($can_send_messages, $chatPermissionsDTO->can_send_messages);
        self::assertEquals($can_send_media_messages, $chatPermissionsDTO->can_send_media_messages);
        self::assertEquals($can_send_polls, $chatPermissionsDTO->can_send_polls);
        self::assertEquals($can_send_other_messages, $chatPermissionsDTO->can_send_other_messages);
        self::assertEquals($can_add_web_page_previews, $chatPermissionsDTO->can_add_web_page_previews);
        self::assertEquals($can_change_info, $chatPermissionsDTO->can_change_info);
        self::assertEquals($can_invite_users, $chatPermissionsDTO->can_invite_users);
        self::assertEquals($can_pin_messages, $chatPermissionsDTO->can_pin_messages);
        self::assertEquals($can_manage_topics, $chatPermissionsDTO->can_manage_topics);
        self::assertEquals(
            json_encode($chatPermissions, JSON_THROW_ON_ERROR),
            json_encode($chatPermissionsDTO, JSON_THROW_ON_ERROR)
        );
    }
}
