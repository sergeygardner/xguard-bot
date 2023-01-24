<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class LoginUrlDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromLoginUrl(null));

        $url                  = 'https://t.me/';
        $forward_text         = 'ForwardText';
        $bot_username         = 'bot';
        $request_write_access = false;
        $loginUrlDTO          = $DTOFactoryService->createDTOFromLoginUrl(
            $loginUrl = [
                'url'                  => $url,
                'forward_text'         => $forward_text,
                'bot_username'         => $bot_username,
                'request_write_access' => $request_write_access,
            ]
        );
        self::assertIsObject($loginUrlDTO);
        self::assertEquals($url, $loginUrlDTO->url);
        self::assertEquals($forward_text, $loginUrlDTO->forward_text);
        self::assertEquals($bot_username, $loginUrlDTO->bot_username);
        self::assertEquals($request_write_access, $loginUrlDTO->request_write_access);
        self::assertEquals(
            json_encode($loginUrl, JSON_THROW_ON_ERROR),
            json_encode($loginUrlDTO, JSON_THROW_ON_ERROR)
        );
    }
}
