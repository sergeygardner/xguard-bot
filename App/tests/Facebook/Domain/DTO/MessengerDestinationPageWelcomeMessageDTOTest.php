<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Facebook\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Facebook\Application\Service\DTOFactoryService;
use XGuard\Bot\Facebook\Domain\Exception\ModifyReadOnlyPropertyInDTOException;

/**
 *
 */
final class MessengerDestinationPageWelcomeMessageDTOTest extends TestCase
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

        self::assertNull($DTOFactoryService->createDTOFromMessengerDestinationPageWelcomeMessage(null));

        $messengerDestinationPageWelcomeMessageDTO = $DTOFactoryService->createDTOFromMessengerDestinationPageWelcomeMessage(
            $data
        );

        self::assertIsObject($messengerDestinationPageWelcomeMessageDTO);
        self::assertEquals($data[0], $messengerDestinationPageWelcomeMessageDTO->{0});
        self::assertIsBool(isset($messengerDestinationPageWelcomeMessageDTO->{0}));
        self::assertEquals($data, $messengerDestinationPageWelcomeMessageDTO->jsonSerialize());
        self::assertEquals(
            json_encode($data, JSON_THROW_ON_ERROR),
            json_encode($messengerDestinationPageWelcomeMessageDTO, JSON_THROW_ON_ERROR)
        );

        $this->expectException(ModifyReadOnlyPropertyInDTOException::class);

        $messengerDestinationPageWelcomeMessageDTO->{0} = $data;
    }
}
