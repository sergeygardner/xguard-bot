<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Infrastructure\Doctrine\Aggregate;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Test\XGuard\Bot\InMemoryEntityManager;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Aggregate\BotAggregate;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\BotRepository;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\ChannelRepository;
use XGuard\Bot\Facebook\Infrastructure\Service\CriteriaService;
use XGuard\Bot\Facebook\Infrastructure\Service\GuzzleAuthenticationService;
use XGuard\Bot\Facebook\Infrastructure\Service\GuzzleRequestService;
use XGuard\Bot\Facebook\Infrastructure\Service\RequestURIService;
use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;
use XGuard\Bot\Shared\Domain\ValueObject\BaseURIValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\BotNameValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\ChannelNameValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\ChannelToBotRepository;

/**
 *
 */
final class BotAggregateTest extends TestCase
{

    /**
     * @var BotAggregate|null
     */
    private ?BotAggregate $botAggregate = null;

    /**
     * @var InMemoryEntityManager
     */
    private InMemoryEntityManager $entityManager;

    /**
     * @param string|null $name
     * @param array       $data
     * @param             $dataName
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->entityManager = new InMemoryEntityManager;
    }

    /**
     * @return void
     */
    public function setUp(): void
    {
        $guzzleClient       = new Client();
        $requestURIService  = new RequestURIService(
            new BaseURIValueObject('baseURI')
        );
        $DTOFactoryService  = new DTOFactoryService();
        $this->botAggregate = new BotAggregate(
            new BotRepository(
                $this->entityManager->setFieldMappings(
                    [
                        'id'            => ['columnName' => 'id', 'type' => 'UuidType'],
                        'client_id'     => ['columnName' => 'client_id', 'type' => 'ClientIdType'],
                        'client_secret' => ['columnName' => 'client_secret', 'type' => 'ClientSecretType'],
                        'name'          => ['columnName' => 'name', 'type' => 'BotNameType'],
                    ]
                )
            ),
            new ChannelRepository(
                $this->entityManager->setFieldMappings(
                    [
                        'id'         => ['columnName' => 'id', 'type' => 'UuidType'],
                        'channel_id' => ['columnName' => 'channel_id', 'type' => 'UuidType'],
                        'name'       => ['columnName' => 'name', 'type' => 'ChannelNameType'],
                        'type'       => ['columnName' => 'type', 'type' => 'TypeType'],
                    ]
                )
            ),
            new ChannelToBotRepository(
                $this->entityManager->setFieldMappings(
                    [
                        'id'         => ['columnName' => 'id', 'type' => 'UuidType'],
                        'channel_id' => ['columnName' => 'channel_id', 'type' => 'UuidType'],
                        'bot_id'     => ['columnName' => 'bot_id', 'type' => 'UuidType'],
                    ]
                )
            ),
            new GuzzleRequestService(
                $guzzleClient,
                $requestURIService,
                $DTOFactoryService,
                new GuzzleAuthenticationService(
                    $guzzleClient,
                    $requestURIService,
                    $DTOFactoryService
                )
            ),
            new CriteriaService(
                new CriteriaDTO(
                    BotRepository::class,
                    [
                        'name' => new BotNameValueObject(
                            'botName'
                        ),
                    ]
                ),
                new CriteriaDTO(
                    ChannelRepository::class,
                    [
                        'name' => new ChannelNameValueObject(
                            'channelName'
                        ),
                    ]
                ),
            ),
            $this->entityManager
        );
    }

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        self::assertIsObject($this->botAggregate);
    }

    /**
     * @return void
     */
    public function testSave(): void
    {

    }

    /**
     * @return void
     */
    public function testFlush(): void
    {

    }
}
