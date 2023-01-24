<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class InvoiceDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromInvoice(null));

        $title           = 'InvoiceTitle';
        $description     = 'InvoiceDescription';
        $start_parameter = 'telegram://invoice.me';
        $currency        = 'GBP';
        $total_amount    = 99;
        $invoiceDTO      = $DTOFactoryService->createDTOFromInvoice(
            $invoice = [
                'title'           => $title,
                'description'     => $description,
                'start_parameter' => $start_parameter,
                'currency'        => $currency,
                'total_amount'    => $total_amount,
            ]
        );
        self::assertIsObject($invoiceDTO);
        self::assertEquals($title, $invoiceDTO->title);
        self::assertEquals($description, $invoiceDTO->description);
        self::assertEquals($start_parameter, $invoiceDTO->start_parameter);
        self::assertEquals($currency, $invoiceDTO->currency);
        self::assertEquals($total_amount, $invoiceDTO->total_amount);
        self::assertEquals(
            json_encode($invoice, JSON_THROW_ON_ERROR),
            json_encode($invoiceDTO, JSON_THROW_ON_ERROR)
        );
    }
}
