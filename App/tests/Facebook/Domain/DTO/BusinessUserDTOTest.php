<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class BusinessUserDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'                 => 'id',
                    'business'           => [
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
                    'email'              => null,
                    'finance_permission' => null,
                    'first_name'         => null,
                    'ip_permission'      => null,
                    'last_name'          => null,
                    'name'               => 'name',
                    'pending_email'      => null,
                    'role'               => null,
                    'title'              => null,
                    'two_fac_status'     => null,
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

        self::assertNull($DTOFactoryService->createDTOFromBusinessUser(null));

        $businessUserDTO = $DTOFactoryService->createDTOFromBusinessUser($data);

        self::assertIsObject($businessUserDTO);
        self::assertEquals($data['id'], $businessUserDTO->id);
        self::assertEquals(
            json_encode($data['business'], JSON_THROW_ON_ERROR),
            json_encode($businessUserDTO->business, JSON_THROW_ON_ERROR)
        );
        self::assertEquals($data['email'], $businessUserDTO->email);
        self::assertEquals($data['finance_permission'], $businessUserDTO->finance_permission);
        self::assertEquals($data['first_name'], $businessUserDTO->first_name);
        self::assertEquals($data['ip_permission'], $businessUserDTO->ip_permission);
        self::assertEquals($data['last_name'], $businessUserDTO->last_name);
        self::assertEquals($data['name'], $businessUserDTO->name);
        self::assertEquals($data['pending_email'], $businessUserDTO->pending_email);
        self::assertEquals($data['role'], $businessUserDTO->role);
        self::assertEquals($data['title'], $businessUserDTO->title);
        self::assertEquals($data['two_fac_status'], $businessUserDTO->two_fac_status);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($businessUserDTO, JSON_THROW_ON_ERROR)
        );
    }
}
