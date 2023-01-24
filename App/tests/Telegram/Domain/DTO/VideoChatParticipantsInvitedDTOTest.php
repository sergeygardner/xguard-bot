<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class VideoChatParticipantsInvitedDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVideoChatParticipantsInvited(null));

        $users                           = [];
        $videoChatParticipantsInvitedDTO = $DTOFactoryService->createDTOFromVideoChatParticipantsInvited(
            ['users' => $users]
        );
        self::assertIsObject($videoChatParticipantsInvitedDTO);
        self::assertEquals($users, $videoChatParticipantsInvitedDTO->users);
        self::assertEquals(
            json_encode(['users' => $users,], JSON_THROW_ON_ERROR),
            json_encode($videoChatParticipantsInvitedDTO, JSON_THROW_ON_ERROR)
        );
    }
}
