<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\Infrastructure\Service;

use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;
use XGuard\Bot\Shared\Infrastructure\Service\AbstractCriteriaService;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\BotRepository;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\ChannelRepository;

/**
 *
 */
class CriteriaService extends AbstractCriteriaService implements CriteriaServiceInterface
{

    /**
     * @inheritDoc
     */
    public function getBotCriteria(): ?CriteriaDTO
    {
        return $this->criteriaDTO[BotRepository::class] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getChannelCriteria(): ?CriteriaDTO
    {
        return $this->criteriaDTO[ChannelRepository::class] ?? null;
    }
}
