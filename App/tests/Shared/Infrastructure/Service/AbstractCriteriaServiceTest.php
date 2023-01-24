<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Shared\Infrastructure\Service;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\ChannelToBotRepository;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\MessageActionRepository;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\MessageRepository;
use XGuard\Bot\Shared\Infrastructure\Service\AbstractCriteriaService;

/**
 *
 */
final class AbstractCriteriaServiceTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        $messageCriteriaDTO        = new CriteriaDTO(MessageRepository::class, ['text' => 'text']);
        $messageActionCriteriaDTO  = new CriteriaDTO(MessageActionRepository::class, ['action' => 'open']);
        $channelToBotCriteriaDTO   = new CriteriaDTO(
            ChannelToBotRepository::class,
            ['id' => (string)UuidValueObject::generate()]
        );
        $classWithAbstractCriteria = new class(
            $messageCriteriaDTO,
            $messageActionCriteriaDTO,
            $channelToBotCriteriaDTO
        ) extends AbstractCriteriaService {

        };

        self::assertIsObject($classWithAbstractCriteria);
        self::assertEquals($messageCriteriaDTO, $classWithAbstractCriteria->getMessageCriteria());
        self::assertEquals($messageActionCriteriaDTO, $classWithAbstractCriteria->getMessageActionCriteria());
        self::assertEquals($channelToBotCriteriaDTO, $classWithAbstractCriteria->getChannelToBotCriteria());
    }
}
