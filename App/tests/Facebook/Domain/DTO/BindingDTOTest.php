<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class BindingDTOTest extends TestCase
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

        self::assertNull($DTOFactoryService->createDTOFromBindings(null));
        self::assertNull($DTOFactoryService->createDTOFromBinding(null));

        $bindingDTO  = $DTOFactoryService->createDTOFromBinding($data);
        $bindingsDTO = $DTOFactoryService->createDTOFromBindings([$data]);

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        foreach ([$bindingDTO, ...$bindingsDTO] as $bindingDTOItem) {
            self::assertIsObject($bindingDTOItem);
            self::assertEquals($data[0], $bindingDTOItem->{0});
            self::assertIsBool(isset($bindingDTOItem->{0}));
            self::assertEquals($data, $bindingDTOItem->jsonSerialize());
            self::assertEquals(
                json_encode($data, JSON_THROW_ON_ERROR),
                json_encode($bindingDTOItem, JSON_THROW_ON_ERROR)
            );

            $bindingDTOItem->{0} = $data;
        }
    }
}
