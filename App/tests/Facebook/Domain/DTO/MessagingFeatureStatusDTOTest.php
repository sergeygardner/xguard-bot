<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class MessagingFeatureStatusDTOTest extends TestCase
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

        self::assertNull($DTOFactoryService->createDTOFromMessagingFeatureStatus(null));

        $messagingFeatureStatusDTO = $DTOFactoryService->createDTOFromMessagingFeatureStatus($data);

        self::assertIsObject($messagingFeatureStatusDTO);
        self::assertEquals($data[0], $messagingFeatureStatusDTO->{0});
        self::assertIsBool(isset($messagingFeatureStatusDTO->{0}));
        self::assertEquals($data, $messagingFeatureStatusDTO->jsonSerialize());
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($messagingFeatureStatusDTO, JSON_THROW_ON_ERROR)
        );

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $messagingFeatureStatusDTO->{0} = $data;
    }
}
