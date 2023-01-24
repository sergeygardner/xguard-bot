<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class OrderInfoDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromOrderInfo(null));

        $name             = 'TestOrder';
        $phone_number     = '+44 9999 999 999';
        $email            = 'email@email.email';
        $shipping_address = null;
        $orderInfoDTO     = $DTOFactoryService->createDTOFromOrderInfo(
            $orderInfo = [
                'name'             => $name,
                'phone_number'     => $phone_number,
                'email'            => $email,
                'shipping_address' => $shipping_address,
            ]
        );
        self::assertIsObject($orderInfoDTO);
        self::assertEquals($name, $orderInfoDTO->name);
        self::assertEquals($phone_number, $orderInfoDTO->phone_number);
        self::assertEquals($email, $orderInfoDTO->email);
        self::assertEquals($shipping_address, $orderInfoDTO->shipping_address);
        self::assertEquals(
            json_encode($orderInfo, JSON_THROW_ON_ERROR),
            json_encode($orderInfoDTO, JSON_THROW_ON_ERROR)
        );
    }
}
