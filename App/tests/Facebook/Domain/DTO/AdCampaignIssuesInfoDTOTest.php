<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class AdCampaignIssuesInfoDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'error_code'    => 444,
                    'error_message' => 'error_message',
                    'error_summary' => 'error_summary',
                    'error_type'    => 'error_type',
                    'level'         => 'level',
                ],
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

        self::assertNull($DTOFactoryService->createDTOFromAdCampaignIssuesInfo(null));

        $adCampaignIssuesInfoDTO = $DTOFactoryService->createDTOFromAdCampaignIssuesInfo($data);

        self::assertIsObject($adCampaignIssuesInfoDTO);
        self::assertEquals($data['error_code'], $adCampaignIssuesInfoDTO->error_code);
        self::assertEquals($data['error_message'], $adCampaignIssuesInfoDTO->error_message);
        self::assertEquals($data['error_summary'], $adCampaignIssuesInfoDTO->error_summary);
        self::assertEquals($data['error_type'], $adCampaignIssuesInfoDTO->error_type);
        self::assertEquals($data['level'], $adCampaignIssuesInfoDTO->level);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($adCampaignIssuesInfoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
