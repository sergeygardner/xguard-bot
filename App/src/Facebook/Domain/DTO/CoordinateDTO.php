<?php declare(strict_types=1);
/*
 * This file is part of XGuardBot.
 *
 * 2023 (c) Sergei Gardner <sergeigardner@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace XGuard\Bot\Facebook\Domain\DTO;

use JsonSerializable;

/**
 * This class represents information about the attachment to the post
 */
class CoordinateDTO implements JsonSerializable
{

    /**
     * @param mixed $checkin_id  [Default] TODO add a description and a type
     * @param mixed $author_uid  [Default] TODO add a description and a type
     * @param mixed $page_id     [Default] TODO add a description and a type
     * @param mixed $target_id   [Default] TODO add a description and a type
     * @param mixed $target_href [Default] TODO add a description and a type
     * @param mixed $coords      [Default] TODO add a description and a type
     * @param mixed $tagged_uids [Default] TODO add a description and a type
     * @param mixed $timestamp   [Default] TODO add a description and a type
     * @param mixed $message     [Default] TODO add a description and a type
     * @param mixed $target_type [Default] TODO add a description and a type
     */
    public function __construct(
        public readonly mixed $checkin_id,
        public readonly mixed $author_uid,
        public readonly mixed $page_id,
        public readonly mixed $target_id,
        public readonly mixed $target_href,
        public readonly mixed $coords,
        public readonly mixed $tagged_uids,
        public readonly mixed $timestamp,
        public readonly mixed $message,
        public readonly mixed $target_type
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'checkin_id'  => $this->checkin_id,
            'author_uid'  => $this->author_uid,
            'page_id'     => $this->page_id,
            'target_id'   => $this->target_id,
            'target_href' => $this->target_href,
            'coords'      => $this->coords,
            'tagged_uids' => $this->tagged_uids,
            'timestamp'   => $this->timestamp,
            'message'     => $this->message,
            'target_type' => $this->target_type,
        ];
    }
}
