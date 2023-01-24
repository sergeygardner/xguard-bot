<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Enum\AdCampaignLearningStageInfoStatusEnum;

/**
 *
 */
final class AdCampaignLearningStageInfoDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'attribution_windows' => ['111', '222'],
                    'conversions'         => 1,
                    'last_sig_edit_ts'    => 2,
                    'status'              => 'LEARNING',//AdCampaignLearningStageInfoStatusEnum::LEARNING
                ],
                '',
            ],
            [
                [
                    'attribution_windows' => ['111', '222'],
                    'conversions'         => 1,
                    'last_sig_edit_ts'    => 2,
                    'status'              => 'SUCCESS',//AdCampaignLearningStageInfoStatusEnum::SUCCESS
                ],
                '',
            ],
            [
                [
                    'attribution_windows' => ['111', '222'],
                    'conversions'         => 1,
                    'last_sig_edit_ts'    => 2,
                    'status'              => 'FAIL',//AdCampaignLearningStageInfoStatusEnum::FAIL
                ],
                '',
            ],
            [
                [
                    'attribution_windows' => ['111', '222'],
                    'conversions'         => 1,
                    'last_sig_edit_ts'    => 2,
                    'status'              => 'FAIL2',//AdCampaignLearningStageInfoStatusEnum::FAIL2?
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

        self::assertNull($DTOFactoryService->createDTOFromAdCampaignLearningStageInfo(null));

        $adCampaignLearningStageInfoDTO = $DTOFactoryService->createDTOFromAdCampaignLearningStageInfo($data);

        self::assertIsObject($adCampaignLearningStageInfoDTO);
        self::assertEquals($data['attribution_windows'], $adCampaignLearningStageInfoDTO->attribution_windows);
        self::assertEquals($data['conversions'], $adCampaignLearningStageInfoDTO->conversions);
        self::assertEquals($data['last_sig_edit_ts'], $adCampaignLearningStageInfoDTO->last_sig_edit_ts);
        self::assertEquals(
            constant((AdCampaignLearningStageInfoStatusEnum::class).'::'.$data['status']),
            $adCampaignLearningStageInfoDTO->status
        );
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adCampaignLearningStageInfoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
