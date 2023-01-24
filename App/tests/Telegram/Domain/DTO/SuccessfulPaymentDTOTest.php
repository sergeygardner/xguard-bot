<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class SuccessfulPaymentDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromSuccessfulPayment(null));

        $currency                   = 'GBP';
        $total_amount               = 99;
        $invoice_payload            = 'invoice_payload';
        $shipping_option_id         = 'user_shipping_option_id';
        $order_info                 = null;
        $telegram_payment_charge_id = 'unique_telegram_payment_charge_id';
        $provider_payment_charge_id = 'unique_provider_payment_charge_id';
        $successfulPaymentDTO       = $DTOFactoryService->createDTOFromSuccessfulPayment(
            $successfulPayment = [
                'currency'                   => $currency,
                'total_amount'               => $total_amount,
                'invoice_payload'            => $invoice_payload,
                'shipping_option_id'         => $shipping_option_id,
                'order_info'                 => $order_info,
                'telegram_payment_charge_id' => $telegram_payment_charge_id,
                'provider_payment_charge_id' => $provider_payment_charge_id,
            ]
        );
        self::assertIsObject($successfulPaymentDTO);
        self::assertEquals($currency, $successfulPaymentDTO->currency);
        self::assertEquals($total_amount, $successfulPaymentDTO->total_amount);
        self::assertEquals($invoice_payload, $successfulPaymentDTO->invoice_payload);
        self::assertEquals($shipping_option_id, $successfulPaymentDTO->shipping_option_id);
        self::assertEquals($order_info, $successfulPaymentDTO->order_info);
        self::assertEquals($telegram_payment_charge_id, $successfulPaymentDTO->telegram_payment_charge_id);
        self::assertEquals($provider_payment_charge_id, $successfulPaymentDTO->provider_payment_charge_id);
        self::assertEquals(
            json_encode($successfulPayment, JSON_THROW_ON_ERROR),
            json_encode($successfulPaymentDTO, JSON_THROW_ON_ERROR)
        );
    }
}
