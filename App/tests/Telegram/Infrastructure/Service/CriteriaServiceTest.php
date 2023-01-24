<?php declare(strict_types=1);

namespace Test\XGuard\Bot\Telegram\Infrastructure\Service;

use PHPUnit\Framework\TestCase;
use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\BotRepository;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\ChannelRepository;
use XGuard\Bot\Telegram\Infrastructure\Service\CriteriaService;

/**
 *
 */
final class CriteriaServiceTest extends TestCase
{

    /**
     * @return void
     */
    public function testConstruct(): void
    {
        $botCriteriaDTO     = new CriteriaDTO(BotRepository::class, ['name' => 'bot']);
        $channelCriteriaDTO = new CriteriaDTO(ChannelRepository::class, ['name' => 'channel']);
        $criteriaService    = new CriteriaService(
            $botCriteriaDTO,
            $channelCriteriaDTO
        );

        self::assertIsObject($criteriaService);
        self::assertEquals($botCriteriaDTO, $criteriaService->getBotCriteria());
        self::assertEquals($channelCriteriaDTO, $criteriaService->getChannelCriteria());
    }
}
