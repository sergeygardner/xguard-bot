<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use DateInterval;
use DateTime;
use Exception;
use JsonException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class BusinessDTOTest extends TestCase
{

    /**
     * @return array[]
     * @throws Exception
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'                                              => 'id',
                    'block_offline_analytics'                         => null,
                    'collaborative_ads_managed_partner_business_info' => null,
                    'collaborative_ads_managed_partner_eligibility'   => null,
                    'created_by'                                      => null,
                    'created_time'                                    => null,
                    'extended_updated_time'                           => null,
                    'is_hidden'                                       => null,
                    'link'                                            => null,
                    'name'                                            => 'name',
                    'payment_account_id'                              => null,
                    'primary_page'                                    => null,
                    'profile_picture_uri'                             => null,
                    'timezone_id'                                     => null,
                    'two_factor_type'                                 => null,
                    'updated_by'                                      => null,
                    'updated_time'                                    => null,
                    'verification_status'                             => null,
                    'vertical'                                        => null,
                    'vertical_id'                                     => null,
                ],
                '',
            ],
            [
                [
                    'id'                                              => 'id',
                    'block_offline_analytics'                         => null,
                    'collaborative_ads_managed_partner_business_info' => null,
                    'collaborative_ads_managed_partner_eligibility'   => null,
                    'created_by'                                      => null,
                    'created_time'                                    => (new DateTime())->add(
                        new DateInterval('P'.random_int(1, 50).'M')
                    )->getTimestamp(),
                    'extended_updated_time'                           => (new DateTime())->add(
                        new DateInterval('P'.random_int(51, 90).'M')
                    )->getTimestamp(),
                    'is_hidden'                                       => null,
                    'link'                                            => null,
                    'name'                                            => 'name',
                    'payment_account_id'                              => null,
                    'primary_page'                                    => null,
                    'profile_picture_uri'                             => null,
                    'timezone_id'                                     => null,
                    'two_factor_type'                                 => null,
                    'updated_by'                                      => null,
                    'updated_time'                                    => null,
                    'verification_status'                             => null,
                    'vertical'                                        => null,
                    'vertical_id'                                     => null,
                ],
                '',
            ],
            [
                [
                    'id'                                              => 'id',
                    'block_offline_analytics'                         => null,
                    'collaborative_ads_managed_partner_business_info' => null,
                    'collaborative_ads_managed_partner_eligibility'   => null,
                    'created_by'                                      => null,
                    'created_time'                                    => (new DateTime())->add(
                        new DateInterval('P'.random_int(1, 50).'M')
                    )->getTimestamp(),
                    'extended_updated_time'                           => 'test',
                    'is_hidden'                                       => null,
                    'link'                                            => null,
                    'name'                                            => 'name',
                    'payment_account_id'                              => null,
                    'primary_page'                                    => null,
                    'profile_picture_uri'                             => null,
                    'timezone_id'                                     => null,
                    'two_factor_type'                                 => null,
                    'updated_by'                                      => null,
                    'updated_time'                                    => null,
                    'verification_status'                             => null,
                    'vertical'                                        => null,
                    'vertical_id'                                     => null,
                ],
                ExpectationFailedException::class,
            ],
            [
                [
                    'id'                                              => 'id',
                    'block_offline_analytics'                         => null,
                    'collaborative_ads_managed_partner_business_info' => null,
                    'collaborative_ads_managed_partner_eligibility'   => null,
                    'created_by'                                      => null,
                    'created_time'                                    => 'test',
                    'extended_updated_time'                           => (new DateTime())->add(
                        new DateInterval('P'.random_int(1, 50).'M')
                    )->getTimestamp(),
                    'is_hidden'                                       => null,
                    'link'                                            => null,
                    'name'                                            => 'name',
                    'payment_account_id'                              => null,
                    'primary_page'                                    => null,
                    'profile_picture_uri'                             => null,
                    'timezone_id'                                     => null,
                    'two_factor_type'                                 => null,
                    'updated_by'                                      => null,
                    'updated_time'                                    => null,
                    'verification_status'                             => null,
                    'vertical'                                        => null,
                    'vertical_id'                                     => null,
                ],
                ExpectationFailedException::class,
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

        self::assertNull($DTOFactoryService->createDTOFromBusiness(null));

        $businessDTO = $DTOFactoryService->createDTOFromBusiness($data);

        self::assertIsObject($businessDTO);
        self::assertEquals($data['id'], $businessDTO->id);
        self::assertEquals($data['block_offline_analytics'], $businessDTO->block_offline_analytics);
        self::assertEquals(
            $data['collaborative_ads_managed_partner_business_info'],
            $businessDTO->collaborative_ads_managed_partner_business_info
        );
        self::assertEquals(
            $data['collaborative_ads_managed_partner_eligibility'],
            $businessDTO->collaborative_ads_managed_partner_eligibility
        );
        self::assertEquals($data['created_by'], $businessDTO->created_by);
        self::assertEquals($data['created_time'], $businessDTO->created_time?->getTimestamp());
        self::assertEquals($data['extended_updated_time'], $businessDTO->extended_updated_time?->getTimestamp());
        self::assertEquals($data['is_hidden'], $businessDTO->is_hidden);
        self::assertEquals($data['link'], $businessDTO->link);
        self::assertEquals($data['name'], $businessDTO->name);
        self::assertEquals($data['payment_account_id'], $businessDTO->payment_account_id);
        self::assertEquals($data['primary_page'], $businessDTO->primary_page);
        self::assertEquals($data['profile_picture_uri'], $businessDTO->profile_picture_uri);
        self::assertEquals($data['timezone_id'], $businessDTO->timezone_id);
        self::assertEquals($data['two_factor_type'], $businessDTO->two_factor_type);
        self::assertEquals($data['updated_by'], $businessDTO->updated_by);
        self::assertEquals($data['updated_time'], $businessDTO->updated_time);
        self::assertEquals($data['verification_status'], $businessDTO->verification_status);
        self::assertEquals($data['vertical'], $businessDTO->vertical);
        self::assertEquals($data['vertical_id'], $businessDTO->vertical_id);
        self::assertNotEmpty(json_encode($businessDTO, JSON_THROW_ON_ERROR));
    }
}
