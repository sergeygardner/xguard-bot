<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class ExtendedCreditInvoiceGroupDTOTest extends TestCase
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
                    'auto_enroll'        => null,
                    'customer_po_number' => null,
                    'email'              => null,
                    'emails'             => null,
                    'name'               => 'name',
                ],
            ],
        ];
    }

    /**
     *
     * @param array $data
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromExtendedCreditInvoiceGroup(null));

        $extendedCreditInvoiceGroupDTO = $DTOFactoryService->createDTOFromExtendedCreditInvoiceGroup($data);

        self::assertIsObject($extendedCreditInvoiceGroupDTO);
        self::assertEquals($data['id'], $extendedCreditInvoiceGroupDTO->id);
        self::assertEquals($data['auto_enroll'], $extendedCreditInvoiceGroupDTO->auto_enroll);
        self::assertEquals($data['customer_po_number'], $extendedCreditInvoiceGroupDTO->customer_po_number);
        self::assertEquals($data['email'], $extendedCreditInvoiceGroupDTO->email);
        self::assertEquals($data['emails'], $extendedCreditInvoiceGroupDTO->emails);
        self::assertEquals($data['name'], $extendedCreditInvoiceGroupDTO->name);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($extendedCreditInvoiceGroupDTO, JSON_THROW_ON_ERROR)
        );
    }
}
