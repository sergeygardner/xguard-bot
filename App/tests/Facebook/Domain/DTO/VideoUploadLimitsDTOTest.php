<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class VideoUploadLimitsDTOTest extends TestCase
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

        self::assertNull($DTOFactoryService->createDTOFromVideoUploadLimits(null));

        $videoUploadLimitsDTO = $DTOFactoryService->createDTOFromManagedPartnerBusiness($data);

        self::assertIsObject($videoUploadLimitsDTO);
        self::assertEquals($data[0], $videoUploadLimitsDTO->{0});
        self::assertIsBool(isset($videoUploadLimitsDTO->{0}));
        self::assertEquals($data, $videoUploadLimitsDTO->jsonSerialize());
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($videoUploadLimitsDTO, JSON_THROW_ON_ERROR)
        );

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $videoUploadLimitsDTO->{0} = $data;
    }
}
