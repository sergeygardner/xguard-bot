<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PagePaymentOptionsDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'amex'       => 1,
                    'cash_only'  => 2,
                    'discover'   => 3,
                    'mastercard' => 4,
                    'visa'       => 5,
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

        self::assertNull($DTOFactoryService->createDTOFromPagePaymentOptions(null));

        $pagePaymentOptionsDTO = $DTOFactoryService->createDTOFromPagePaymentOptions($data);

        self::assertIsObject($pagePaymentOptionsDTO);
        self::assertEquals($data['amex'], $pagePaymentOptionsDTO->amex);
        self::assertEquals($data['cash_only'], $pagePaymentOptionsDTO->cash_only);
        self::assertEquals($data['discover'], $pagePaymentOptionsDTO->discover);
        self::assertEquals($data['mastercard'], $pagePaymentOptionsDTO->mastercard);
        self::assertEquals($data['visa'], $pagePaymentOptionsDTO->visa);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($pagePaymentOptionsDTO, JSON_THROW_ON_ERROR)
        );
    }
}
