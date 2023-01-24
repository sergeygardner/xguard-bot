<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class AdCampaignBidConstraintDTOTest extends TestCase
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
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromAdCampaignBidConstraint(null));

        $adCampaignBidConstraintDTO = $DTOFactoryService->createDTOFromAdCampaignBidConstraint($data);

        self::assertIsObject($adCampaignBidConstraintDTO);
        self::assertEquals($data[0], $adCampaignBidConstraintDTO->{0});
        self::assertIsBool(isset($adCampaignBidConstraintDTO->{0}));
        self::assertEquals($data, $adCampaignBidConstraintDTO->jsonSerialize());
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adCampaignBidConstraintDTO, JSON_THROW_ON_ERROR)
        );

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $adCampaignBidConstraintDTO->{0} = $data;
    }
}
