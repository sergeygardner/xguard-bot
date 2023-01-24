<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class VoipInfoDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'has_mobile_app'     => true,
                    'has_permission'     => true,
                    'is_callable'        => true,
                    'is_callable_webrtc' => true,
                    'is_pushable'        => true,
                    'reason_code'        => 200,
                    'reason_description' => 'reason_description',
                ],
            ],
        ];
    }

    /**
     *
     * @param array $data
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVoipInfo(null));

        $voipInfoDTO = $DTOFactoryService->createDTOFromVoipInfo($data);

        self::assertIsObject($voipInfoDTO);
        self::assertEquals($data['has_mobile_app'], $voipInfoDTO->has_mobile_app);
        self::assertEquals($data['has_permission'], $voipInfoDTO->has_permission);
        self::assertEquals($data['is_callable'], $voipInfoDTO->is_callable);
        self::assertEquals($data['is_callable_webrtc'], $voipInfoDTO->is_callable_webrtc);
        self::assertEquals($data['is_pushable'], $voipInfoDTO->is_pushable);
        self::assertEquals($data['reason_code'], $voipInfoDTO->reason_code);
        self::assertEquals($data['reason_description'], $voipInfoDTO->reason_description);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($voipInfoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
