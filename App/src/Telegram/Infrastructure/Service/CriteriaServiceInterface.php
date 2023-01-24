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

/**
 *
 */
interface CriteriaServiceInterface extends \XGuard\Bot\Shared\Infrastructure\Service\CriteriaServiceInterface
{

    /**
     * @return CriteriaDTO|null
     */
    public function getBotCriteria(): ?CriteriaDTO;

    /**
     * @return CriteriaDTO|null
     */
    public function getChannelCriteria(): ?CriteriaDTO;
}
