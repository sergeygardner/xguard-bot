<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class AdRecommendationDataDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [null],
            ],
            [
                [1],
            ],
            [
                ['test'],
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromAdRecommendationData(null));

        $adRecommendationDataDTO = $DTOFactoryService->createDTOFromAdRecommendationData($data);

        self::assertIsObject($adRecommendationDataDTO);
        self::assertEquals($data[0], $adRecommendationDataDTO->{0});
        self::assertIsBool(isset($adRecommendationDataDTO->{0}));
        self::assertEquals($data, $adRecommendationDataDTO->jsonSerialize());

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $adRecommendationDataDTO->{0} = $data;
    }
}
