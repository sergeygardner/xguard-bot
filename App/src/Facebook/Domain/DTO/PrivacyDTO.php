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
 * The class represents
 * @see https://developers.facebook.com/docs/graph-api/reference/privacy/
 */
class PrivacyDTO implements JsonSerializable
{

    /**
     * @param string $allow       [Default] The IDs of the specific users or friend lists that can see the object (as a comma-separated string).
     * @param string $deny        [Default] The IDs of the specific users or friend lists that cannot see the object (as a comma-separate string).
     * @param string $description [Default] A description of the privacy settings. For custom settings, it can contain names of users, networks and friend lists.
     * @param string $friends     [Default] Which category of users can see the object. This field is only set when the 'value' field is CUSTOM. TODO convert to enum
     * @param string $networks    [Default] The ID of the network that can see the object, or 1 for all the user's networks.
     * @param string $value       [Default] The privacy value for the object. TODO convert to enum
     */
    public function __construct(
        public readonly string $allow,
        public readonly string $deny,
        public readonly string $description,
        public readonly string $friends,
        public readonly string $networks,
        public readonly string $value
    ) {

    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return [
            'allow'       => $this->allow,
            'deny'        => $this->deny,
            'description' => $this->description,
            'friends'     => $this->friends,
            'networks'    => $this->networks,
            'value'       => $this->value,
        ];
    }
}
