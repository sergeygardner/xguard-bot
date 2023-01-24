<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;

/**
 *
 */
final class CriteriaDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id' => 'id',
                ],
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     * @throws JsonException
     */
    public function testConstruct(array $data): void
    {
        self::assertEquals(
            json_encode([self::class, $data], JSON_THROW_ON_ERROR),
            json_encode(new CriteriaDTO(self::class, $data), JSON_THROW_ON_ERROR)
        );
    }
}
