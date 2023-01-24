<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO\Authentication;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;

/**
 *
 */
final class AccessTokenDTOTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'access_token' => '1111|22222',
                    'token_type'   => 'Bearer',
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

        self::assertNull($DTOFactoryService->createDTOFromAccessToken(null));

        $accessTokenDTO = $DTOFactoryService->createDTOFromAccessToken(
            $data
        );

        self::assertIsObject($accessTokenDTO);
        self::assertEquals($data['access_token'], $accessTokenDTO->access_token);
        self::assertEquals($data['token_type'], $accessTokenDTO->token_type);
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($accessTokenDTO, JSON_THROW_ON_ERROR)
        );
    }
}
