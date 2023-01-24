<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class AdAccountPromotableObjectsDTOTest extends TestCase
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

        self::assertNull($DTOFactoryService->createDTOFromAdAccountPromotableObjects(null));

        $adAccountPromotableObjectsDTO = $DTOFactoryService->createDTOFromAdAccountPromotableObjects(
            $data
        );

        self::assertIsObject($adAccountPromotableObjectsDTO);
        self::assertEquals($data[0], $adAccountPromotableObjectsDTO->{0});
        self::assertIsBool(isset($adAccountPromotableObjectsDTO->{0}));
        self::assertEquals($data, $adAccountPromotableObjectsDTO->jsonSerialize());
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adAccountPromotableObjectsDTO, JSON_THROW_ON_ERROR)
        );

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $adAccountPromotableObjectsDTO->{0} = $data;
    }
}
