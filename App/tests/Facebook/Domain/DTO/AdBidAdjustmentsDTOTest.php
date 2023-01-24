<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class AdBidAdjustmentsDTOTest extends TestCase
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

        self::assertNull($DTOFactoryService->createDTOFromAdBidAdjustments(null));

        $adBidAdjustmentsDTO = $DTOFactoryService->createDTOFromAdBidAdjustments($data);

        self::assertIsObject($adBidAdjustmentsDTO);
        self::assertEquals($data[0], $adBidAdjustmentsDTO->{0});
        self::assertIsBool(isset($adBidAdjustmentsDTO->{0}));
        self::assertEquals($data, $adBidAdjustmentsDTO->jsonSerialize());
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adBidAdjustmentsDTO, JSON_THROW_ON_ERROR)
        );

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $adBidAdjustmentsDTO->{0} = $data;
    }
}
