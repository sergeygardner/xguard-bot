<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Domain\DTO;

use JsonException;
use PHPUnit\Framework\TestCase;
use XGuard\Bot\Telegram\Application\Service\DTOFactoryService;

/**
 *
 */
final class ContactDTOTest extends TestCase
{

    /**
     * @return void
     * @throws JsonException
     */
    public function testConstruct(): void
    {
        $DTOFactoryService = new DTOFactoryService();

        self::assertNull($DTOFactoryService->createDTOFromContact(null));

        $phone_number = '+0 7999 999 999';
        $first_name   = 'Test';
        $last_name    = 'Testov';
        $user_id      = 1;
        $vcard        = "BEGIN:VCARD\nVERSION:3.0\nEND:VCARD";
        $contactDTO   = $DTOFactoryService->createDTOFromContact(
            $contact = [
                'phone_number' => $phone_number,
                'first_name'   => $first_name,
                'last_name'    => $last_name,
                'user_id'      => $user_id,
                'vcard'        => $vcard,
            ]
        );
        self::assertIsObject($contactDTO);
        self::assertEquals($phone_number, $contactDTO->phone_number);
        self::assertEquals($first_name, $contactDTO->first_name);
        self::assertEquals($last_name, $contactDTO->last_name);
        self::assertEquals($user_id, $contactDTO->user_id);
        self::assertEquals($vcard, $contactDTO->vcard);
        self::assertEquals(
            json_encode($contact, JSON_THROW_ON_ERROR),
            json_encode($contactDTO, JSON_THROW_ON_ERROR)
        );
    }
}
