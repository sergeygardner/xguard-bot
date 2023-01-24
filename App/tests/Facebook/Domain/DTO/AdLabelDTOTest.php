<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use DateInterval;
use DateTime;
use Exception;
use JsonException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class AdLabelDTOTest extends TestCase
{

    /**
     * @return array[]
     * @throws Exception
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'           => null,
                    'account'      => null,
                    'created_time' => null,
                    'name'         => 'name',
                    'updated_time' => null,
                ],
                '',
            ],
            [
                [
                    'id'           => '22222',
                    'account'      => null,
                    'created_time' => (new DateTime())->add(
                        new DateInterval('P'.random_int(1, 50).'M')
                    )->getTimestamp(),
                    'name'         => 'name2',
                    'updated_time' => (new DateTime())->add(
                        new DateInterval('P'.random_int(51, 90).'M')
                    )->getTimestamp(),
                ],
                '',
            ],
            [
                [
                    'id'           => '3333',
                    'account'      => null,
                    'created_time' => (new DateTime())->add(
                        new DateInterval('P'.random_int(51, 90).'M')
                    )->getTimestamp(),
                    'name'         => 'name3',
                    'updated_time' => 'wrong timestamp',
                ],
                ExpectationFailedException::class,
            ],
            [
                [
                    'id'           => '3333',
                    'account'      => null,
                    'created_time' => 'wrong timestamp',
                    'name'         => 'name3',
                    'updated_time' => (new DateTime())->add(
                        new DateInterval('P'.random_int(51, 90).'M')
                    )->getTimestamp(),
                ],
                ExpectationFailedException::class,
            ],
        ];
    }

    /**
     * @param array  $data
     * @param string $exception
     *
     * @return void
     * @throws JsonException
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data, string $exception): void
    {
        if (!empty($exception)) {
            $this->expectException($exception);
        }

        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromAdLabel(null));

        $adLabelDTO = $DTOFactoryService->createDTOFromAdLabel($data);

        self::assertIsObject($adLabelDTO);
        self::assertEquals($data['id'], $adLabelDTO->id);
        self::assertEquals($data['account'], $adLabelDTO->account);
        self::assertEquals($data['created_time'], $adLabelDTO->created_time?->getTimestamp());
        self::assertEquals($data['name'], $adLabelDTO->name);
        self::assertEquals($data['updated_time'], $adLabelDTO->updated_time?->getTimestamp());
        self::assertNotEmpty(json_encode($adLabelDTO, JSON_THROW_ON_ERROR));
    }
}
