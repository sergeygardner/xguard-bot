<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Telegram\UI;

use Doctrine\DBAL\Exception;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\Exception\ORMException;
use XGuard\Bot\Shared\UI\AbstractChannelToBot;
use XGuard\Bot\Telegram\Domain\Entity\ChannelToBotEntity;
use XGuard\Bot\Telegram\Infrastructure\Doctrine\Repository\ChannelToBotRepository;

/**
 * Extends from Shared for mapping purpose
 */
final class ChannelToBot extends AbstractChannelToBot
{

    /**
     *
     */
    protected const ENTITY_CLASS_NAME = ChannelToBotEntity::class;

    /**
     * @param array $options
     *
     * @throws MissingMappingDriverImplementation
     * @throws Exception
     * @throws ORMException
     */
    public function __construct(array $options)
    {
        parent::__construct($options);

        $this->channelToBotRepository = new ChannelToBotRepository($this->entityManager);
    }
}
