<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class ContextualBundlingSpecDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [null],
            ],
            [
                [1],
            ],
            [
                ['test'],
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

        self::assertNull($DTOFactoryService->createDTOFromContextualBundlingSpec(null));

        $contextualBundlingSpecDTO = $DTOFactoryService->createDTOFromContextualBundlingSpec($data);

        self::assertIsObject($contextualBundlingSpecDTO);
        self::assertEquals($data[0], $contextualBundlingSpecDTO->{0});
        self::assertIsBool(isset($contextualBundlingSpecDTO->{0}));
        self::assertEquals($data, $contextualBundlingSpecDTO->jsonSerialize());
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($contextualBundlingSpecDTO, JSON_THROW_ON_ERROR)
        );

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $contextualBundlingSpecDTO->{0} = $data;
    }
}
