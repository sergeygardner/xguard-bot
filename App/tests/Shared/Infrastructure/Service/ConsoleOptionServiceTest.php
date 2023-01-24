<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Infrastructure\Service;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Infrastructure\Service\ConsoleOptionService;

/**
 *
 */
final class ConsoleOptionServiceTest extends TestCase
{

    /**
     * @return array[]
     */
    public function dataProvider(): array
    {
        return [
            [
                [
                    'id'               => 'id',
                    'botName'          => 'botName',
                    'newBotName'       => 'newBotName',
                    'botId'            => 'botId',
                    'newBotId'         => 'newBotId',
                    'channelId'        => 'channelId',
                    'newChannelId'     => 'newChannelId',
                    'channelName'      => 'channelName',
                    'newChannelName'   => 'newChannelName',
                    'channelType'      => 'channelType',
                    'newChannelType'   => 'newChannelType',
                    'databaseUser'     => 'databaseUser',
                    'databasePassword' => 'databasePassword',
                    'databaseName'     => 'databaseName',
                    'databaseHost'     => 'databaseHost',
                    'devMode'          => 'devMode',
                    'baseURI'          => 'baseURI',
                    'clientId'         => 'clientId',
                    'newClientId'      => 'newClientId',
                    'clientSecret'     => 'clientSecret',
                    'newClientSecret'  => 'newClientSecret',
                    'token'            => 'token',
                    'newToken'         => 'newToken',
                    'chatId'           => 'chatId',
                    'newChatId'        => 'newChatId',
                ],
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testConstruct(array $data): void
    {
        self::assertIsObject(new ConsoleOptionService($data));
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetId(array $data): void
    {
        self::assertEquals($data['id'], (new ConsoleOptionService($data))->getId());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetBotName(array $data): void
    {
        self::assertEquals($data['botName'], (new ConsoleOptionService($data))->getBotName());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewBotName(array $data): void
    {
        self::assertEquals($data['newBotName'], (new ConsoleOptionService($data))->getNewBotName());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetBotId(array $data): void
    {
        self::assertEquals($data['botId'], (new ConsoleOptionService($data))->getBotId());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewBotId(array $data): void
    {
        self::assertEquals($data['newBotId'], (new ConsoleOptionService($data))->getNewBotId());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetChannelId(array $data): void
    {
        self::assertEquals($data['channelId'], (new ConsoleOptionService($data))->getChannelId());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewChannelId(array $data): void
    {
        self::assertEquals($data['newChannelId'], (new ConsoleOptionService($data))->getNewChannelId());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetChannelName(array $data): void
    {
        self::assertEquals($data['channelName'], (new ConsoleOptionService($data))->getChannelName());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewChannelName(array $data): void
    {
        self::assertEquals($data['newChannelName'], (new ConsoleOptionService($data))->getNewChannelName());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetChannelType(array $data): void
    {
        self::assertEquals($data['channelType'], (new ConsoleOptionService($data))->getChannelType());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewChannelType(array $data): void
    {
        self::assertEquals($data['newChannelType'], (new ConsoleOptionService($data))->getNewChannelType());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetDatabaseUser(array $data): void
    {
        self::assertEquals($data['databaseUser'], (new ConsoleOptionService($data))->getDatabaseUser());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetDatabasePassword(array $data): void
    {
        self::assertEquals($data['databasePassword'], (new ConsoleOptionService($data))->getDatabasePassword());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetDatabaseName(array $data): void
    {
        self::assertEquals($data['databaseName'], (new ConsoleOptionService($data))->getDatabaseName());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetDatabaseHost(array $data): void
    {
        self::assertEquals($data['databaseHost'], (new ConsoleOptionService($data))->getDatabaseHost());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetDevMode(array $data): void
    {
        self::assertEquals((bool)(int)$data['devMode'], (new ConsoleOptionService($data))->getDevMode());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetBaseURI(array $data): void
    {
        self::assertEquals($data['baseURI'], (new ConsoleOptionService($data))->getBaseURI());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetClientId(array $data): void
    {
        self::assertEquals($data['clientId'], (new ConsoleOptionService($data))->getClientId());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewClientId(array $data): void
    {
        self::assertEquals($data['newClientId'], (new ConsoleOptionService($data))->getNewClientId());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetClientSecret(array $data): void
    {
        self::assertEquals($data['clientSecret'], (new ConsoleOptionService($data))->getClientSecret());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewClientSecret(array $data): void
    {
        self::assertEquals($data['newClientSecret'], (new ConsoleOptionService($data))->getNewClientSecret());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetToken(array $data): void
    {
        self::assertEquals($data['token'], (new ConsoleOptionService($data))->getToken());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewToken(array $data): void
    {
        self::assertEquals($data['newToken'], (new ConsoleOptionService($data))->getNewToken());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetChatId(array $data): void
    {
        self::assertEquals($data['chatId'], (new ConsoleOptionService($data))->getChatId());
    }

    /**
     * @param array $data
     *
     * @return void
     * @dataProvider dataProvider
     */
    public function testGetNewChatId(array $data): void
    {
        self::assertEquals($data['newChatId'], (new ConsoleOptionService($data))->getNewChatId());
    }
}
