<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class UserDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromUsers(null));
        self::assertNull($DTOFactoryService->createDTOFromUser(null));

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
        $userDTO                     = $DTOFactoryService->createDTOFromUser(
            $user = [
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
            ]
        );
        $usersDTO                    = $DTOFactoryService->createDTOFromUsers([$user]);

        foreach ([$userDTO, ...$usersDTO] as $userDTOItem) {
            self::assertIsObject($userDTOItem);
            self::assertEquals($id, $userDTOItem->id);
            self::assertEquals($is_bot, $userDTOItem->is_bot);
            self::assertEquals($first_name, $userDTOItem->first_name);
            self::assertEquals($last_name, $userDTOItem->last_name);
            self::assertEquals($username, $userDTOItem->username);
            self::assertEquals($language_code, $userDTOItem->language_code);
            self::assertEquals($is_premium, $userDTOItem->is_premium);
            self::assertEquals($added_to_attachment_menu, $userDTOItem->added_to_attachment_menu);
            self::assertEquals($can_join_groups, $userDTOItem->can_join_groups);
            self::assertEquals($can_read_all_group_messages, $userDTOItem->can_read_all_group_messages);
            self::assertEquals($supports_inline_queries, $userDTOItem->supports_inline_queries);
            self::assertEquals(
                json_encode($user, JSON_THROW_ON_ERROR),
                json_encode($userDTOItem, JSON_THROW_ON_ERROR)
            );
        }
    }
}
