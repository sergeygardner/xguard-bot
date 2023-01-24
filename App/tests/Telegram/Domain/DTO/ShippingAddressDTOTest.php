<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ShippingAddressDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromShippingAddress(null));

        $country_code       = 'UK';
        $state              = 'London';
        $city               = 'London';
        $street_line1       = 'Downing street';
        $street_line2       = '10';
        $post_code          = 'SW1A 2AA';
        $shippingAddressDTO = $DTOFactoryService->createDTOFromShippingAddress(
            $shippingAddress = [
                'country_code' => $country_code,
                'state'        => $state,
                'city'         => $city,
                'street_line1' => $street_line1,
                'street_line2' => $street_line2,
                'post_code'    => $post_code,
            ]
        );
        self::assertIsObject($shippingAddressDTO);
        self::assertEquals($country_code, $shippingAddressDTO->country_code);
        self::assertEquals($state, $shippingAddressDTO->state);
        self::assertEquals($city, $shippingAddressDTO->city);
        self::assertEquals($street_line1, $shippingAddressDTO->street_line1);
        self::assertEquals($street_line2, $shippingAddressDTO->street_line2);
        self::assertEquals($post_code, $shippingAddressDTO->post_code);
        self::assertEquals(
            json_encode($shippingAddress, JSON_THROW_ON_ERROR),
            json_encode($shippingAddressDTO, JSON_THROW_ON_ERROR)
        );
    }
}
