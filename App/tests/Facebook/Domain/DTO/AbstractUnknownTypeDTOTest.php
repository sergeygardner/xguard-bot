<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Domain\DTO\AbstractUnknownTypeDTO;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class AbstractUnknownTypeDTOTest extends TestCase
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
     * @param mixed $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testConstruct(mixed $data): void
    {
        $instanceFromAbstractUnknownTypeDTO = new class($data) extends AbstractUnknownTypeDTO {

        };

        self::assertIsObject($instanceFromAbstractUnknownTypeDTO);
        self::assertEquals($data[0], $instanceFromAbstractUnknownTypeDTO->{0});
        self::assertIsBool(isset($instanceFromAbstractUnknownTypeDTO->{0}));
        self::assertEquals($data, $instanceFromAbstractUnknownTypeDTO->jsonSerialize());

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $instanceFromAbstractUnknownTypeDTO->{0} = $data;
    }
}
