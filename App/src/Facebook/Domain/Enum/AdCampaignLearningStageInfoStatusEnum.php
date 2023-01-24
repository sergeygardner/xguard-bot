<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\Enum;

use JsonSerializable;

/**
 *
 */
enum AdCampaignLearningStageInfoStatusEnum implements JsonSerializable
{

    case LEARNING;// The ad set is still learning.
    case SUCCESS; // The ad set exited the learning phase.
    case FAIL;    // The ad set isn’t generating enough results to exit the learning phase.

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
