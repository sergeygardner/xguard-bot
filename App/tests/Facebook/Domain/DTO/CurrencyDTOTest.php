<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class CurrencyDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'currency_offset'      => 1,
                    'usd_exchange'         => 1.6,
                    'usd_exchange_inverse' => 0.0001,
                    'user_currency'        => 'user_currency',
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

        self::assertNull($DTOFactoryService->createDTOFromCurrency(null));

        $currencyDTO = $DTOFactoryService->createDTOFromCurrency($data);

        self::assertIsObject($currencyDTO);
        self::assertEquals($data['currency_offset'], $currencyDTO->currency_offset);
        self::assertEquals($data['usd_exchange'], $currencyDTO->usd_exchange);
        self::assertEquals($data['usd_exchange_inverse'], $currencyDTO->usd_exchange_inverse);
        self::assertEquals($data['user_currency'], $currencyDTO->user_currency);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($currencyDTO, JSON_THROW_ON_ERROR)
        );
    }
}
