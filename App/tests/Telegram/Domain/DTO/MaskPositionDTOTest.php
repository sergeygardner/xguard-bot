<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class MaskPositionDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromMaskPosition(null));

        $point           = 'forehead';
        $x_shift         = 3.7;
        $y_shift         = -2.4;
        $scale           = 1.5;
        $maskPositionDTO = $DTOFactoryService->createDTOFromMaskPosition(
            $maskPosition = [
                'point'   => $point,
                'x_shift' => $x_shift,
                'y_shift' => $y_shift,
                'scale'   => $scale,
            ]
        );
        self::assertIsObject($maskPositionDTO);
        self::assertEquals($point, $maskPositionDTO->point);
        self::assertEquals($x_shift, $maskPositionDTO->x_shift);
        self::assertEquals($y_shift, $maskPositionDTO->y_shift);
        self::assertEquals($scale, $maskPositionDTO->scale);
        self::assertEquals(
            json_encode($maskPosition, JSON_THROW_ON_ERROR),
            json_encode($maskPositionDTO, JSON_THROW_ON_ERROR)
        );
    }
}
