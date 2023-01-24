<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Shared\Domain\Entity;

use DateTimeInterface;
use JsonSerializable;
use XGuard\Bot\Shared\Domain\ValueObject\ActionValueObject;
use XGuard\Bot\Shared\Domain\ValueObject\UuidValueObject;

/**
 *
 */
class MessageActionEntity implements JsonSerializable
{

    /**
     *
     */
    public function __construct(
        private readonly UuidValueObject $id,
        private readonly UuidValueObject $message_id,
        private readonly UuidValueObject $channel_to_bot_id,
        private DateTimeInterface $action_date,
        private ActionValueObject $action
    ) {

    }

    /**
     * @return UuidValueObject
     */
    public function getId(): UuidValueObject
    {
        return $this->id;
    }

    /**
     * @return UuidValueObject
     */
    public function getMessageId(): UuidValueObject
    {
        return $this->message_id;
    }

    /**
     * @return UuidValueObject
     */
    public function getChannelToBotId(): UuidValueObject
    {
        return $this->channel_to_bot_id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getActionDate(): DateTimeInterface
    {
        return $this->action_date;
    }

    /**
     * @param DateTimeInterface $action_date
     *
     * @return void
     */
    public function setActionDate(DateTimeInterface $action_date): void
    {
        $this->action_date = $action_date;
    }

    /**
     * @return ActionValueObject
     */
    public function getAction(): ActionValueObject
    {
        return $this->action;
    }

    /**
     * @param ActionValueObject $action
     *
     * @return void
     */
    public function setAction(ActionValueObject $action): void
    {
        $this->action = $action;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'id'                => $this->id,
            'message_id'        => $this->message_id,
            'channel_to_bot_id' => $this->channel_to_bot_id,
            'action_date'       => $this->action_date,
            'action'            => $this->action,
        ];
    }
}
