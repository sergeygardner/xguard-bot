<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class EngagementDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'count'                        => 1,
                    'count_string'                 => null,
                    'count_string_with_like'       => null,
                    'count_string_without_like'    => null,
                    'social_sentence'              => 'social_sentence',
                    'social_sentence_with_like'    => null,
                    'social_sentence_without_like' => null,
                ],
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromEngagement(null));

        $engagementDTO = $DTOFactoryService->createDTOFromEngagement($data);

        self::assertIsObject($engagementDTO);
        self::assertEquals($data['count'], $engagementDTO->count);
        self::assertEquals($data['count_string'], $engagementDTO->count_string);
        self::assertEquals($data['count_string_with_like'], $engagementDTO->count_string_with_like);
        self::assertEquals($data['count_string_without_like'], $engagementDTO->count_string_without_like);
        self::assertEquals($data['social_sentence'], $engagementDTO->social_sentence);
        self::assertEquals($data['social_sentence_with_like'], $engagementDTO->social_sentence_with_like);
        self::assertEquals($data['social_sentence_without_like'], $engagementDTO->social_sentence_without_like);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($engagementDTO, JSON_THROW_ON_ERROR)
        );
    }
}
