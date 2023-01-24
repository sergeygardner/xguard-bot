<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class PollOptionDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromPollOptions(null));
        self::assertNull($DTOFactoryService->createDTOFromPollOption(null));

        $text           = 'PollOptionText';
        $voter_count    = 33;
        $pollOptionDTO  = $DTOFactoryService->createDTOFromPollOption(
            $pollOption = [
                'text'        => $text,
                'voter_count' => $voter_count,
            ]
        );
        $pollOptionsDTO = $DTOFactoryService->createDTOFromPollOptions([$pollOption]);

        foreach ([$pollOptionDTO, ...$pollOptionsDTO] as $pollOptionDTOItem) {
            self::assertIsObject($pollOptionDTOItem);
            self::assertEquals($text, $pollOptionDTOItem->text);
            self::assertEquals($voter_count, $pollOptionDTOItem->voter_count);
            self::assertEquals(
                json_encode($pollOption, JSON_THROW_ON_ERROR),
                json_encode($pollOptionDTOItem, JSON_THROW_ON_ERROR)
            );
        }
    }
}
