<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class FundingSourceDetailsDTOTest extends TestCase
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

        self::assertNull($DTOFactoryService->createDTOFromFundingSourceDetails(null));

        $fundingSourceDetailsDTO = $DTOFactoryService->createDTOFromFundingSourceDetails($data);

        self::assertIsObject($fundingSourceDetailsDTO);
        self::assertEquals($data[0], $fundingSourceDetailsDTO->{0});
        self::assertIsBool(isset($fundingSourceDetailsDTO->{0}));
        self::assertEquals($data, $fundingSourceDetailsDTO->jsonSerialize());
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($fundingSourceDetailsDTO, JSON_THROW_ON_ERROR)
        );

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $fundingSourceDetailsDTO->{0} = $data;
    }
}
