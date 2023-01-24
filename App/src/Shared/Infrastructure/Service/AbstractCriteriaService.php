<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Infrastructure\Service;

use XGuard\Bot\Shared\Domain\DTO\CriteriaDTO;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\ChannelToBotRepository;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\MessageActionRepository;
use XGuard\Bot\Shared\Infrastructure\Doctrine\Repository\MessageRepository;

/**
 *
 */
abstract class AbstractCriteriaService implements CriteriaServiceInterface
{

    /**
     * @var array|mixed
     */
    protected readonly array $criteriaDTO;

    /**
     * @param CriteriaDTO ...$criteriaDTO
     */
    public function __construct(CriteriaDTO ...$criteriaDTO)
    {
        $this->criteriaDTO = array_reduce(
            $criteriaDTO,
            static function (array $carry, CriteriaDTO $criteriaDTO): array {
                $carry[$criteriaDTO->class] = $criteriaDTO;

                return $carry;
            },
            []
        );
    }

    /**
     * @inheritDoc
     */
    public function getChannelToBotCriteria(): ?CriteriaDTO
    {
        return $this->criteriaDTO[ChannelToBotRepository::class] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getMessageCriteria(): ?CriteriaDTO
    {
        return $this->criteriaDTO[MessageRepository::class] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getMessageActionCriteria(): ?CriteriaDTO
    {
        return $this->criteriaDTO[MessageActionRepository::class] ?? null;
    }
}
