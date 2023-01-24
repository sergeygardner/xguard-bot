<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use TypeError;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Enum\AdRecommendationConfidenceEnum;
use XGuard\Bot\Facebook\Domain\Enum\AdRecommendationImportanceEnum;

/**
 *
 */
final class AdRecommendationDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'blame_field'         => 'blame_field',
                    'code'                => 1,
                    'confidence'          => 'HIGH',//AdRecommendationConfidenceEnum::HIGH
                    'importance'          => 'HIGH',//AdRecommendationImportanceEnum::HIGH
                    'message'             => 'message',
                    'recommendation_data' => [
                        null,
                    ],
                    'title'               => 'title',
                ],
                '',
            ],
            [
                [
                    'blame_field'         => 'blame_field',
                    'code'                => 1,
                    'confidence'          => 'MEDIUM',//AdRecommendationConfidenceEnum::MEDIUM
                    'importance'          => 'MEDIUM',//AdRecommendationImportanceEnum::MEDIUM
                    'message'             => 'message',
                    'recommendation_data' => [
                        1,
                    ],
                    'title'               => 'title',
                ],
                '',
            ],
            [
                [
                    'blame_field'         => 'blame_field',
                    'code'                => 1,
                    'confidence'          => 'LOW',//AdRecommendationConfidenceEnum::LOW
                    'importance'          => 'LOW',//AdRecommendationImportanceEnum::LOW
                    'message'             => 'message',
                    'recommendation_data' => [
                        'test',
                    ],
                    'title'               => 'title',
                ],
                '',
            ],
            [
                [
                    'blame_field'         => 'blame_field',
                    'code'                => 1,
                    'confidence'          => 'LOW', //AdRecommendationConfidenceEnum::LOW
                    'importance'          => 'LOW1',//AdRecommendationImportanceEnum::LOW1?
                    'message'             => 'message',
                    'recommendation_data' => [
                        null,
                    ],
                    'title'               => 'title',
                ],
                TypeError::class,
            ],
            [
                [
                    'blame_field'         => 'blame_field',
                    'code'                => 1,
                    'confidence'          => 'LOW1',//AdRecommendationConfidenceEnum::LOW1?
                    'importance'          => 'LOW', //AdRecommendationImportanceEnum::LOW
                    'message'             => 'message',
                    'recommendation_data' => [
                        null,
                    ],
                    'title'               => 'title',
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

        self::assertNull($DTOFactoryService->createDTOFromAdRecommendation(null));

        $adCampaignFrequencyControlSpecsDTO = $DTOFactoryService->createDTOFromAdRecommendation($data);

        self::assertIsObject($adCampaignFrequencyControlSpecsDTO);
        self::assertEquals($data['blame_field'], $adCampaignFrequencyControlSpecsDTO->blame_field);
        self::assertEquals($data['code'], $adCampaignFrequencyControlSpecsDTO->code);
        self::assertEquals(
            constant((AdRecommendationConfidenceEnum::class).'::'.$data['confidence']),
            $adCampaignFrequencyControlSpecsDTO->confidence
        );
        self::assertEquals(
            constant((AdRecommendationImportanceEnum::class).'::'.$data['importance']),
            $adCampaignFrequencyControlSpecsDTO->importance
        );
        self::assertEquals($data['message'], $adCampaignFrequencyControlSpecsDTO->message);
        self::assertEquals(
            json_encode($data['recommendation_data'], JSON_THROW_ON_ERROR),
            json_encode($adCampaignFrequencyControlSpecsDTO->recommendation_data, JSON_THROW_ON_ERROR)
        );
        self::assertEquals($data['title'], $adCampaignFrequencyControlSpecsDTO->title);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adCampaignFrequencyControlSpecsDTO, JSON_THROW_ON_ERROR)
        );
    }
}
