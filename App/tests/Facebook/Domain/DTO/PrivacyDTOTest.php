<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class PrivacyDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'allow'       => 'allow',
                    'deny'        => 'deny',
                    'description' => 'description',
                    'friends'     => 'friends',
                    'networks'    => 'networks',
                    'value'       => 'value',
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

        self::assertNull($DTOFactoryService->createDTOFromPrivacy(null));

        $privacyDTO = $DTOFactoryService->createDTOFromPrivacy($data);

        self::assertIsObject($privacyDTO);
        self::assertEquals($data['allow'], $privacyDTO->allow);
        self::assertEquals($data['deny'], $privacyDTO->deny);
        self::assertEquals($data['description'], $privacyDTO->description);
        self::assertEquals($data['friends'], $privacyDTO->friends);
        self::assertEquals($data['networks'], $privacyDTO->networks);
        self::assertEquals($data['value'], $privacyDTO->value);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($privacyDTO, JSON_THROW_ON_ERROR)
        );
    }
}
