<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class ApplicationRestrictionInfoDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'age'              => 'age',
                    'age_distribution' => 'age_distribution',
                    'location'         => 'location',
                    'type'             => 'type',
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

        self::assertNull($DTOFactoryService->createDTOFromApplicationRestrictionInfo(null));

        $applicationRestrictionInfoDTO = $DTOFactoryService->createDTOFromApplicationRestrictionInfo($data);

        self::assertIsObject($applicationRestrictionInfoDTO);
        self::assertEquals($data['age'], $applicationRestrictionInfoDTO->age);
        self::assertEquals($data['age_distribution'], $applicationRestrictionInfoDTO->age_distribution);
        self::assertEquals($data['location'], $applicationRestrictionInfoDTO->location);
        self::assertEquals($data['type'], $applicationRestrictionInfoDTO->type);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($applicationRestrictionInfoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
