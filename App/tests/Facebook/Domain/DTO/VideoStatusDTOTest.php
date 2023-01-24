<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Enum\VideoStatusEnum;

/**
 *
 */
final class VideoStatusDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'processing_progress' => 10,
                    'video_status'        => 'ready',//VideoStatusEnum::ready
                ],
                '',
            ],
            [
                [
                    'processing_progress' => 15,
                    'video_status'        => 'processing',//VideoStatusEnum::processing
                ],
                '',
            ],
            [
                [
                    'processing_progress' => 20,
                    'video_status'        => 'error',//VideoStatusEnum::error
                ],
                '',
            ],
            [
                [
                    'processing_progress' => 30,
                    'video_status'        => 'error1',//VideoStatusEnum::error1?
                ],
                TypeError::class,
            ],
        ];
    }

    /**
     * @param array  $data
     * @param string $exception
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data, string $exception): void
    {
        if (!empty($exception)) {
            $this->expectException($exception);
        }

        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromVideoStatus(null));

        $videoStatusDTO = $DTOFactoryService->createDTOFromVideoStatus($data);

        self::assertIsObject($videoStatusDTO);
        self::assertEquals($data['processing_progress'], $videoStatusDTO->processing_progress);
        self::assertEquals(
            constant((VideoStatusEnum::class).'::'.$data['video_status']),
            $videoStatusDTO->video_status
        );
        self::assertNotEmpty(json_encode($videoStatusDTO, JSON_THROW_ON_ERROR));
    }
}
