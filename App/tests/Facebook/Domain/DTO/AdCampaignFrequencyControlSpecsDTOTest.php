<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Enum\AdCampaignFrequencyControlSpecsEnum;

/**
 *
 */
final class AdCampaignFrequencyControlSpecsDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'event'         => 'IMPRESSIONS',//AdCampaignFrequencyControlSpecsEnum::IMPRESSIONS
                    'interval_days' => 1,
                    'max_frequency' => 2,
                ],
                '',
            ],
            [
                [
                    'event'         => 'IMPRESSIONS2',//AdCampaignFrequencyControlSpecsEnum::IMPRESSIONS2?
                    'interval_days' => 1,
                    'max_frequency' => 2,
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

        self::assertNull($DTOFactoryService->createDTOFromAdCampaignFrequencyControlSpecs(null));

        $adCampaignFrequencyControlSpecsDTO = $DTOFactoryService->createDTOFromAdCampaignFrequencyControlSpecs($data);

        self::assertIsObject($adCampaignFrequencyControlSpecsDTO);
        self::assertEquals(
            constant((AdCampaignFrequencyControlSpecsEnum::class).'::'.$data['event']),
            $adCampaignFrequencyControlSpecsDTO->event
        );
        self::assertEquals($data['interval_days'], $adCampaignFrequencyControlSpecsDTO->interval_days);
        self::assertEquals($data['max_frequency'], $adCampaignFrequencyControlSpecsDTO->max_frequency);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adCampaignFrequencyControlSpecsDTO, JSON_THROW_ON_ERROR)
        );
    }
}
