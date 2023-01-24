<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Infrastructure\Service;

use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\BotRepository;
use XGuard\Bot\Facebook\Infrastructure\Doctrine\Repository\ChannelRepository;
use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;
use XGuard\Bot\Shared\Infrastructure\Service\AbstractCriteriaService;

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
